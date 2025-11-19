<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDemandeRequest;
use App\Models\Demande;
use App\Models\Decision;
use App\Models\NomFormationSanitaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DemandeController extends Controller
{
    public function create(Request $request)
    {
        // generate simple math captcha stored in session
        $a = rand(1,9);
        $b = rand(1,9);
        $request->session()->put('demande_captcha', $a + $b);
        $captcha_question = "Quelle est la somme de $a + $b ?";

        $formations = NomFormationSanitaire::select('id','nom')->get();
        return view('demandes.create', compact('formations','captcha_question'));
    }

    public function store(StoreDemandeRequest $request)
    {
        $data = $request->validated();

        // remove captcha from data
        unset($data['captcha']);
        unset($data['password_confirmation']);

        // Hash the password
        $data['password'] = bcrypt($data['password']);

        // Generate unique numero_demande
        $year = date('Y');
        $lastDemande = Demande::whereYear('created_at', $year)
            ->whereNotNull('numero_demande')
            ->orderBy('id', 'desc')
            ->first();
        
        if ($lastDemande && $lastDemande->numero_demande) {
            // Extract number from last numero (format: DEM-2025-0001)
            $parts = explode('-', $lastDemande->numero_demande);
            $lastNumber = isset($parts[2]) ? intval($parts[2]) : 0;
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }
        
        $numeroDemande = 'DEM-' . $year . '-' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);

        // Ensure data field saved as JSON
        $payload = [
            'numero_demande' => $numeroDemande,
            'ppr' => $data['ppr'] ?? null,
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'cin' => $data['cin'] ?? null,
            'email_fonctionnaire' => $data['email_fonctionnaire'],
            'password' => $data['password'],
            'nom_formation_sanitaire_id' => $data['nom_formation_sanitaire_id'] ?? null,
            'type_demande' => $data['type_demande'],
            'data' => $data['data'] ?? null,
        ];

        $demande = Demande::create($payload);

        return redirect()->route('demandes.create')->with('success', "Demande soumise avec succès ! Numéro de demande : {$numeroDemande}. Utilisez votre email et mot de passe pour consulter vos demandes.");
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        $query = Demande::with(['nomFormationSanitaire', 'decision']);

        // Utiliser le niveau d'approbation assigné à l'utilisateur
        $userLevel = $user->demande_approval_level;

        // Filtrage par niveau si l'utilisateur n'est pas Super Admin et a un niveau assigné
        if (!$user->hasRole('Super Admin') && $userLevel) {
            // Si un filtre de statut est appliqué, on l'utilise
            if ($request->filled('status')) {
                // L'utilisateur filtre par statut spécifique
                $query->where('status', $request->get('status'));

                // Pour les demandes en attente, montrer celles à son niveau
                if ($request->get('status') === 'pending') {
                    $query->where('approval_level', $userLevel - 1);
                } else {
                    // Pour approved/rejected, montrer celles qui sont passées par son niveau
                    $query->where('approval_level', '>=', $userLevel - 1);
                }
            } else {
                // Par défaut (sans filtre statut), montrer les demandes en attente à son niveau
                // ET les demandes approuvées/rejetées qui sont passées par son niveau
                $query->where(function($q) use ($userLevel) {
                    $q->where(function($sub) use ($userLevel) {
                        // Demandes en attente à son niveau
                        $sub->where('approval_level', $userLevel - 1)
                            ->where('status', 'pending');
                    })->orWhere(function($sub) use ($userLevel) {
                        // Demandes terminées qui ont atteint/dépassé son niveau
                        $sub->whereIn('status', ['approved', 'rejected'])
                            ->where('approval_level', '>=', $userLevel - 1);
                    });
                });
            }
        }

        // Filtres de recherche
        if ($request->filled('type')) {
            $query->where('type_demande', $request->get('type'));
        }
        if ($request->filled('nom')) {
            $query->where('nom', 'like', '%'.$request->get('nom').'%');
        }
        if ($request->filled('prenom')) {
            $query->where('prenom', 'like', '%'.$request->get('prenom').'%');
        }
        if ($request->filled('cin')) {
            $query->where('cin', 'like', '%'.$request->get('cin').'%');
        }
        if ($request->filled('ppr')) {
            $query->where('ppr', 'like', '%'.$request->get('ppr').'%');
        }
        // Le filtre status est déjà traité ci-dessus dans la logique de niveau

        $demandes = $query->orderBy('created_at','desc')->paginate(25);

        return view('demandes.index', compact('demandes', 'userLevel'));
    }

    // public listing for fonctionnaire to consult their demandes by ppr or cin
    public function mine(Request $request)
    {
        // Si GET, on affiche juste le formulaire de connexion
        if ($request->isMethod('get')) {
            return view('demandes.mine');
        }

        // Si POST, on traite la connexion
        $request->validate([
            'email_fonctionnaire' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->get('email_fonctionnaire');
        $password = $request->get('password');

        // Find demandes by email with relationships
        $allDemandes = Demande::with(['nomFormationSanitaire', 'decision'])
            ->where('email_fonctionnaire', $email)
            ->get();

        if ($allDemandes->isEmpty()) {
            $error = 'Aucune demande trouvée avec cet email.';
            return view('demandes.mine', compact('error'));
        }

        // Verify password with the first demande (all should have same password for same email)
        if (!Hash::check($password, $allDemandes->first()->password)) {
            $error = 'Mot de passe incorrect.';
            return view('demandes.mine', compact('error'));
        }

        // Success - show demandes
        $demandes = $allDemandes->sortByDesc('created_at');
        return view('demandes.mine', compact('demandes'));
    }

    // Approve by a responsible user
    public function approve(Request $request, Demande $demande)
    {
        $user = $request->user();

        // Utiliser le niveau d'approbation assigné à l'utilisateur
        $userLevel = $user->demande_approval_level;

        // Si l'utilisateur n'a pas de niveau d'approbation assigné
        if (!$userLevel) {
            return back()->with('error', 'Vous n\'avez pas de niveau d\'approbation assigné.');
        }

        // Vérifier que l'approbation respecte l'ordre séquentiel
        $currentLevel = $demande->approval_level;

        // Si le niveau actuel est déjà égal ou supérieur au niveau de l'utilisateur
        if ($currentLevel >= $userLevel) {
            return back()->with('error', 'Cette demande a déjà été approuvée à votre niveau ou à un niveau supérieur.');
        }

        // Vérifier que les niveaux précédents ont été approuvés
        if ($userLevel > $currentLevel + 1) {
            $requiredLevel = $currentLevel + 1;
            return back()->with('error', "Le responsable niveau {$requiredLevel} doit approuver d'abord.");
        }

        // Approuver au niveau de l'utilisateur
        $demande->approval_level = $userLevel;

        // Si c'est le niveau 4 qui approuve, marquer comme approuvé
        if ($userLevel >= 4) {
            $demande->status = 'approved';
        }

        $demande->save();

        return back()->with('success', "Demande approuvée au niveau {$userLevel}/4.");
    }

    // Show decision creation form
    public function decide(Demande $demande)
    {
        // only allow if fully approved (niveau 4 atteint)
        if ($demande->status !== 'approved' || $demande->approval_level < 4) {
            return back()->with('error', 'La demande n\'est pas encore validée par tous les responsables (niveau 4 requis).');
        }

        // Check if decision already exists
        if ($demande->decision_id) {
            return back()->with('error', 'Une décision existe déjà pour cette demande.');
        }

        return view('demandes.create-decision', compact('demande'));
    }

    // Store the decision with file upload
    public function storeDecision(Request $request, Demande $demande)
    {
        // only allow if fully approved (niveau 4 atteint)
        if ($demande->status !== 'approved' || $demande->approval_level < 4) {
            return back()->with('error', 'La demande n\'est pas encore validée par tous les responsables (niveau 4 requis).');
        }

        // Check if decision already exists
        if ($demande->decision_id) {
            return back()->with('error', 'Une décision existe déjà pour cette demande.');
        }

        $validated = $request->validate([
            'numero_decision' => 'required|string|max:255|unique:decisions,numero_decision',
            'fichier_decision' => 'nullable|file|mimes:pdf|max:5120', // 5 Mo max
            'observations' => 'nullable|string|max:1000',
        ], [
            'numero_decision.required' => 'Le numéro de décision est obligatoire.',
            'numero_decision.unique' => 'Ce numéro de décision existe déjà.',
            'fichier_decision.mimes' => 'Le fichier doit être au format PDF.',
            'fichier_decision.max' => 'Le fichier ne doit pas dépasser 5 Mo.',
        ]);

        // Upload file
        $fichierPath = null;
        if ($request->hasFile('fichier_decision')) {
            $file = $request->file('fichier_decision');
            $filename = 'decision_' . $demande->id . '_' . time() . '.' . $file->getClientOriginalExtension();
            $fichierPath = $file->storeAs('decisions', $filename, 'public');
        }

        // Create decision with numero and file
        $decision = Decision::create([
            'demande_id' => $demande->id,
            'type' => $demande->type_demande,
            'numero_decision' => $validated['numero_decision'],
            'fichier_decision' => $fichierPath,
            'observations' => $validated['observations'] ?? null,
            'data' => null,
        ]);

        $demande->decision_id = $decision->id;
        $demande->save();

        // Here you might send notification/email

        return redirect()->route('demandes.index')->with('success', 'Décision créée et enregistrée avec succès.');
    }

    // Show forgot password form
    public function showForgotPassword()
    {
        return view('demandes.forgot-password');
    }

    // Send reset password email
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email_fonctionnaire' => 'required|email',
            'ppr' => 'required',
            'date_naissance' => 'required|date',
            'date_embauche' => 'required|date',
        ]);

        $email = $request->get('email_fonctionnaire');
        $ppr = $request->get('ppr');
        $dateNaissance = $request->get('date_naissance');
        $dateEmbauche = $request->get('date_embauche');

        // Check for too many recent attempts (prevent brute force)
        $recentAttempts = DB::table('demande_password_resets')
            ->where('email', $email)
            ->where('created_at', '>', now()->subMinutes(15))
            ->count();

        if ($recentAttempts >= 5) {
            return back()->with('error', 'Trop de tentatives. Veuillez patienter 15 minutes avant de réessayer.');
        }

        // STEP 1: Verify PPR exists in fonctionnaires database first
        $fonctionnaire = DB::table('fonctionnaires')
            ->where('ppr', $ppr)
            ->first();

        if (!$fonctionnaire) {
            DB::table('demande_password_resets')->insert([
                'email' => $email,
                'token' => 'FAILED_ATTEMPT_PPR_NOT_FOUND',
                'created_at' => now(),
            ]);

            return back()->with('error', 'Le PPR fourni n\'existe pas dans notre système. Vérifiez votre numéro matricule.');
        }

        // STEP 2: Verify date de naissance matches
        if ($fonctionnaire->date_naissance !== $dateNaissance) {
            DB::table('demande_password_resets')->insert([
                'email' => $email,
                'token' => 'FAILED_ATTEMPT_DATE_NAISSANCE',
                'created_at' => now(),
            ]);

            return back()->with('error', 'La date de naissance ne correspond pas au PPR fourni. Vérifiez vos informations.');
        }

        // STEP 3: Verify date d'embauche matches
        if ($fonctionnaire->date_embauche !== $dateEmbauche) {
            DB::table('demande_password_resets')->insert([
                'email' => $email,
                'token' => 'FAILED_ATTEMPT_DATE_EMBAUCHE',
                'created_at' => now(),
            ]);

            return back()->with('error', 'La date de recrutement ne correspond pas au PPR fourni. Vérifiez vos informations.');
        }

        // STEP 4: Now check if there's a demande with this PPR
        $demande = Demande::where('ppr', $ppr)->first();

        if (!$demande) {
            DB::table('demande_password_resets')->insert([
                'email' => $email,
                'token' => 'FAILED_ATTEMPT_NO_DEMANDE',
                'created_at' => now(),
            ]);

            return back()->with('error', 'Aucune demande trouvée avec ce PPR. Vous devez d\'abord créer une demande avant de pouvoir récupérer votre mot de passe.');
        }

        // STEP 5: Verify email matches the demande
        if ($demande->email_fonctionnaire !== $email) {
            DB::table('demande_password_resets')->insert([
                'email' => $email,
                'token' => 'FAILED_ATTEMPT_EMAIL_MISMATCH',
                'created_at' => now(),
            ]);

            return back()->with('error', 'L\'email fourni ne correspond pas à celui enregistré pour ce PPR. Utilisez l\'email que vous avez fourni lors de la création de votre demande.');
        }        // Delete all old tokens for this email (including failed attempts)
        DB::table('demande_password_resets')
            ->where('email', $email)
            ->delete();

        // Create new token
        $token = Str::random(60);
        DB::table('demande_password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => now(),
        ]);

        // Generate reset link
        $resetLink = url('/demandes/reset-password?token=' . $token . '&email=' . urlencode($email));

        // Afficher le lien directement après vérification réussie
        return back()
            ->withInput(['email_fonctionnaire' => $email])
            ->with([
                'success' => 'Identité vérifiée ! Votre lien de réinitialisation a été généré ci-dessous :',
                'reset_link' => $resetLink
            ]);
    }

    // Show reset password form
    public function showResetPassword(Request $request)
    {
        $token = $request->get('token');
        $email = $request->get('email');

        // Verify token exists and is valid (less than 60 minutes old)
        $reset = DB::table('demande_password_resets')
            ->where('email', $email)
            ->where('token', $token)
            ->where('created_at', '>', now()->subHours(1))
            ->first();

        if (!$reset) {
            return redirect()->route('demandes.forgot-password')
                ->with('error', 'Ce lien de réinitialisation est invalide ou a expiré.');
        }

        return view('demandes.reset-password', compact('token', 'email'));
    }

    // Reset the password
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'token' => 'required',
            'password' => 'required|min:4|confirmed',
        ]);

        $email = $request->get('email');
        $token = $request->get('token');

        // Verify token
        $reset = DB::table('demande_password_resets')
            ->where('email', $email)
            ->where('token', $token)
            ->where('created_at', '>', now()->subHours(1))
            ->first();

        if (!$reset) {
            return back()->with('error', 'Ce lien de réinitialisation est invalide ou a expiré.');
        }

        // Update password for all demandes with this email
        Demande::where('email_fonctionnaire', $email)
            ->update([
                'password' => Hash::make($request->get('password'))
            ]);

        // Delete the token
        DB::table('demande_password_resets')
            ->where('email', $email)
            ->delete();

        return redirect()->route('demandes.mine')
            ->with('success', 'Votre mot de passe a été réinitialisé avec succès. Vous pouvez maintenant vous connecter.');
    }

    // Show details of a demande
    public function show(Demande $demande)
    {
        $demande->load(['nomFormationSanitaire', 'decision']);
        return view('demandes.show', compact('demande'));
    }

    // Edit a demande
    public function edit(Demande $demande)
    {
        $formations = NomFormationSanitaire::orderBy('nom')->get();
        return view('demandes.edit', compact('demande', 'formations'));
    }

    // Update a demande
    public function update(Request $request, Demande $demande)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'cin' => 'required|string|max:20',
            'ppr' => 'required|string|max:20',
            'email_fonctionnaire' => 'required|email',
            'nom_formation_sanitaire_id' => 'nullable|exists:nom_formation_sanitaire,id',
            'type_demande' => 'required|in:conge,attestation,autre',
            'data' => 'nullable|array',
        ]);

        // Convert data array to JSON
        if (isset($validated['data'])) {
            $validated['data'] = json_encode($validated['data']);
        }

        $demande->update($validated);

        return redirect()->route('demandes.index')
            ->with('success', 'Demande modifiée avec succès.');
    }

    // Delete a demande
    public function destroy(Demande $demande)
    {
        $demande->delete();

        return redirect()->route('demandes.index')
            ->with('success', 'Demande supprimée avec succès.');
    }
}
