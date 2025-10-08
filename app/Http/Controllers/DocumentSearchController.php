<?php

namespace App\Http\Controllers;

use App\Models\Fonctionnaire;
use App\Models\Certificate;
use App\Models\Relicat;
use App\Models\TypeConge;
use App\Models\CongeDecision;
use App\Models\HistoriqueMutation;
use App\Models\PositionHistorique;
use App\Utils\CustomPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentSearchController extends Controller
{
    /**
     * Display the global search page
     */
    public function index()
    {
        return view('documents.search');
    }

    /**
     * Perform global search
     */
    public function search(Request $request)
    {
        $query = $request->input('query');
        $documentType = $request->input('document_type', 'all');
        $results = [];

        if (empty($query)) {
            return response()->json([
                'success' => false,
                'message' => 'Veuillez saisir un terme de recherche'
            ]);
        }

        // Search in different document types based on selection
        switch ($documentType) {
            case 'conge':
                $results = $this->searchCongeDocuments($query);
                break;
            case 'greve':
                $results = $this->searchGrevesDocuments($query);
                break;
            case 'certificate':
                $results = $this->searchCertificates($query);
                break;
            case 'attestation':
                $results = $this->searchAttestations($query);
                break;
            case 'stage':
                $results = $this->searchStages($query);
                break;
            case 'mutation':
                $results = $this->searchMutations($query);
                break;
            case 'position':
                $results = $this->searchPositions($query);
                break;
            case 'fonctionnaire':
                $results = $this->searchFonctionnaires($query);
                break;
            case 'all':
            default:
                $results = $this->searchAllDocuments($query);
                break;
        }

        return response()->json([
            'success' => true,
            'results' => $results,
            'total' => count($results)
        ]);
    }

    /**
     * Search in congé documents
     */
    private function searchCongeDocuments($query)
    {
        $results = [];

        // Search in Relicat (old congé requests)
        $relicats = Relicat::with(['fonctionnaire', 'typeConge'])
            ->whereHas('fonctionnaire', function($q) use ($query) {
                $q->where('nom', 'LIKE', "%{$query}%")
                  ->orWhere('prenom', 'LIKE', "%{$query}%")
                  ->orWhere('ppr', 'LIKE', "%{$query}%");
            })
            ->orWhereHas('typeConge', function($q) use ($query) {
                $q->where('nom', 'LIKE', "%{$query}%");
            })
            ->get();

        foreach ($relicats as $relicat) {
            $results[] = [
                'type' => 'Congé',
                'title' => "Décision de congé - " . (optional($relicat->fonctionnaire)->nom ?? '') . ' ' . (optional($relicat->fonctionnaire)->prenom ?? ''),
                'description' => "Type: " . (optional($relicat->typeConge)->nom ?? '') . " | Jours disponibles: " . ($relicat->nbr_jours_disponibles ?? ''),
                'url' => route('fonctionnaire.conge-decision', $relicat->id),
                'date' => optional($relicat->created_at)->format('d/m/Y') ?? '',
                'fonctionnaire' => (optional($relicat->fonctionnaire)->nom ?? '') . ' ' . (optional($relicat->fonctionnaire)->prenom ?? ''),
                'matricule' => optional($relicat->fonctionnaire)->ppr ?? '',
                'fonctionnaire_id' => optional($relicat->fonctionnaire)->id ?? null,
                'requires_form' => true,
                'form_type' => 'conge_decision'
            ];
        }

        // Search in CongeDecision (new congé decisions)
        $congeDecisions = CongeDecision::with(['fonctionnaire', 'typeConge'])
            ->whereHas('fonctionnaire', function($q) use ($query) {
                $q->where('nom', 'LIKE', "%{$query}%")
                  ->orWhere('prenom', 'LIKE', "%{$query}%")
                  ->orWhere('ppr', 'LIKE', "%{$query}%");
            })
            ->orWhereHas('typeConge', function($q) use ($query) {
                $q->where('nom', 'LIKE', "%{$query}%");
            })
            ->get();

        foreach ($congeDecisions as $decision) {
            $results[] = [
                'type' => 'Congé',
                'title' => "Décision de congé - " . (optional($decision->fonctionnaire)->nom ?? '') . ' ' . (optional($decision->fonctionnaire)->prenom ?? ''),
                'description' => "Type: " . (optional($decision->typeConge)->nom ?? '') . " | Nombre de jours: " . ($decision->nombre_jours ?? '') . " | Statut: " . ($decision->statut ?? ''),
                'url' => route('batch-print.print-single-decision-with-ampliations', $decision->id),
                'date' => optional($decision->date_decision)->format('d/m/Y') ?? '',
                'fonctionnaire' => (optional($decision->fonctionnaire)->nom ?? '') . ' ' . (optional($decision->fonctionnaire)->prenom ?? ''),
                'matricule' => optional($decision->fonctionnaire)->ppr ?? '',
                'fonctionnaire_id' => optional($decision->fonctionnaire)->id ?? null,
                'requires_form' => true,
                'form_type' => 'conge_decision'
            ];
        }

        return $results;
    }

    /**
     * Search in certificates
     */
    private function searchCertificates($query)
    {
        $results = [];

        $certificates = Certificate::with(['fonctionnaire', 'type_certificate'])
            ->whereHas('fonctionnaire', function($q) use ($query) {
                $q->where('nom', 'LIKE', "%{$query}%")
                  ->orWhere('prenom', 'LIKE', "%{$query}%")
                  ->orWhere('ppr', 'LIKE', "%{$query}%");
            })
            ->orWhereHas('type_certificate', function($q) use ($query) {
                $q->where('nom', 'LIKE', "%{$query}%");
            })
            ->get();

        foreach ($certificates as $certificate) {
            $results[] = [
                'type' => 'Certificat',
                'title' => "Certificat - {$certificate->fonctionnaire->nom} {$certificate->fonctionnaire->prenom}",
                'description' => "Type: {$certificate->type_certificate->nom}",
                'url' => route('certificates.pdf', $certificate->id),
                'date' => $certificate->created_at->format('d/m/Y'),
                'fonctionnaire' => $certificate->fonctionnaire->nom . ' ' . $certificate->fonctionnaire->prenom,
                'matricule' => $certificate->fonctionnaire->ppr,
                'fonctionnaire_id' => $certificate->fonctionnaire->id,
                'requires_form' => false,
                'form_type' => null
            ];
        }

        return $results;
    }

    /**
     * Search in attestations
     */
    private function searchAttestations($query)
    {
        $results = [];

        $fonctionnaires = Fonctionnaire::where('nom', 'LIKE', "%{$query}%")
            ->orWhere('prenom', 'LIKE', "%{$query}%")
            ->orWhere('ppr', 'LIKE', "%{$query}%")
            ->get();

        foreach ($fonctionnaires as $fonctionnaire) {
            $results[] = [
                'type' => 'Attestation',
                'title' => "Attestation de travail - {$fonctionnaire->nom} {$fonctionnaire->prenom}",
                'description' => "Attestation de travail pour le fonctionnaire",
                'url' => route('fonctionnaire.attestation', $fonctionnaire->id),
                'date' => now()->format('d/m/Y'),
                'fonctionnaire' => $fonctionnaire->nom . ' ' . $fonctionnaire->prenom,
                'matricule' => $fonctionnaire->ppr,
                'fonctionnaire_id' => $fonctionnaire->id,
                'requires_form' => false,
                'form_type' => null
            ];
        }

        return $results;
    }

    /**
     * Search in stages
     */
    private function searchStages($query)
    {
        $results = [];

        $stages = \App\Models\Stage::where('nom_prenom', 'LIKE', "%{$query}%")
            ->orWhere('cin', 'LIKE', "%{$query}%")
            ->with(['ecole', 'option', 'service', 'formationSanitaire', 'encadrant'])
            ->get();

        foreach ($stages as $stage) {
            $results[] = [
                'type' => 'Stage',
                'title' => "Attestation de stage - {$stage->nom_prenom}",
                'description' => "Attestation de stage pour {$stage->nom_prenom} - {$stage->ecole->nom}",
                'url' => route('stages.attestation', $stage->id),
                'date' => $stage->date_debut->format('d/m/Y'),
                'fonctionnaire' => $stage->nom_prenom,
                'matricule' => $stage->cin,
                'requires_form' => false,
                'form_type' => null
            ];
        }

        return $results;
    }

    /**
     * Search in mutations
     */
    private function searchMutations($query)
    {
        $results = [];

        $mutations = HistoriqueMutation::with(['fonctionnaire', 'typeMutation', 'formationSanitaireOrigine', 'formationSanitaireDestination'])
            ->whereHas('fonctionnaire', function($q) use ($query) {
                $q->where('nom', 'LIKE', "%{$query}%")
                  ->orWhere('prenom', 'LIKE', "%{$query}%")
                  ->orWhere('ppr', 'LIKE', "%{$query}%");
            })
            ->orWhereHas('typeMutation', function($q) use ($query) {
                $q->where('nom', 'LIKE', "%{$query}%");
            })
            ->orWhere('ref_note', 'LIKE', "%{$query}%")
            ->get();

        foreach ($mutations as $mutation) {
            $description = "Type: " . ($mutation->typeMutation->nom ?? 'Non défini');
            if ($mutation->date_prise_en_service) {
                $description .= " | Date prise service: " . \Carbon\Carbon::parse($mutation->date_prise_en_service)->format('d/m/Y');
            }
            if ($mutation->formationSanitaireOrigine && $mutation->formationSanitaireDestination) {
                $description .= " | De: " . substr($mutation->formationSanitaireOrigine->nom, 0, 20) . " vers: " . substr($mutation->formationSanitaireDestination->nom, 0, 20);
            }

            $results[] = [
                'type' => 'Mutation',
                'title' => "Mutation - {$mutation->fonctionnaire->nom} {$mutation->fonctionnaire->prenom}",
                'description' => $description,
                'url' => $mutation->fichiers_notes && Storage::exists('public/' . $mutation->fichiers_notes)
                    ? Storage::url($mutation->fichiers_notes)
                    : '#',
                'date' => $mutation->date_mutation ? \Carbon\Carbon::parse($mutation->date_mutation)->format('d/m/Y') : $mutation->created_at->format('d/m/Y'),
                'fonctionnaire' => $mutation->fonctionnaire->nom . ' ' . $mutation->fonctionnaire->prenom,
                'matricule' => $mutation->fonctionnaire->ppr,
                'fonctionnaire_id' => $mutation->fonctionnaire->id,
                'requires_form' => false,
                'form_type' => null,
                'has_file' => $mutation->fichiers_notes && Storage::exists('public/' . $mutation->fichiers_notes)
            ];
        }

        return $results;
    }

    /**
     * Search in greves for global search
     */
    private function searchGrevesDocuments($query)
    {
        $results = [];

        $greves = \App\Models\Greve::with(['fonctionnaire'])
            ->whereHas('fonctionnaire', function($q) use ($query) {
                $q->where('nom', 'LIKE', "%{$query}%")
                  ->orWhere('prenom', 'LIKE', "%{$query}%")
                  ->orWhere('ppr', 'LIKE', "%{$query}%");
            })
            ->orWhere('remarque', 'LIKE', "%{$query}%")
            ->get();

        foreach ($greves as $greve) {
            $fonctionnaireId = optional($greve->fonctionnaire)->id ?? null;
            $results[] = [
                'type' => 'Grève',
                'title' => "Grève - " . (optional($greve->fonctionnaire)->nom ?? '') . ' ' . (optional($greve->fonctionnaire)->prenom ?? ''),
                'description' => 'Remarque: ' . ($greve->remarque ?? ''),
                'url' => $fonctionnaireId ? route('fonctionnaire.show', $fonctionnaireId) : '#',
                'date' => optional($greve->date_debut)->format('d/m/Y') ?? '',
                'fonctionnaire' => (optional($greve->fonctionnaire)->nom ?? '') . ' ' . (optional($greve->fonctionnaire)->prenom ?? ''),
                'matricule' => optional($greve->fonctionnaire)->ppr ?? '',
                'fonctionnaire_id' => $fonctionnaireId,
                'requires_form' => false,
                'form_type' => null
            ];
        }

        return $results;
    }

    /**
     * Search in positions
     */
    private function searchPositions($query)
    {
        $results = [];

        $positions = PositionHistorique::with(['fonctionnaire', 'ancienPosition', 'nouveauxPosition', 'typeCertificate', 'typeConge'])
            ->whereHas('fonctionnaire', function($q) use ($query) {
                $q->where('nom', 'LIKE', "%{$query}%")
                  ->orWhere('prenom', 'LIKE', "%{$query}%")
                  ->orWhere('ppr', 'LIKE', "%{$query}%");
            })
            ->orWhereHas('ancienPosition', function($q) use ($query) {
                $q->where('nom', 'LIKE', "%{$query}%");
            })
            ->orWhereHas('nouveauxPosition', function($q) use ($query) {
                $q->where('nom', 'LIKE', "%{$query}%");
            })
            ->orWhere('ref_note', 'LIKE', "%{$query}%")
            ->get();

        foreach ($positions as $position) {
            $description = "Type: " . ($position->type ?? 'Non défini');
            if ($position->date_prise_en_service) {
                $description .= " | Date prise service: " . \Carbon\Carbon::parse($position->date_prise_en_service)->format('d/m/Y');
            }
            if ($position->ancienPosition && $position->nouveauxPosition) {
                $description .= " | De: " . $position->ancienPosition->nom . " vers: " . $position->nouveauxPosition->nom;
            }

            $results[] = [
                'type' => 'Position',
                'title' => "Position - {$position->fonctionnaire->nom} {$position->fonctionnaire->prenom}",
                'description' => $description,
                'url' => $position->fichiers_notes && Storage::exists('public/' . $position->fichiers_notes)
                    ? Storage::url($position->fichiers_notes)
                    : '#',
                'date' => $position->date_prise_en_service ? \Carbon\Carbon::parse($position->date_prise_en_service)->format('d/m/Y') : $position->created_at->format('d/m/Y'),
                'fonctionnaire' => $position->fonctionnaire->nom . ' ' . $position->fonctionnaire->prenom,
                'matricule' => $position->fonctionnaire->ppr,
                'fonctionnaire_id' => $position->fonctionnaire->id,
                'requires_form' => false,
                'form_type' => null,
                'has_file' => $position->fichiers_notes && Storage::exists('public/' . $position->fichiers_notes)
            ];
        }

        return $results;
    }

    /**
     * Search in fonctionnaires
     */
    private function searchFonctionnaires($query)
    {
        $results = [];

        $fonctionnaires = Fonctionnaire::with(['specialiteGrade.grade.cadre', 'nomFormationSanitaire'])
            ->where(function($q) use ($query) {
                $q->where('nom', 'LIKE', "%{$query}%")
                  ->orWhere('prenom', 'LIKE', "%{$query}%")
                  ->orWhere('ppr', 'LIKE', "%{$query}%")
                  ->orWhere('cin', 'LIKE', "%{$query}%");
            })
            ->orWhereHas('specialiteGrade.grade', function($q) use ($query) {
                $q->where('nom', 'LIKE', "%{$query}%");
            })
            ->orWhereHas('specialiteGrade.grade.cadre', function($q) use ($query) {
                $q->where('nom', 'LIKE', "%{$query}%");
            })
            ->orWhereHas('nomFormationSanitaire', function($q) use ($query) {
                $q->where('nom', 'LIKE', "%{$query}%");
            })
            ->get();

        foreach ($fonctionnaires as $fonctionnaire) {
            $description = "PPR: {$fonctionnaire->ppr}";

            if ($fonctionnaire->specialiteGrade && $fonctionnaire->specialiteGrade->grade) {
                $description .= " | Grade: " . $fonctionnaire->specialiteGrade->grade->nom;
                if ($fonctionnaire->specialiteGrade->grade->cadre) {
                    $description .= " | Cadre: " . $fonctionnaire->specialiteGrade->grade->cadre->nom;
                }
            }

            if ($fonctionnaire->nomFormationSanitaire) {
                $description .= " | Formation: " . substr($fonctionnaire->nomFormationSanitaire->nom, 0, 30) . (strlen($fonctionnaire->nomFormationSanitaire->nom) > 30 ? '...' : '');
            }

            if ($fonctionnaire->cin) {
                $description .= " | CIN: " . $fonctionnaire->cin;
            }

            $results[] = [
                'type' => 'Fonctionnaire',
                'title' => "Fonctionnaire - {$fonctionnaire->nom} {$fonctionnaire->prenom}",
                'description' => $description,
                'url' => route('fonctionnaire.show', $fonctionnaire->id),
                'date' => $fonctionnaire->date_naissance ? \Carbon\Carbon::parse($fonctionnaire->date_naissance)->format('d/m/Y') : $fonctionnaire->created_at->format('d/m/Y'),
                'fonctionnaire' => $fonctionnaire->nom . ' ' . $fonctionnaire->prenom,
                'matricule' => $fonctionnaire->ppr,
                'fonctionnaire_id' => $fonctionnaire->id,
                'requires_form' => false,
                'form_type' => null
            ];
        }

        return $results;
    }

    /**
     * Search in all document types
     */
    private function searchAllDocuments($query)
    {
        $results = [];

        $results = array_merge($results, $this->searchCongeDocuments($query));
        $results = array_merge($results, $this->searchCertificates($query));
        $results = array_merge($results, $this->searchAttestations($query));
        $results = array_merge($results, $this->searchStages($query));
        $results = array_merge($results, $this->searchMutations($query));
        $results = array_merge($results, $this->searchPositions($query));
        $results = array_merge($results, $this->searchFonctionnaires($query));

        // Sort by date (newest first)
        usort($results, function($a, $b) {
            return strtotime($b['date']) - strtotime($a['date']);
        });

        return $results;
    }

    /**
     * Show export conges form
     */
    public function showExportCongesForm()
    {
        $typeConges = TypeConge::all();
        return view('documents.export-conges-form', compact('typeConges'));
    }

    /**
     * Print search results
     */
    public function printResults(Request $request)
    {
        $query = $request->input('query');
        $documentType = $request->input('document_type');
        $results = json_decode($request->input('results'), true);

        if (empty($results)) {
            return response()->json(['error' => 'Aucun résultat à imprimer'], 400);
        }

        // Generate PDF with search results
        return $this->generateSearchResultsPDF($query, $documentType, $results);
    }

    /**
     * Generate PDF for search results
     */
    private function generateSearchResultsPDF($query, $documentType, $results)
    {
        $pdf = new \TCPDF('L', 'mm', 'A4'); // 'L' pour format paysage (Landscape)

        // Set document information
        $pdf->SetCreator('Application GRH-DMSPS Fès');
        $pdf->SetAuthor('DMSPS Fès');
        $pdf->SetTitle('Résultats de recherche de documents');
        $pdf->SetSubject('Recherche de documents');

        // Set margins ajustées pour format paysage
        $pdf->SetMargins(20, 20, 20); // Marges gauche, haut, droite ajustées
        $pdf->SetHeaderMargin(10);
        $pdf->SetFooterMargin(15);
        $pdf->SetAutoPageBreak(true, 25);

        // Add page en format paysage
        $pdf->AddPage('L'); // 'L' pour paysage

        // Set font
        $pdf->SetFont('dejavusans', '', 12);

        // Header
        $pdf->SetFont('dejavusans', 'B', 16);
        $pdf->Cell(0, 10, 'DÉLÉGATION DU MINISTÈRE DE LA SANTÉ', 0, 1, 'C');
        $pdf->Cell(0, 8, 'PRÉFECTURE DE FÈS', 0, 1, 'C');
        $pdf->Ln(5);

        $pdf->SetFont('dejavusans', 'B', 14);
        $pdf->Cell(0, 8, 'RÉSULTATS DE RECHERCHE DE DOCUMENTS', 0, 1, 'C');
        $pdf->Ln(5);

        // Search criteria
        $pdf->SetFont('dejavusans', 'B', 11);
        $pdf->Cell(0, 6, 'Critères de recherche :', 0, 1, 'L');
        $pdf->SetFont('dejavusans', '', 10);
        $pdf->Cell(40, 6, 'Terme recherché :', 0, 0, 'L');
        $pdf->Cell(0, 6, $query, 0, 1, 'L');
        $pdf->Cell(40, 6, 'Type de document :', 0, 0, 'L');
        $pdf->Cell(0, 6, $this->getDocumentTypeLabel($documentType), 0, 1, 'L');
        $pdf->Cell(40, 6, 'Nombre de résultats :', 0, 0, 'L');
        $pdf->Cell(0, 6, count($results), 0, 1, 'L');
        $pdf->Cell(40, 6, 'Date d\'impression :', 0, 0, 'L');
        $pdf->Cell(0, 6, date('d/m/Y H:i'), 0, 1, 'L');
        $pdf->Ln(8);

        // Results table header - Largeurs ajustées pour format paysage
        $pdf->SetFont('dejavusans', 'B', 10);
        $pdf->SetFillColor(230, 230, 230);
        $pdf->Cell(20, 8, 'N°', 1, 0, 'C', true);
        $pdf->Cell(35, 8, 'Type', 1, 0, 'C', true);
        $pdf->Cell(90, 8, 'Document', 1, 0, 'C', true);
        $pdf->Cell(60, 8, 'Fonctionnaire', 1, 0, 'C', true);
        $pdf->Cell(30, 8, 'PPR', 1, 0, 'C', true);
        $pdf->Cell(30, 8, 'Date', 1, 1, 'C', true);

        // Results data
        $pdf->SetFont('dejavusans', '', 9);
        $pdf->SetFillColor(255, 255, 255);

        foreach ($results as $index => $result) {
            // Check if we need a new page - Ajusté pour format paysage
            if ($pdf->GetY() > 180) {
                $pdf->AddPage('L'); // Format paysage pour nouvelle page
                // Repeat header
                $pdf->SetFont('dejavusans', 'B', 10);
                $pdf->SetFillColor(230, 230, 230);
                $pdf->Cell(20, 8, 'N°', 1, 0, 'C', true);
                $pdf->Cell(35, 8, 'Type', 1, 0, 'C', true);
                $pdf->Cell(90, 8, 'Document', 1, 0, 'C', true);
                $pdf->Cell(60, 8, 'Fonctionnaire', 1, 0, 'C', true);
                $pdf->Cell(30, 8, 'PPR', 1, 0, 'C', true);
                $pdf->Cell(30, 8, 'Date', 1, 1, 'C', true);
                $pdf->SetFont('dejavusans', '', 9);
            }

            $pdf->Cell(20, 6, $index + 1, 1, 0, 'C');
            $pdf->Cell(35, 6, $result['type'], 1, 0, 'L');
            $pdf->Cell(90, 6, substr($result['title'], 0, 60) . (strlen($result['title']) > 60 ? '...' : ''), 1, 0, 'L');
            $pdf->Cell(60, 6, substr($result['fonctionnaire'], 0, 35) . (strlen($result['fonctionnaire']) > 35 ? '...' : ''), 1, 0, 'L');
            $pdf->Cell(30, 6, $result['matricule'], 1, 0, 'C');
            $pdf->Cell(30, 6, $result['date'], 1, 1, 'C');
        }

        // Footer
        $pdf->Ln(10);
        $pdf->SetFont('dejavusans', '', 10);
        $pdf->Cell(0, 6, 'Document généré le ' . date('d/m/Y à H:i'), 0, 1, 'R');

        // Output PDF
        $filename = 'recherche_documents_' . date('Y-m-d_H-i-s') . '.pdf';
        return response($pdf->Output($filename, 'S'))
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="' . $filename . '"');
    }

    /**
     * Get document type label
     */
    private function getDocumentTypeLabel($type)
    {
        $labels = [
            'all' => 'Tous les documents',
            'conge' => 'Congés',
            'greve' => 'Listes de grève',
            'certificate' => 'Certificats',
            'attestation' => 'Attestations',
            'mutation' => 'Mutations',
            'position' => 'Positions',
            'fonctionnaire' => 'Fonctionnaires'
        ];

        return $labels[$type] ?? 'Non défini';
    }

    /**
     * Generate Note de Service PDF
     */
    public function generateNoteService(Request $request)
    {
        $request->validate([
            'fonctionnaire_id' => 'required',
            'ampliation_destination' => 'required|string'
        ]);

        $fonctionnaire = Fonctionnaire::with(['specialiteGrade.grade.cadre', 'nomFormationSanitaire'])
            ->findOrFail($request->fonctionnaire_id);

        $ampliationDestination = $request->ampliation_destination;

        return $this->generateNoteServicePDF($fonctionnaire, $ampliationDestination);
    }

    /**
     * Generate Note de Service PDF
     */
    private function generateNoteServicePDF($fonctionnaire, $ampliationDestination)
    {
        $pdf = new CustomPDF();

        // Set document information
        $pdf->SetCreator('GRHDMSP-Fes');
        $pdf->SetAuthor('Med Kaddouri');
        $pdf->SetTitle('Note de Service');
        $pdf->SetSubject('Note de Service');

        // Set header and footer images (same as attestation)
        $pdf->headerImage = public_path('html/assets/img/pdf/header-delegation-urh.png');
        $pdf->footerImage = public_path('html/assets/img/pdf/footer-deligation.png');

        // Set margins (same as attestation)
        $pdf->SetMargins(15, 50, 15);
        $pdf->SetHeaderMargin(20);
        $pdf->SetFooterMargin(20);
        // Disable auto page break to ensure everything stays on one page
        $pdf->SetAutoPageBreak(false);

        // Add page
        $pdf->AddPage();

        // Set font
        $pdf->SetFont('dejavusans', '', 12);

        // Title (centered, bold and underlined)
        $pdf->Ln(10);
        $pdf->SetFont('dejavusans', 'BU', 16);
        $pdf->Cell(0, 10, 'Note de service', 0, 1, 'C');
        $pdf->Ln(15);

        // Content
        $pdf->SetFont('dejavusans', '', 12);

        // Extract fonctionnaire information
        $cadreText = '';
        if ($fonctionnaire->specialiteGrade && $fonctionnaire->specialiteGrade->grade && $fonctionnaire->specialiteGrade->grade->cadre) {
            $cadreText = $fonctionnaire->specialiteGrade->grade->cadre->nom;
        }

        $specialiteText = '';
        if ($fonctionnaire->specialiteGrade) {
            $specialiteText = $fonctionnaire->specialiteGrade->nom;
        }

        $formationSanitaireText = '';
        if ($fonctionnaire->nomFormationSanitaire) {
            $formationSanitaireText = $fonctionnaire->nomFormationSanitaire->nom;
        }

        // Main content using HTML with 2cm interligne between lines
        // 2cm = approximately 56.7pt, so we use line-height for 2cm spacing
        $html = '<div style="font-family: dejavusans; font-size: 12pt;">';

        // First paragraph: Complete information with bold elements and indentation
        // 2cm interligne = margin-bottom: 20mm
        $html .= '<p style="margin-bottom: 20mm; margin-top: 5mm; text-align: justify; text-indent: 30px; line-height: 2;">';
        $html .= 'Mr/Mme ' . $fonctionnaire->nom . ' ' . $fonctionnaire->prenom . ', ' . $cadreText . ', ';
        $html .= '<strong>PPR : ' . $fonctionnaire->ppr . '</strong>, ';
        $html .= '<strong>Spécialité : ' . $specialiteText . '</strong> est affecté à ';
        $html .= '<strong>' . $formationSanitaireText . '</strong>.';
        $html .= '</p>';
 $html .= '</p>';
        // Instructions paragraph with indentation and 2cm spacing
        $html .= '<p style="margin-bottom: 20mm; margin-top: 0; text-align: justify; text-indent: 30px; line-height: 2;">';
        $html .= 'Dès réception de la présente note, l\'intéressé doit se présenter à ' . $ampliationDestination . ' qui lui donnera toutes les instructions utiles pour prendre son service.';
        $html .= '</p>';
 $html .= '</p>';
        // Compte rendu paragraph with indentation and 2cm spacing
        $html .= '<p style="margin-bottom: 20mm; margin-top: 0; text-indent: 30px; line-height: 2;">';
        $html .= 'Un compte rendu de prise de service me sera adressé aux fins utiles.';
        $html .= '</p>';

        // Signature - right aligned, bold and underlined
        $html .= '<p style="margin-top: 10mm; margin-bottom: 5mm; text-align: right; line-height: 2;">';
        $html .= '<strong><u>Le Délégué Préfectoral</u></strong>';
        $html .= '</p>';

        $html .= '</div>';

        // Write main content
        $pdf->writeHTML($html, true, false, true, false, '');

        // Position ampliations at the bottom of the page, close to footer
        $pageHeight = $pdf->getPageHeight();
        $footerMargin = 30; // Footer margin
        $ampliationsHeight = 25; // Height needed for ampliations section

        // Calculate position to place ampliations near the bottom
        $ampliationsY = $pageHeight - $footerMargin - $ampliationsHeight - 5; // 5mm above footer

        // Set position for ampliations
        $pdf->SetY($ampliationsY);

        // Ampliations section using Cell() method like congé decisions
        $pdf->SetFont('dejavusans', 'B', 11);
        $pdf->Cell(0, 6, 'Ampliation :', 0, 1, 'L');
        $pdf->SetFont('dejavusans', '', 11);
        $pdf->Cell(0, 6, '-' . $ampliationDestination, 0, 1, 'L');
        $pdf->Cell(0, 6, '-Intéressé', 0, 1, 'L');
        $pdf->Cell(0, 6, '-Archive', 0, 1, 'L');

        // Output PDF (same style as attestation)
        $filename = 'note_service_' . $fonctionnaire->ppr . '.pdf';
        return response()->streamDownload(
            fn() => $pdf->Output($filename, 'I'),
            $filename
        );
    }

    /**
     * Search greves between two dates
     */
    public function searchGreves(Request $request)
    {
        $request->validate([
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
        ]);

        try {
            $greves = \App\Models\Greve::with(['fonctionnaire.nomFormationSanitaire', 'fonctionnaire.position'])
                ->whereDate('date_debut', '>=', $request->date_debut)
                ->whereDate('date_debut', '<=', $request->date_fin)
                ->orWhere(function($query) use ($request) {
                    $query->whereDate('date_fin', '>=', $request->date_debut)
                          ->whereDate('date_fin', '<=', $request->date_fin);
                })
                ->orWhere(function($query) use ($request) {
                    $query->whereDate('date_debut', '<=', $request->date_debut)
                          ->whereDate('date_fin', '>=', $request->date_fin);
                })
                ->orderBy('date_debut', 'desc')
                ->get();

            // Calculate nombre_jours for each greve
            $greves->each(function($greve) {
                if ($greve->date_debut && $greve->date_fin) {
                    $dateDebut = \Carbon\Carbon::parse($greve->date_debut);
                    $dateFin = \Carbon\Carbon::parse($greve->date_fin);
                    $greve->nombre_jours = $dateDebut->diffInDays($dateFin) + 1;
                } else {
                    $greve->nombre_jours = 0;
                }
            });

            return response()->json([
                'success' => true,
                'greves' => $greves,
                'count' => $greves->count()
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la recherche des grèves: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Export greves to Excel
     */
    public function exportGreves(Request $request)
    {
        // Manual validation to avoid redirect behavior when called from a new tab/form
        if (!$request->filled('date_debut') || !$request->filled('date_fin')) {
            return response('Veuillez fournir une plage de dates (date_debut et date_fin).', 400);
        }

        try {
            // Get greves data
            $greves = \App\Models\Greve::with(['fonctionnaire.nomFormationSanitaire', 'fonctionnaire.position'])
                ->whereDate('date_debut', '>=', $request->date_debut)
                ->whereDate('date_debut', '<=', $request->date_fin)
                ->orWhere(function($query) use ($request) {
                    $query->whereDate('date_fin', '>=', $request->date_debut)
                          ->whereDate('date_fin', '<=', $request->date_fin);
                })
                ->orWhere(function($query) use ($request) {
                    $query->whereDate('date_debut', '<=', $request->date_debut)
                          ->whereDate('date_fin', '>=', $request->date_fin);
                })
                ->orderBy('date_debut', 'desc')
                ->get();

            // Create Excel file
            $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Set headers (added Position column)
            $headers = [
                'A1' => 'PPR',
                'B1' => 'Nom',
                'C1' => 'Prénom',
                'D1' => 'Position',
                'E1' => 'Date début',
                'F1' => 'Date fin',
                'G1' => 'Nombre de jours',
                'H1' => 'Formation sanitaire',
                'I1' => 'Remarque'
            ];

            foreach ($headers as $cell => $header) {
                $sheet->setCellValue($cell, $header);
                $sheet->getStyle($cell)->getFont()->setBold(true);
                $sheet->getStyle($cell)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('FFE0E0E0');
            }

            // Add data
            $row = 2;
            foreach ($greves as $greve) {
                $nombreJours = 0;
                if ($greve->date_debut && $greve->date_fin) {
                    $dateDebut = \Carbon\Carbon::parse($greve->date_debut);
                    $dateFin = \Carbon\Carbon::parse($greve->date_fin);
                    $nombreJours = $dateDebut->diffInDays($dateFin) + 1;
                }

                $sheet->setCellValue('A' . $row, optional($greve->fonctionnaire)->ppr ?? '');
                $sheet->setCellValue('B' . $row, optional($greve->fonctionnaire)->nom ?? '');
                $sheet->setCellValue('C' . $row, optional($greve->fonctionnaire)->prenom ?? '');
                $sheet->setCellValue('D' . $row, optional(optional($greve->fonctionnaire)->position)->nom ?? '');
                $sheet->setCellValue('E' . $row, $greve->date_debut ?? '');
                $sheet->setCellValue('F' . $row, $greve->date_fin ?? '');
                $sheet->setCellValue('G' . $row, $nombreJours);
                $sheet->setCellValue('H' . $row, optional(optional($greve->fonctionnaire)->nomFormationSanitaire)->nom ?? '');
                $sheet->setCellValue('I' . $row, $greve->remarque ?? '');

                $row++;
            }

            // Auto-size columns
            foreach (range('A', 'I') as $column) {
                $sheet->getColumnDimension($column)->setAutoSize(true);
            }

            // Add borders
            $styleArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
            ];
            $sheet->getStyle('A1:I' . ($row - 1))->applyFromArray($styleArray);

            // Generate filename
            $filename = 'greves_' . $request->date_debut . '_' . $request->date_fin . '_' . date('Y-m-d_H-i-s') . '.xlsx';

            // Create writer
            $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);

            // Stream download response (Laravel-friendly)
            return response()->streamDownload(function() use ($writer) {
                $writer->save('php://output');
            }, $filename, [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
            ]);

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de l\'export: ' . $e->getMessage());
        }
    }

    /**
     * Export greves (posted JSON) to PDF
     */
    public function exportGrevesPdf(Request $request)
    {
        // Accept either posted JSON 'greves' or a date range (server-side query)
        $grevesInput = $request->input('greves');
        $greves = null;

        if ($grevesInput) {
            $greves = json_decode($grevesInput, true);
        } elseif ($request->filled('date_debut') && $request->filled('date_fin')) {
            // server-side query
            $grevesCollection = \App\Models\Greve::with(['fonctionnaire.nomFormationSanitaire', 'fonctionnaire.position'])
                ->whereDate('date_debut', '>=', $request->date_debut)
                ->whereDate('date_debut', '<=', $request->date_fin)
                ->orWhere(function($query) use ($request) {
                    $query->whereDate('date_fin', '>=', $request->date_debut)
                          ->whereDate('date_fin', '<=', $request->date_fin);
                })
                ->orWhere(function($query) use ($request) {
                    $query->whereDate('date_debut', '<=', $request->date_debut)
                          ->whereDate('date_fin', '>=', $request->date_fin);
                })
                ->orderBy('date_debut', 'desc')
                ->get();

            // map to array structure similar to frontend
            $greves = $grevesCollection->map(function($g) {
                return [
                    'fonctionnaire' => [
                        'ppr' => optional($g->fonctionnaire)->ppr ?? '',
                        'nom' => optional($g->fonctionnaire)->nom ?? '',
                        'prenom' => optional($g->fonctionnaire)->prenom ?? '',
                        'position' => optional(optional($g->fonctionnaire)->position)->nom ?? '',
                        'nom_formation_sanitaire' => optional(optional($g->fonctionnaire)->nomFormationSanitaire)->nom ?? ''
                    ],
                    'date_debut' => $g->date_debut,
                    'date_fin' => $g->date_fin,
                    'nombre_jours' => ($g->date_debut && $g->date_fin) ? (\Carbon\Carbon::parse($g->date_debut)->diffInDays(\Carbon\Carbon::parse($g->date_fin)) + 1) : 0,
                    'remarque' => $g->remarque ?? ''
                ];
            })->toArray();
        }

        if (empty($greves) || !is_array($greves)) {
            return response('Aucune donnée de grève fournie pour l\'export PDF.', 400);
        }

        // Create PDF in landscape to fit many columns
        $pdf = new \TCPDF('L', 'mm', 'A4');
        $pdf->SetCreator('Application GRH-DMSPS Fès');
        $pdf->SetAuthor('DMSPS Fès');
        $pdf->SetTitle('Listes des grèves');
        $pdf->SetSubject('Listes des grèves');

        // Margins and page
        $pdf->SetMargins(15, 10, 15);
        $pdf->SetAutoPageBreak(true, 15);
        $pdf->AddPage('L');
        $pdf->SetFont('dejavusans', 'B', 14);
        $pdf->Cell(0, 8, 'LISTE DES GRÈVES', 0, 1, 'C');
        $pdf->Ln(4);

        // Table header
        $pdf->SetFont('dejavusans', 'B', 10);
        $pdf->SetFillColor(230, 230, 230);

        // Column widths (mm)
        $w = [
            'ppr' => 20,
            'nom' => 45,
            'prenom' => 40,
            'position' => 35,
            'formation' => 50,
            'debut' => 20,
            'fin' => 20,
            'jours' => 14,
            'remarque' => 30,
        ];

        // Header cells
        $pdf->Cell($w['ppr'], 8, 'PPR', 1, 0, 'C', true);
        $pdf->Cell($w['nom'], 8, 'Nom', 1, 0, 'C', true);
        $pdf->Cell($w['prenom'], 8, 'Prénom', 1, 0, 'C', true);
        $pdf->Cell($w['position'], 8, 'Position', 1, 0, 'C', true);
        $pdf->Cell($w['formation'], 8, 'Formation', 1, 0, 'C', true);
        $pdf->Cell($w['debut'], 8, 'Début', 1, 0, 'C', true);
        $pdf->Cell($w['fin'], 8, 'Fin', 1, 0, 'C', true);
        $pdf->Cell($w['jours'], 8, 'Jours', 1, 0, 'C', true);
        $pdf->Cell($w['remarque'], 8, 'Remarque', 1, 1, 'C', true);

        $pdf->SetFont('dejavusans', '', 9);

        foreach ($greves as $g) {
            $ppr = $g['fonctionnaire']['ppr'] ?? ($g['matricule'] ?? '');
            $nom = $g['fonctionnaire']['nom'] ?? '';
            $prenom = $g['fonctionnaire']['prenom'] ?? '';
            $position = $g['fonctionnaire']['position'] ?? ($g['position'] ?? '');
            $formation = $g['fonctionnaire']['nom_formation_sanitaire'] ?? ($g['fonctionnaire']['nomFormationSanitaire']['nom'] ?? '');
            $dateDeb = $g['date_debut'] ?? '';
            $dateFin = $g['date_fin'] ?? '';
            $jours = isset($g['nombre_jours']) ? $g['nombre_jours'] : 0;
            $remarque = $g['remarque'] ?? '';

            $pdf->Cell($w['ppr'], 7, $ppr, 1, 0, 'C');
            $pdf->Cell($w['nom'], 7, substr($nom, 0, 80), 1, 0, 'L');
            $pdf->Cell($w['prenom'], 7, substr($prenom, 0, 60), 1, 0, 'L');
            $pdf->Cell($w['position'], 7, substr($position, 0, 40), 1, 0, 'L');
            $pdf->Cell($w['formation'], 7, substr($formation, 0, 80), 1, 0, 'L');
            $pdf->Cell($w['debut'], 7, $dateDeb, 1, 0, 'C');
            $pdf->Cell($w['fin'], 7, $dateFin, 1, 0, 'C');
            $pdf->Cell($w['jours'], 7, $jours, 1, 0, 'C');
            $pdf->Cell($w['remarque'], 7, substr($remarque, 0, 120), 1, 1, 'L');
        }

        $filename = 'greves_' . date('Y-m-d_H-i-s') . '.pdf';
        return response($pdf->Output($filename, 'S'))
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="' . $filename . '"');
    }
}
