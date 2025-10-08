<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use App\Models\Ecole;
use App\Models\Option;
use App\Models\Service;
use App\Models\NomFormationSanitaire;
use App\Models\Encadrant;
use App\Models\IntituleFormation;
use App\Models\TypeStage;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Utils\CustomPDF;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('stages.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ecoles = Ecole::all();
        $options = Option::all();
        $services = Service::all();
        $formationSanitaires = NomFormationSanitaire::all();
        $encadrants = Encadrant::all();
        $intituleFormations = IntituleFormation::where('actif', true)->get();
        $typeStages = TypeStage::all();

        return view('stages.create', compact('ecoles', 'options', 'services', 'formationSanitaires', 'encadrants', 'intituleFormations', 'typeStages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation de base
        $rules = [
            'nom_prenom' => 'required|string|max:255',
            'cin' => 'required|string|max:255',
            'institut_details' => 'required|string',
            'duree' => 'required|integer|min:1',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
            'hierarchie' => 'required|string|max:255',
            'cadre' => 'required|in:médical,administratif',
            'type_stage_id' => 'required|exists:type_stages,id',
            'ecole_id' => 'required|exists:ecoles,id',
            'option_id' => 'required|exists:options,id',
            'service_id' => 'required|exists:services,id',
            'formation_sanitaire_id' => 'required|exists:nom_formation_sanitaires,id',
            'encadrant_id' => 'required|exists:encadrants,id',
        ];

        $request->validate($rules);

        try {
            Stage::create($request->all());
            return redirect()->route('stages.index')->with('success', 'Stage ajouté avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de l\'ajout du stage.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $stage = Stage::with(['ecole', 'option', 'service', 'formationSanitaire', 'encadrant'])->findOrFail($id);
        return view('stages.show', compact('stage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $stage = Stage::findOrFail($id);
        $ecoles = Ecole::all();
        $options = Option::all();
        $services = Service::all();
        $formationSanitaires = NomFormationSanitaire::all();
        $encadrants = Encadrant::all();
        $typeStages = TypeStage::all();

        return view('stages.edit', compact('stage', 'ecoles', 'options', 'services', 'formationSanitaires', 'encadrants', 'typeStages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validation de base
        $rules = [
            'nom_prenom' => 'required|string|max:255',
            'cin' => 'required|string|max:255',
            'institut_details' => 'required|string',
            'duree' => 'required|integer|min:1',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
            'hierarchie' => 'required|string|max:255',
            'cadre' => 'required|in:médical,administratif',
            'type_stage_id' => 'required|exists:type_stages,id',
            'ecole_id' => 'required|exists:ecoles,id',
            'option_id' => 'required|exists:options,id',
            'service_id' => 'required|exists:services,id',
            'formation_sanitaire_id' => 'required|exists:nom_formation_sanitaires,id',
            'encadrant_id' => 'required|exists:encadrants,id',
        ];

        $request->validate($rules);

        try {
            $stage = Stage::findOrFail($id);
            $stage->update($request->all());
            return redirect()->route('stages.index')->with('success', 'Stage mis à jour avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la mise à jour du stage.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Stage::findOrFail($id)->delete();
            return redirect()->back()->with('success', 'Stage supprimé avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la suppression du stage.');
        }
    }

    /**
     * Get data for DataTables
     */
    public function data(Request $request)
    {
        $query = Stage::with(['ecole', 'option', 'service', 'formationSanitaire', 'encadrant']);

        return DataTables::of($query)
            ->addColumn('action', function ($data) {
                return view('stages.action', compact('data'))->render();
            })
            ->editColumn('date_debut', function ($data) {
                return $data->date_debut->format('d/m/Y');
            })
            ->editColumn('date_fin', function ($data) {
                return $data->date_fin->format('d/m/Y');
            })
            ->editColumn('statut_attestation', function ($data) {
                $badgeClass = match($data->statut_attestation) {
                    'traité' => 'bg-success',
                    'en cours' => 'bg-warning',
                    'pas en cours' => 'bg-danger',
                    default => 'bg-secondary'
                };
                return '<span class="badge ' . $badgeClass . '">' . $data->statut_attestation . '</span>';
            })
            ->rawColumns(['action', 'statut_attestation'])
            ->toJson();
    }

    /**
     * Export stages to Excel
     */
    public function export()
    {
        $stages = Stage::with(['ecole', 'option', 'service', 'formationSanitaire', 'encadrant'])->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // En-têtes
        $headers = [
            'Nom & Prénom', 'CIN', 'École', 'Option', 'Formation Sanitaire', 'Service',
            'Encadrant', 'Date Début', 'Date Fin', 'Durée (jours)', 'Cadre', 'Type',
            'Statut', 'Hiérarchie', 'Avis'
        ];

        $col = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($col . '1', $header);
            $col++;
        }

        // Données
        $row = 2;
        foreach ($stages as $stage) {
            $sheet->setCellValue('A' . $row, $stage->nom_prenom);
            $sheet->setCellValue('B' . $row, $stage->cin);
            $sheet->setCellValue('C' . $row, $stage->ecole->nom);
            $sheet->setCellValue('D' . $row, $stage->option->nom);
            $sheet->setCellValue('E' . $row, $stage->formationSanitaire->nom);
            $sheet->setCellValue('F' . $row, $stage->service->nom);
            $sheet->setCellValue('G' . $row, $stage->encadrant->nom);
            $sheet->setCellValue('H' . $row, $stage->date_debut->format('d/m/Y'));
            $sheet->setCellValue('I' . $row, $stage->date_fin->format('d/m/Y'));
            $sheet->setCellValue('J' . $row, $stage->duree);
            $sheet->setCellValue('K' . $row, $stage->cadre);
            $sheet->setCellValue('L' . $row, $stage->type_stage);
            $sheet->setCellValue('M' . $row, $stage->statut_attestation);
            $sheet->setCellValue('N' . $row, $stage->hierarchie);
            $sheet->setCellValue('O' . $row, $stage->avis);
            $row++;
        }

        $fileName = 'stages_' . date('Y-m-d_H-i-s') . '.xlsx';
        $filePath = storage_path("app/public/{$fileName}");

        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend();
    }

    /**
     * Export stages to PDF
     */
    public function pdf()
    {
        $stages = Stage::with(['ecole', 'option', 'service', 'formationSanitaire', 'encadrant'])->get();

        $pdf = new CustomPDF();

        // Set document information
        $pdf->SetCreator('GRHDMSP-Fes');
        $pdf->SetAuthor('Med Kaddouri');
        $pdf->SetTitle('Liste des Stages');
        $pdf->SetSubject('Export PDF');

        // Set header and footer images
        $pdf->headerImage = public_path('html/assets/img/pdf/header-delegation.png');
        $pdf->footerImage = public_path('html/assets/img/pdf/footer-deligation.png');

        // Set margins
        $pdf->SetMargins(15, 50, 15);
        $pdf->SetHeaderMargin(20);
        $pdf->SetFooterMargin(20);

        // Set Auto Page Break
        $pdf->SetAutoPageBreak(true, 30);

        // Add a page
        $pdf->AddPage('L'); // Landscape pour plus d'espace

        // Set font
        $pdf->SetFont('dejavusans', '', 10);

        // Add content
        $html = '<h2 style="text-align: center;">Liste des Demandes de Stage</h2>';
        $html .= '<table border="1" cellspacing="0" cellpadding="3" style="width: 100%; text-align: center; border-collapse: collapse; margin-top: 20px; font-size: 8px;">
                    <thead>
                        <tr style="background-color: #4b75ff; color: white; font-weight: bold;">
                            <th>Nom & Prénom</th>
                            <th>CIN</th>
                            <th>École</th>
                            <th>Option</th>
                            <th>Formation Sanitaire</th>
                            <th>Service</th>
                            <th>Date Début</th>
                            <th>Date Fin</th>
                            <th>Durée</th>
                            <th>Statut</th>
                        </tr>
                    </thead>
                    <tbody>';

        foreach ($stages as $stage) {
            $html .= '<tr>
                        <td>' . $stage->nom_prenom . '</td>
                        <td>' . $stage->cin . '</td>
                        <td>' . $stage->ecole->nom . '</td>
                        <td>' . $stage->option->nom . '</td>
                        <td>' . $stage->formationSanitaire->nom . '</td>
                        <td>' . $stage->service->nom . '</td>
                        <td>' . $stage->date_debut->format('d/m/Y') . '</td>
                        <td>' . $stage->date_fin->format('d/m/Y') . '</td>
                        <td>' . $stage->duree . ' jours</td>
                        <td>' . $stage->statut_attestation . '</td>
                      </tr>';
        }

        $html .= '</tbody></table>';

        // Write HTML content
        $pdf->writeHTML($html, true, false, true, false, '');

        // Output PDF to the browser
        return response()->streamDownload(
            fn() => $pdf->Output('stages.pdf', 'I'),
            'stages.pdf'
        );
    }

    /**
     * Generate attestation de stage PDF
     */
    public function attestation($id)
    {
        $stage = Stage::with(['ecole', 'option', 'service', 'formationSanitaire', 'encadrant'])->findOrFail($id);

        $pdf = new CustomPDF();

        // Set document information
        $pdf->SetCreator('GRHDMSP-Fes');
        $pdf->SetAuthor('Med Kaddouri');
        $pdf->SetTitle('Attestation de Stage');
        $pdf->SetSubject('Export PDF');

        // Set header and footer images
        $pdf->headerImage = public_path('html/assets/img/pdf/header-delegation-urh.png');
        $pdf->footerImage = public_path('html/assets/img/pdf/footer-deligation.png');

        // Set margins
        $pdf->SetMargins(15, 50, 15);
        $pdf->SetHeaderMargin(20);
        $pdf->SetFooterMargin(20);

        // Set Auto Page Break
        $pdf->SetAutoPageBreak(true, 30);

        // Add a page
        $pdf->AddPage();

        // Set font
        $pdf->SetFont('dejavusans', '', 12);

        // Add content - Format officiel de l'attestation
        $html = '<div style="text-align: center; margin-bottom: 30px;">
                    <h1 style="font-size: 18px; margin: 0; text-decoration: underline; font-weight: bold;">ATTESTATION DE STAGE</h1>
                </div>';

        $html .= '<div style="line-height: 1.6; font-size: 12px; text-align: justify;">';

        // Récupérer le type de stage depuis la relation ou le champ direct
        $typeStage = $stage->typeStage ? $stage->typeStage->nom : $stage->type_stage;

        $html .= '<p style="margin: 20px 0; text-align: justify; line-height: 1.8;">
                    Je soussigné, Mr. Le Délégué du ministère de la santé et de la protection sociale à la préfecture de FES, atteste par la présente que <strong>' . $stage->nom_prenom . '</strong>, CIN : <strong>' . $stage->cin . '</strong>, <strong>' . $stage->institut_details . '</strong>, <strong>' . $stage->ecole->nom . '</strong> - option : <strong>' . $stage->option->nom . '</strong> a effectué(e) un stage <strong>' . $typeStage . '</strong> au <strong>' . $stage->formationSanitaire->nom . '</strong>, Service : <strong>' . $stage->service->nom . '</strong>, d\'une durée de <strong>' . $stage->duree . ' jours</strong> et ce à compter du <strong>' . \Carbon\Carbon::parse($stage->date_debut)->format('d/m/Y') . '</strong> au <strong>' . \Carbon\Carbon::parse($stage->date_fin)->format('d/m/Y') . '</strong>.
                  </p>';

        $html .= '<p style="margin: 20px 0; text-align: justify;">
                    Nous délivrons la présente attestation, suite à sa demande, pour servir et valoir ce que de droit.
                  </p>';

        $html .= '<br><br>';

        $html .= '<div style="text-align: right; margin-top: 40px;">
                    <p style="margin: 5px 0; font-weight: bold;">Le Délégué Préfectoral</p>
                  </div>';

        // Ampliations en bas à gauche de la page (sans délégation)
        $html .= '<div style="position: absolute; bottom: 5px; left: 20px; text-align: left; line-height: 1;">
                    <p style="margin: 0; padding: 0; font-weight: normal; font-size: 8px;">AMPLIATIONS :</p>
                    <p style="margin: 0; padding: 0; font-size: 7px;">- ' . $stage->hierarchie . '</p>
                    <p style="margin: 0; padding: 0; font-size: 7px;">- L\'INTERESSEE.</p>
                    <p style="margin: 0; padding: 0; font-size: 7px;">- ARCHIVE.</p>
                  </div>';

        $html .= '</div>';

        // Write HTML content for first page
        $pdf->writeHTML($html, true, false, true, false, '');

        // Add second page - Bordereau d'envoi
        $pdf->AddPage();

        // Second page content - Sans espace en haut
        $html2 = '<div style="line-height: 1.2; font-size: 11px; margin-top: 0; padding-top: 0;">';

        // Header - Centré en haut sans espaces excessifs
        $html2 .= '<div style="text-align: center; margin: 0; padding: 0;">
                    <p style="margin: 0; padding: 0; font-size: 12px; font-weight: bold;">
                    LE DELEGUE DU MINISTERE DE LA SANTE ET DE
                    <br>LA PROTECTION SOCIALE A LA PREFECTURE DE FES
                    <br>A
                    <br>(' . $stage->hierarchie . ')</p>
                  </div>';

        $html2 .= '<div style="text-align: center; margin: 2px 0;">
                    <h2 style="font-size: 14px; margin: 0; text-decoration: underline; font-weight: bold;">BORDEREAU D\'ENVOI</h2>
                  </div>';

        // Table avec titres centrés
        $html2 .= '<table style="width: 100%; border-collapse: collapse; margin: 10px 0; border: 2px solid #000;">
                    <thead>
                        <tr>
                            <th style="background-color: #f0f0f0; font-weight: bold; text-align: center; width: 45%; font-size: 13px; padding: 20px 10px; border: 1px solid #000; vertical-align: middle;">
                                <div style="text-align: center; padding: 10px 0;">DESIGNATION</div>
                            </th>
                            <th style="background-color: #f0f0f0; font-weight: bold; text-align: center; width: 20%; font-size: 13px; padding: 20px 10px; border: 1px solid #000; vertical-align: middle;">
                                <div style="text-align: center; padding: 10px 0;">QUANTITE</div>
                            </th>
                            <th style="background-color: #f0f0f0; font-weight: bold; text-align: center; width: 35%; font-size: 13px; padding: 20px 10px; border: 1px solid #000; vertical-align: middle;">
                                <div style="text-align: center; padding: 10px 0;">OBSERVATIONS</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="vertical-align: top; padding: 10px; font-size: 10px; text-align: left; border: 1px solid #000; width: 45%;">
                                <table style="width: 100%; border: none; margin: 0; padding: 0;">
                                    <tr>
                                        <td style="border: none; padding: 0; margin: 0; vertical-align: top;">
                                            <p style="margin: 2px 0;"><strong>- Attestation de Stage (' . $typeStage . ')</strong></p>
                                        </td>
                                    </tr>
                                </table>
                                <br>
                                <p style="margin: 2px 0;"><strong>Concernant :</strong></p>
                                <p style="margin: 1px 0;">- Nom prénom : <strong>' . $stage->nom_prenom . '</strong></p>
                                <p style="margin: 1px 0;">- ' . $stage->ecole->nom . '</p>
                                <p style="margin: 1px 0;">- CIN/PPR : <strong>' . $stage->cin . '</strong></p>
                                <p style="margin: 1px 0;">- Option : <strong>' . $stage->option->nom . '</strong></p>
                                <p style="margin: 1px 0;">- STAGE à <strong>' . $stage->formationSanitaire->nom . '</strong></p>
                                <br><br>
                            </td>
                            <td style="text-align: center; vertical-align: bottom; font-weight: normal; font-size: 10px; padding: 10px; border: 1px solid #000; width: 20%; position: relative; height: 200px;">
                                <div style="position: absolute; bottom: 20px; left: 50%; transform: translateX(-50%);">01</div>
                            </td>
                            <td style="text-align: center; vertical-align: top; font-style: italic; font-size: 10px; padding: 10px; padding-top: 100px; border: 1px solid #000; width: 35%;">
                                « Soit Transmis pour toutes fins utiles »
                            </td>
                        </tr>
                    </tbody>
                  </table>';

        // Signature à droite
        $html2 .= '<div style="text-align: right; margin-top: 20px;">
                    <p style="margin: 2px 0; font-weight: bold; font-size: 12px;">LE DELEGUE PREFECTORAL</p>
                  </div>';

        // Espace de 4 lignes entre signature et ampliations
        $html2 .= '<br><br><br><br>';

        // Ampliations à gauche avec espace ajouté
        $html2 .= '<div style="text-align: left; margin-top: 40px; margin-left: 20px; line-height: 1;">
                    <p style="margin: 0; padding: 0; font-weight: normal; font-size: 8px;">AMPLIATIONS :</p>
                    <p style="margin: 0; padding: 0; font-size: 7px;">- ' . $stage->hierarchie . '</p>
                    <p style="margin: 0; padding: 0; font-size: 7px;">- L\'INTERESSEE.</p>
                    <p style="margin: 0; padding: 0; font-size: 7px;">- ARCHIVE.</p>
                  </div>';

        $html2 .= '</div>';

        // Write HTML content for second page
        $pdf->writeHTML($html2, true, false, true, false, '');

        // Generate filename
        $filename = 'attestation_stage_' . $stage->nom_prenom . '_' . date('Y-m-d') . '.pdf';

        // Output PDF to the browser
        return response()->streamDownload(
            fn() => $pdf->Output($filename, 'I'),
            $filename
        );
    }

    /**
     * Get stage data for API
     */
    public function getStageData($id)
    {
        try {
            $stage = Stage::with([
                'ecole',
                'option',
                'service',
                'formationSanitaire',
                'encadrant',
                'typeStage'
            ])->findOrFail($id);

            return response()->json($stage);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Stage non trouvé'
            ], 404);
        }
    }

    /**
     * Generate Note PDF
     */
    public function generateNotePDF(Request $request)
    {
        $request->validate([
            'stage_id' => 'required|exists:stages,id',
            'content' => 'required|string'
        ]);

        try {
            $stage = Stage::with([
                'ecole',
                'option',
                'service',
                'formationSanitaire',
                'encadrant',
                'typeStage'
            ])->findOrFail($request->stage_id);

            $pdf = new CustomPDF();

            // Set document information
            $pdf->SetCreator('GRHDMSP-Fes');
            $pdf->SetAuthor('Med Kaddouri');
            $pdf->SetTitle('Note de Stage - ' . $stage->nom_prenom);
            $pdf->SetSubject('Note de Stage');

            // Set header and footer images
            $pdf->headerImage = public_path('html/assets/img/pdf/header-delegation.png');
            $pdf->footerImage = public_path('html/assets/img/pdf/footer-deligation.png');

            // Set margins
            $pdf->SetMargins(20, 60, 20); // Left, Top, Right
            $pdf->SetHeaderMargin(20);
            $pdf->SetFooterMargin(20);

            // Set Auto Page Break
            $pdf->SetAutoPageBreak(true, 30);

            // Add a page
            $pdf->AddPage();

            // Set font
            $pdf->SetFont('dejavusans', '', 11);

            // Récupérer le type de stage
            $typeStage = $stage->typeStage ? $stage->typeStage->nom : $stage->type_stage;

            // Contenu standardisé de la note de stage
            $html = '<div style="line-height: 1.6; font-size: 11px;">';

            $html .= '<p style="margin: 20px 0; text-align: justify; line-height: 1.8;">
                        Suite à la demande de l\'intéressé(e) et à l\'avis favorable de la hiérarchie, <strong>' . $stage->nom_prenom . '</strong>, CIN : <strong>' . $stage->cin . '</strong>, <strong>' . $stage->details_institut . '</strong>, Option : <strong>' . $stage->option->nom . '</strong> est autorisé(e) à effectuer un stage <strong>' . $typeStage . '</strong> au <strong>' . $stage->formationSanitaire->nom . '</strong>, au <strong>' . $stage->service->nom . '</strong> d\'une durée de <strong>' . $stage->duree . ' jours</strong> et ce à compter du <strong>' . \Carbon\Carbon::parse($stage->date_debut)->format('d/m/Y') . '</strong>.
                      </p>';

            $html .= '<p style="margin: 20px 0; text-align: justify; line-height: 1.8;">
                        A cet effet, L\'intéressé(e) est invité(e) à respecter la réglementation en vigueur, et de se limiter aux attributions qui lui sont assignées lors de son stage et de se présenter au moment opportun <strong>' . $stage->hierarchie . '</strong> qui lui donnera toutes les instructions utiles pour entamer son stage.
                      </p>';

            $html .= '<p style="margin: 20px 0; text-align: justify; line-height: 1.8;">
                        Un compte rendu de prise de service me sera adressé aux fins utiles.
                      </p>';

            $html .= '<p style="margin: 20px 0; text-align: justify; line-height: 1.8;">
                        <strong>NB :</strong> l\'encadrement et le tutorat du Stagiaire est assuré par : <strong>' . ($stage->encadrant ? $stage->encadrant->nom : 'Non spécifié') . '</strong>
                      </p>';

            $html .= '<p style="margin: 20px 0; text-align: left; line-height: 1.8;">
                        <strong>Pièce Jointe</strong><br>
                        - Fiche d\'évaluation du stagiaire.
                      </p>';

            $html .= '<div style="text-align: right; margin-top: 40px;">
                        <p style="margin: 5px 0; font-weight: bold;">Le Délégué Préfectoral</p>
                      </div>';

            // Ampliations en bas à gauche
            $html .= '<div style="position: absolute; bottom: 5px; left: 20px; text-align: left; line-height: 1;">
                        <p style="margin: 0; padding: 0; font-weight: normal; font-size: 8px;">AMPLIATIONS :</p>
                        <p style="margin: 0; padding: 0; font-size: 7px;">- ' . $stage->hierarchie . '</p>
                        <p style="margin: 0; padding: 0; font-size: 7px;">- L\'INTERESSEE.</p>
                        <p style="margin: 0; padding: 0; font-size: 7px;">- ARCHIVE.</p>
                      </div>';

            $html .= '</div>';

            // Write HTML content
            $pdf->writeHTML($html, true, false, true, false, '');

            // Generate filename
            $filename = 'note_stage_' . $stage->nom_prenom . '_' . date('Y-m-d') . '.pdf';

            // Output PDF
            return response()->streamDownload(
                fn() => $pdf->Output($filename, 'I'),
                $filename
            );

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de la génération du PDF: ' . $e->getMessage());
        }
    }

    /**
     * Generate Note Stage PDF
     */
    public function noteStage($id)
    {
        try {
            $stage = Stage::with([
                'ecole',
                'option',
                'service',
                'formationSanitaire',
                'encadrant',
                'typeStage'
            ])->findOrFail($id);

            $pdf = new CustomPDF();

            // Set document information
            $pdf->SetCreator('GRHDMSP-Fes');
            $pdf->SetAuthor('Med Kaddouri');
            $pdf->SetTitle('Note de Stage - ' . $stage->nom_prenom);
            $pdf->SetSubject('Note de Stage');

            // Set header and footer images
            $pdf->headerImage = public_path('html/assets/img/pdf/header-delegation.png');
            $pdf->footerImage = public_path('html/assets/img/pdf/footer-deligation.png');

            // Set margins
            $pdf->SetMargins(20, 60, 20); // Left, Top, Right
            $pdf->SetHeaderMargin(20);
            $pdf->SetFooterMargin(20);

            // Set Auto Page Break
            $pdf->SetAutoPageBreak(true, 30);

            // Add a page
            $pdf->AddPage();

            // Set font
            $pdf->SetFont('dejavusans', '', 11);

            // Récupérer le type de stage
            $typeStage = $stage->typeStage ? $stage->typeStage->nom : $stage->type_stage;

            // Contenu de la note de stage - compact pour une seule page
            $html = '<div style="line-height: 1.4; font-size: 11px; margin-top: 0; padding-top: 0;">';

            // Titre centré sans en-tête
            $html .= '<div style="text-align: center; margin: 0; padding: 0;">
                        <h1 style="font-size: 16px; font-weight: bold; margin: 0; padding: 0;">NOTE STAGE</h1>
                      </div>';

            // Premier paragraphe avec format exact
            $html .= '<p style="margin: 15px 0; text-align: justify; line-height: 1.5;">
                        Suite à la demande de l\'intéressé(e) et à l\'avis favorable de la hiérarchie, <strong>' . $stage->nom_prenom . '</strong>, CIN : <strong>' . $stage->cin . '</strong>, <strong>' . $stage->institut_details . '</strong>, <strong>' . $stage->ecole->nom . '</strong>, Option : <strong>' . $stage->option->nom . '</strong> est autorisé(e) à effectuer un stage <strong>' . $typeStage . '</strong> au <strong>' . $stage->formationSanitaire->nom . '</strong>, au <strong>' . $stage->service->nom . '</strong> d\'une durée de <strong>' . $stage->duree . ' jours</strong> et ce à compter du <strong>' . \Carbon\Carbon::parse($stage->date_debut)->format('d/m/Y') . '</strong>.
                      </p>';

            // Deuxième paragraphe - compact
            $html .= '<p style="margin: 15px 0; text-align: justify; line-height: 1.5;">
                        A cet effet, L\'intéressé(e) est invité(e) à respecter la réglementation en vigueur, et de se limiter aux attributions qui lui sont assignées lors de son stage et de se présenter au moment opportun <strong>' . $stage->hierarchie . '</strong> qui lui donnera toutes les instructions utiles pour entamer son stage.
                      </p>';

            // Troisième paragraphe - compact
            $html .= '<p style="margin: 15px 0; text-align: justify; line-height: 1.5;">
                        Un compte rendu de prise de service me sera adressé aux fins utiles.
                      </p>';

            // Note sur l'encadrement - compact
            $html .= '<p style="margin: 15px 0; text-align: justify; line-height: 1.5;">
                        <strong>NB :</strong> l\'encadrement et le tutorat du Stagiaire est assuré par : <strong>' . ($stage->encadrant ? $stage->encadrant->nom : 'Non spécifié') . '</strong>
                      </p>';

            // Pièce jointe - compact
            $html .= '<p style="margin: 15px 0; text-align: left; line-height: 1.5;">
                        <strong>Pièce Jointe</strong><br>
                        - Fiche d\'évaluation du stagiaire.
                      </p>';

            // Signature - compact
            $html .= '<div style="text-align: right; margin-top: 25px;">
                        <p style="margin: 3px 0; font-weight: bold;">Le Délégué Préfectoral</p>
                      </div>';

            // Ampliations en bas à gauche
            $html .= '<div style="position: absolute; bottom: 5px; left: 20px; text-align: left; line-height: 1;">
                        <p style="margin: 0; padding: 0; font-weight: normal; font-size: 8px;">AMPLIATIONS :</p>
                        <p style="margin: 0; padding: 0; font-size: 7px;">- ' . $stage->hierarchie . '</p>
                        <p style="margin: 0; padding: 0; font-size: 7px;">- L\'INTERESSEE.</p>
                        <p style="margin: 0; padding: 0; font-size: 7px;">- ARCHIVE.</p>
                      </div>';

            $html .= '</div>';

            // Write HTML content for first page
            $pdf->writeHTML($html, true, false, true, false, '');

            // Add second page - Bordereau d'envoi (comme attestation)
            $pdf->AddPage();

            // Second page content - Ultra compact pour une seule page
            $html2 = '<div style="line-height: 1.1; font-size: 9px; margin: 0; padding: 0;">';

            // Header - Avec taille augmentée
            $html2 .= '<div style="text-align: center; margin: 0; padding: 0;">
                        <p style="margin: 0; padding: 0; font-size: 13px; font-weight: bold;">
                        LE DELEGUE DU MINISTERE DE LA SANTE ET DE
                        <br>LA PROTECTION SOCIALE A LA PREFECTURE DE FES
                        <br>A
                        <br>(' . $stage->hierarchie . ')</p>
                      </div>';

            $html2 .= '<div style="text-align: center; margin: 3px 0;">
                        <h2 style="font-size: 11px; margin: 0; text-decoration: underline; font-weight: bold;">BORDEREAU D\'ENVOI</h2>
                      </div>';

            // Table avec titres agrandis et 01 aligné
            $html2 .= '<table style="width: 100%; border-collapse: collapse; margin: 2px 0; border: 2px solid #000;">
                        <thead>
                            <tr>
                                <th style="background-color: #f0f0f0; font-weight: bold; text-align: center; width: 45%; font-size: 14px; padding: 20px 15px; padding-top: 25px; padding-bottom: 25px; border: 1px solid #000; vertical-align: middle;">DESIGNATION</th>
                                <th style="background-color: #f0f0f0; font-weight: bold; text-align: center; width: 20%; font-size: 14px; padding: 20px 15px; padding-top: 25px; padding-bottom: 25px; border: 1px solid #000; vertical-align: middle;">QUANTITE</th>
                                <th style="background-color: #f0f0f0; font-weight: bold; text-align: center; width: 35%; font-size: 14px; padding: 20px 15px; padding-top: 25px; padding-bottom: 25px; border: 1px solid #000; vertical-align: middle;">OBSERVATIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="vertical-align: top; padding: 12px; font-size: 10px; text-align: left; border: 1px solid #000; width: 45%;">
                                    <p style="margin: 2px 0;"><strong>- Note de Stage (' . $typeStage . ')</strong></p>
                                    <br>
                                    <p style="margin: 2px 0;"><strong>Concernant :</strong></p>
                                    <p style="margin: 1px 0;">- Nom prénom : <strong>' . $stage->nom_prenom . '</strong></p>
                                    <p style="margin: 1px 0;">- ' . $stage->ecole->nom . '</p>
                                    <p style="margin: 1px 0;">- CIN/PPR : <strong>' . $stage->cin . '</strong></p>
                                    <p style="margin: 1px 0;">- Option : <strong>' . $stage->option->nom . '</strong></p>
                                    <p style="margin: 1px 0;">- STAGE à <strong>' . $stage->formationSanitaire->nom . '</strong></p>
                                    <br><br>
                                </td>
                                <td style="text-align: center; vertical-align: middle; font-weight: normal; font-size: 10px; padding: 12px; border: 1px solid #000; width: 20%;">
                                    <br><br><br>01
                                </td>
                                <td style="text-align: center; vertical-align: middle; font-style: italic; font-size: 10px; padding: 12px; border: 1px solid #000; width: 35%;">
                                    <br><br><br>« Soit Transmis pour toutes fins utiles »
                                </td>
                            </tr>
                        </tbody>
                      </table>';

            // Signature à droite - très compact
            $html2 .= '<div style="text-align: right; margin-top: 8px;">
                        <p style="margin: 1px 0; font-weight: bold; font-size: 10px;">LE DELEGUE PREFECTORAL</p>
                      </div>';

            // Ampliations à gauche en bas - garanties sur la même page
            $html2 .= '<div style="position: absolute; bottom: 5px; left: 20px; text-align: left; line-height: 1;">
                        <p style="margin: 0; padding: 0; font-weight: normal; font-size: 8px;">AMPLIATIONS :</p>
                        <p style="margin: 0; padding: 0; font-size: 7px;">- ' . $stage->hierarchie . '</p>
                        <p style="margin: 0; padding: 0; font-size: 7px;">- L\'INTERESSEE.</p>
                        <p style="margin: 0; padding: 0; font-size: 7px;">- ARCHIVE.</p>
                      </div>';

            $html2 .= '</div>';

            // Write HTML content for second page
            $pdf->writeHTML($html2, true, false, true, false, '');

            // Generate filename
            $filename = 'note_stage_' . $stage->nom_prenom . '_' . date('Y-m-d') . '.pdf';

            // Output PDF
            return response()->streamDownload(
                fn() => $pdf->Output($filename, 'I'),
                $filename
            );

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de la génération du PDF: ' . $e->getMessage());
        }
    }
}
