<?php

namespace App\Http\Controllers;

use App\Models\Fonctionnaire;
use App\Models\TypeConge;
use App\Models\CongeDecision;
use App\Utils\CustomPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\Certificate;
use App\Models\Relicat;
use Illuminate\Http\Response;

class BatchPrintController extends Controller
{
    /**
     * Show the batch print page
     */
    public function index()
    {
        $fonctionnaires = Fonctionnaire::with([
            'nomFormationSanitaire',
            'service',
            'specialiteGrade.grade.cadre'
        ])
            ->orderBy('nom')
            ->orderBy('prenom')
            ->get();

        $typeConges = TypeConge::all();

        return view('batch-print.index', compact('fonctionnaires', 'typeConges'));
    }

    /**
     * Generate batch attestations PDF
     */
    public function batchAttestations(Request $request)
    {
        $request->validate([
            'fonctionnaire_ids' => 'required|array|min:1',
            'fonctionnaire_ids.*' => 'exists:fonctionnaires,id'
        ]);

        $fonctionnaires = Fonctionnaire::whereIn('id', $request->fonctionnaire_ids)
            ->with(['nomFormationSanitaire', 'service', 'specialiteGrade.grade.cadre'])
            ->get();

        $pdf = new CustomPDF();

        // Set document information
        $pdf->SetCreator('GRHDMSP-Fes');
        $pdf->SetAuthor('Med Kaddouri');
        $pdf->SetTitle('Attestations de Travail - Lot');
        $pdf->SetSubject('Export PDF');

        // Set header and footer images
        $pdf->headerImage = public_path('html/assets/img/pdf/header-delegation-urh.png');
        $pdf->footerImage = public_path('html/assets/img/pdf/footer-deligation.png');

        // Set margins
        $pdf->SetMargins(15, 50, 15);
        $pdf->SetHeaderMargin(20);
        $pdf->SetFooterMargin(20);
        $pdf->SetAutoPageBreak(true, 30);

        foreach ($fonctionnaires as $index => $fonctionnaire) {
            if ($index > 0) {
                $pdf->AddPage(); // New page for each attestation
            } else {
                $pdf->AddPage();
            }

            // Set font
            $pdf->SetFont('dejavusans', '', 12);

            // Title
            $pdf->Ln(20);
            $pdf->SetFont('dejavusans', 'B', 16);
            $pdf->Cell(0, 10, 'ATTESTATION DE TRAVAIL', 0, 1, 'C');
            $pdf->Ln(10);

            // Content
            $pdf->SetFont('dejavusans', '', 12);
            $pdf->Cell(0, 8, 'Je soussigné, Le Délégué du Ministère de la Santé et de la Protection Sociale à la préfecture de Fès,', 0, 1, 'L');
            $pdf->Ln(5);
            $pdf->Cell(0, 8, 'Atteste que :', 0, 1, 'L');
            $pdf->Ln(5);

            // Employee details with proper alignment
            $pdf->SetFont('dejavusans', '', 12);

            // Nom et Prénom
            $pdf->Cell(60, 8, 'Nom et Prénom', 0, 0, 'L');
            $pdf->Cell(5, 8, ':', 0, 0, 'L');
            $pdf->SetFont('dejavusans', 'B', 12);
            $pdf->Cell(0, 8, strtoupper($fonctionnaire->nom . ' ' . $fonctionnaire->prenom), 0, 1, 'L');

            // PPR
            $pdf->SetFont('dejavusans', '', 12);
            $pdf->Cell(60, 8, 'PPR', 0, 0, 'L');
            $pdf->Cell(5, 8, ':', 0, 0, 'L');
            $pdf->Cell(0, 8, $fonctionnaire->ppr, 0, 1, 'L');

            // Cadre
            $pdf->Cell(60, 8, 'Cadre', 0, 0, 'L');
            $pdf->Cell(5, 8, ':', 0, 0, 'L');
            $pdf->Cell(0, 8, $fonctionnaire->specialiteGrade->grade->cadre->nom ?? 'N/A', 0, 1, 'L');

            // Spécialité Grade
            $pdf->Cell(60, 8, 'Spécialité Grade', 0, 0, 'L');
            $pdf->Cell(5, 8, ':', 0, 0, 'L');
            $pdf->Cell(0, 8, $fonctionnaire->specialiteGrade->nom ?? 'N/A', 0, 1, 'L');

            // Service
            $pdf->Cell(60, 8, 'Service', 0, 0, 'L');
            $pdf->Cell(5, 8, ':', 0, 0, 'L');
            $pdf->Cell(0, 8, $fonctionnaire->service->nom ?? 'N/A', 0, 1, 'L');

            // Affectation
            $pdf->Cell(60, 8, 'Affectation', 0, 0, 'L');
            $pdf->Cell(5, 8, ':', 0, 0, 'L');
            $pdf->Cell(0, 8, $fonctionnaire->nomFormationSanitaire->nom ?? 'N/A', 0, 1, 'L');

            $pdf->SetFont('dejavusans', 'B', 12);
            $pdf->Cell(40, 8, 'Affectation :', 0, 0, 'L');
            $pdf->SetFont('dejavusans', '', 12);
            $pdf->Cell(0, 8, $fonctionnaire->nomFormationSanitaire->nom ?? 'N/A', 0, 1, 'L');

            $pdf->Ln(10);
            $pdf->SetFont('dejavusans', '', 12);
            $pdf->Cell(0, 8, 'Cette attestation est délivrée à l\'intéressé(e) pour servir et valoir ce que de droit.', 0, 1, 'L');

            // Date and signature
            $pdf->Ln(20);
            $pdf->SetFont('dejavusans', '', 12);
            $pdf->Cell(0, 8, 'Fait à Fès, le ' . date('d/m/Y'), 0, 1, 'R');
            $pdf->SetFont('dejavusans', 'B', 12);
            $pdf->Cell(0, 8, 'LE DÉLÉGUÉ DU MINISTRE DE LA SANTÉ', 0, 1, 'R');
            $pdf->Cell(0, 8, 'À LA PRÉFECTURE FÈS', 0, 1, 'R');
        }

        // Output PDF
        return response()->streamDownload(
            fn() => $pdf->Output('attestations_lot_' . date('Y-m-d') . '.pdf', 'I'),
            'attestations_lot_' . date('Y-m-d') . '.pdf'
        );
    }

    /**
     * Show congé decisions management page
     */
    public function congeDecisions()
    {
        $fonctionnaires = Fonctionnaire::with([
            'nomFormationSanitaire',
            'service',
            'specialiteGrade.grade.cadre'
        ])
            ->orderBy('nom')
            ->orderBy('prenom')
            ->get();

        $typeConges = TypeConge::all();

        // Get existing decisions
        $decisions = CongeDecision::with(['fonctionnaire', 'typeConge'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('batch-print.conge-decisions', compact('fonctionnaires', 'typeConges', 'decisions'));
    }

    /**
     * Store congé decision
     */
    public function storeCongeDecision(Request $request)
    {
        $request->validate([
            'fonctionnaire_id' => 'required|exists:fonctionnaires,id',
            'type_conge_id' => 'required|exists:type_conges,id',
            'nombre_jours' => 'required|integer|min:1',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'date_decision' => 'required|date',
            'numero_decision' => 'required|string|max:255',
            'remarques' => 'nullable|string'
        ]);

        try {
            DB::beginTransaction();

            CongeDecision::create([
                'fonctionnaire_id' => $request->fonctionnaire_id,
                'type_conge_id' => $request->type_conge_id,
                'nombre_jours' => $request->nombre_jours,
                'date_debut' => $request->date_debut,
                'date_fin' => $request->date_fin,
                'date_decision' => $request->date_decision,
                'numero_decision' => $request->numero_decision,
                'remarques' => $request->remarques,
                'statut' => 'approuve'
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Décision de congé créée avec succès');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erreur lors de la création de la décision: ' . $e->getMessage());
        }
    }

    /**
     * Export congé decisions to Excel
     */
    public function exportCongeDecisions(Request $request)
    {
        // Build queries for decisions and relicats and apply same filters where relevant
        $decisionQuery = CongeDecision::with(['fonctionnaire.nomFormationSanitaire', 'fonctionnaire.service', 'typeConge']);

        // Apply filters if provided (decisions)
        if ($request->filled('type_conge_id')) {
            $decisionQuery->where('type_conge_id', $request->type_conge_id);
        }

        if ($request->filled('ppr')) {
            $decisionQuery->whereHas('fonctionnaire', function($q) use ($request) {
                $q->where('ppr', 'LIKE', '%' . $request->ppr . '%');
            });
        }

        if ($request->filled('date_debut')) {
            $decisionQuery->where('date_decision', '>=', $request->date_debut);
        }

        if ($request->filled('date_fin')) {
            $decisionQuery->where('date_decision', '<=', $request->date_fin);
        }

        $decisions = $decisionQuery->get();

        // Build relicat collection only if user asked to include them
    $relicats = collect();
    // Include relicats by default unless explicitly unchecked (e.g., include_relicats=0)
    $includeRelicats = !$request->has('include_relicats') || (int)$request->input('include_relicats') === 1;

        if ($includeRelicats) {
            $relicatQuery = Relicat::with(['fonctionnaire.nomFormationSanitaire', 'fonctionnaire.service', 'typeConge']);

            if ($request->filled('type_conge_id')) {
                $relicatQuery->where('type_conge_id', $request->type_conge_id);
            }

            if ($request->filled('ppr')) {
                $relicatQuery->whereHas('fonctionnaire', function($q) use ($request) {
                    $q->where('ppr', 'LIKE', '%' . $request->ppr . '%');
                });
            }

            // Determine which date field exists on relicats table
            $dateField = null;
            if (Schema::hasColumn('relicats', 'date_depot')) {
                $dateField = 'date_depot';
            } elseif (Schema::hasColumn('relicats', 'date_conge')) {
                $dateField = 'date_conge';
            } elseif (Schema::hasColumn('relicats', 'created_at')) {
                $dateField = 'created_at';
            }

            // If user filtered by decision date range, also apply to the detected relicat date field when provided
            if ($dateField) {
                if ($request->filled('date_debut')) {
                    $relicatQuery->where($dateField, '>=', $request->date_debut);
                }

                if ($request->filled('date_fin')) {
                    $relicatQuery->where($dateField, '<=', $request->date_fin);
                }
            }

            $relicats = $relicatQuery->get();
        }
        // Pre-compute sums to produce Reste = standard allocation + additif_relicats - congés_pris
        // Cache TypeConge standard days to avoid repeated queries
        $typeJours = TypeConge::pluck('jours', 'id')->toArray();

        $additifSums = []; // key => sum of relicat additif
        foreach ($relicats as $r) {
            $fId = intval($r->fonctionnaire_id ?? 0);
            $tId = intval($r->type_conge_id ?? 0);
            $key = $fId . '_' . $tId;
            // Only consider relicats marked as additif (solde additif)
            if (isset($r->is_additif) && $r->is_additif) {
                $additifSums[$key] = ($additifSums[$key] ?? 0) + intval($r->nbr_jours_disponibles ?? 0);
            }
        }

        $decisionSums = []; // key => sum of decisions (jours pris)
        foreach ($decisions as $d) {
            $fId = intval($d->fonctionnaire_id ?? 0);
            $tId = intval($d->type_conge_id ?? 0);
            $key = $fId . '_' . $tId;
            $decisionSums[$key] = ($decisionSums[$key] ?? 0) + intval($d->nombre_jours ?? 0);
        }

        // Create spreadsheet and write combined rows: decisions first, then relicats
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Title row with generation info
        $title = 'Export Décisions de Congé - Généré le ' . date('Y-m-d H:i:s');
        $filters = [];
        if ($request->filled('type_conge_id')) {
            $filters[] = 'Type:' . $request->type_conge_id;
        }
        if ($request->filled('ppr')) {
            $filters[] = 'PPR:' . $request->ppr;
        }
        if ($request->filled('date_debut') || $request->filled('date_fin')) {
            $filters[] = 'Période:' . ($request->filled('date_debut') ? $request->date_debut : '') . ' / ' . ($request->filled('date_fin') ? $request->date_fin : '');
        }

        $sheet->setCellValue('A1', $title . (count($filters) ? ' - ' . implode(' | ', $filters) : ''));
        $sheet->mergeCells('A1:Q1');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(12);

        // Headers - include both decision & relicat relevant columns and a 'Reste' column (row 2)
        $headers = [
            'A2' => 'PPR',
            'B2' => 'Nom',
            'C2' => 'Prénom',
            'D2' => 'Affectation',
            'E2' => 'Formation Sanitaire',
            'F2' => 'Service',
            'G2' => 'Source', // Decision | Relicat
            'H2' => 'Type de Congé',
            'I2' => 'Nombre de Jours',
            'J2' => 'Date Début',
            'K2' => 'Date Fin',
            'L2' => 'Date Décision',
            'M2' => 'Numéro Décision',
            'N2' => 'Date Dépot (Relicat)',
            'O2' => 'Année (Relicat)',
            'P2' => 'Document',
            'Q2' => 'Reste (jours)'
        ];

        foreach ($headers as $cell => $header) {
            $sheet->setCellValue($cell, $header);
        }

        // Style headers
        $sheet->getStyle('A2:Q2')->getFont()->setBold(true);
        $sheet->getStyle('A2:Q2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFCCCCCC');

        $row = 3;

        // Merge decisions and relicats into a single list sorted by fonctionnaire ppr then source
        // We'll write all decisions first, then relicats, but order by PPR for readability
        $combined = [];

        foreach ($decisions as $d) {
            $combined[] = ['source' => 'Decision', 'item' => $d, 'ppr' => optional($d->fonctionnaire)->ppr ?? ''];
        }

        foreach ($relicats as $r) {
            $combined[] = ['source' => 'Relicat', 'item' => $r, 'ppr' => optional($r->fonctionnaire)->ppr ?? ''];
        }

        // Sort by PPR then Source
        usort($combined, function($a, $b) {
            $cmp = strcmp($a['ppr'], $b['ppr']);
            if ($cmp !== 0) return $cmp;
            return strcmp($a['source'], $b['source']);
        });

        foreach ($combined as $entry) {
            if ($entry['source'] === 'Decision') {
                /** @var CongeDecision $d */
                $d = $entry['item'];
                $f = $d->fonctionnaire;
                $t = $d->typeConge;
                $sheet->setCellValue('A' . $row, optional($f)->ppr ?? '');
                $sheet->setCellValue('B' . $row, optional($f)->nom ?? '');
                $sheet->setCellValue('C' . $row, optional($f)->prenom ?? '');
                $sheet->setCellValue('D' . $row, optional(optional($f)->nomFormationSanitaire)->nom ?? 'N/A');
                $sheet->setCellValue('E' . $row, optional(optional($f)->nomFormationSanitaire)->nom ?? 'N/A');
                $sheet->setCellValue('F' . $row, optional(optional($f)->service)->nom ?? 'N/A');
                $sheet->setCellValue('G' . $row, 'Decision');
                $sheet->setCellValue('H' . $row, optional($t)->nom ?? 'N/A');
                $sheet->setCellValue('I' . $row, $d->nombre_jours);
                $sheet->setCellValue('J' . $row, optional($d->date_debut)->format('Y-m-d') ?? '');
                $sheet->setCellValue('K' . $row, optional($d->date_fin)->format('Y-m-d') ?? '');
                $sheet->setCellValue('L' . $row, optional($d->date_decision)->format('Y-m-d') ?? '');
                $sheet->setCellValue('M' . $row, $d->numero_decision ?? '');
                $sheet->setCellValue('N' . $row, '');
                $sheet->setCellValue('O' . $row, '');
                $sheet->setCellValue('P' . $row, $d->fichier_decision ?? '');

                // Compute Reste = solde standard + additif relicats - congés pris
                $key = intval($d->fonctionnaire_id ?? 0) . '_' . intval($d->type_conge_id ?? 0);
                $standard = intval($typeJours[$d->type_conge_id] ?? 0);
                $additifs = intval($additifSums[$key] ?? 0);
                $decisionsTotal = intval($decisionSums[$key] ?? 0);
                $reste = $standard + $additifs - $decisionsTotal;
                $sheet->setCellValue('Q' . $row, intval($reste));
                $row++;
            } else {
                /** @var Relicat $r */
                $r = $entry['item'];
                $f = $r->fonctionnaire;
                $t = $r->typeConge;
                $sheet->setCellValue('A' . $row, optional($f)->ppr ?? '');
                $sheet->setCellValue('B' . $row, optional($f)->nom ?? '');
                $sheet->setCellValue('C' . $row, optional($f)->prenom ?? '');
                $sheet->setCellValue('D' . $row, optional(optional($f)->nomFormationSanitaire)->nom ?? 'N/A');
                $sheet->setCellValue('E' . $row, optional(optional($f)->nomFormationSanitaire)->nom ?? 'N/A');
                $sheet->setCellValue('F' . $row, optional(optional($f)->service)->nom ?? 'N/A');
                $sheet->setCellValue('G' . $row, 'Relicat');
                $sheet->setCellValue('H' . $row, optional($t)->nom ?? 'N/A');
                $sheet->setCellValue('I' . $row, $r->nbr_jours_disponibles ?? 0);
                $sheet->setCellValue('J' . $row, '');
                $sheet->setCellValue('K' . $row, '');
                $sheet->setCellValue('L' . $row, '');
                $sheet->setCellValue('M' . $row, '');
                // Write the relicat date using the detected field if available
                $relicatDateValue = '';
                if (!empty($dateField) && isset($r->{$dateField}) && $r->{$dateField}) {
                    try {
                        $relicatDateValue = Carbon::parse($r->{$dateField})->format('Y-m-d');
                    } catch (\Exception $e) {
                        $relicatDateValue = (string)$r->{$dateField};
                    }
                }
                $sheet->setCellValue('N' . $row, $relicatDateValue);
                $sheet->setCellValue('O' . $row, $r->annee ?? '');
                $sheet->setCellValue('P' . $row, $r->document ?? '');

                $key = intval($r->fonctionnaire_id ?? 0) . '_' . intval($r->type_conge_id ?? 0);
                $standard = intval($typeJours[$r->type_conge_id] ?? 0);
                $additifs = intval($additifSums[$key] ?? 0);
                $decisionsTotal = intval($decisionSums[$key] ?? 0);
                $reste = $standard + $additifs - $decisionsTotal;
                $sheet->setCellValue('Q' . $row, intval($reste));
                $row++;
            }
        }

        // Auto-size columns
        foreach (range('A', 'Q') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        $fileName = 'decisions_conges_relicats_' . date('Y-m-d') . '.xlsx';
        $filePath = storage_path("app/public/{$fileName}");

        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend();
    }

    /**
     * Print single decision PDF
     */
    public function printSingleDecision($id)
    {
        $decision = CongeDecision::with(['fonctionnaire.specialiteGrade.grade.cadre', 'fonctionnaire.nomFormationSanitaire', 'typeConge'])->findOrFail($id);

        return $this->generateDecisionPDF([$decision], 'decision_conge_' . $decision->numero_decision . '.pdf');
    }

    /**
     * Print single decision PDF with ampliations
     */
    public function printSingleDecisionWithAmpliations($id, Request $request)
    {
        // Validate ampliations
        $request->validate([
            'ampliations' => 'nullable|array',
            'ampliations.*' => 'string',
        ]);

        $decision = CongeDecision::with(['fonctionnaire.specialiteGrade.grade.cadre', 'fonctionnaire.nomFormationSanitaire', 'typeConge'])->findOrFail($id);

        return $this->generateDecisionPDFWithAmpliations([$decision], 'decision_conge_' . $decision->numero_decision . '.pdf', $request->input('ampliations', []));
    }

    /**
     * Update ampliations for a decision
     */
    public function updateAmpliations($id, Request $request)
    {
        // Validate ampliations
        $request->validate([
            'ampliations' => 'nullable|array',
            'ampliations.*' => 'string',
        ]);

        $decision = CongeDecision::findOrFail($id);
        $decision->ampliations = $request->input('ampliations', []);
        $decision->save();

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Ampliations mises à jour avec succès.']);
        }

        return redirect()->back()->with('success', 'Ampliations mises à jour avec succès.');
    }

    /**
     * Print multiple decisions PDF with their individual ampliations
     */
    public function printDecisionsWithIndividualAmpliations(Request $request)
    {
        $request->validate([
            'decision_ids' => 'required|array|min:1',
            'decision_ids.*' => 'exists:conge_decisions,id'
        ]);

        $decisions = CongeDecision::with(['fonctionnaire.specialiteGrade.grade.cadre', 'fonctionnaire.nomFormationSanitaire', 'typeConge'])
            ->whereIn('id', $request->decision_ids)
            ->get();

        return $this->generateDecisionPDFWithIndividualAmpliations($decisions, 'decisions_conge_lot_' . date('Y-m-d') . '.pdf');
    }

    /**
     * Print multiple decisions PDF
     */
    public function printDecisions(Request $request)
    {
        $request->validate([
            'decision_ids' => 'required|array|min:1',
            'decision_ids.*' => 'exists:conge_decisions,id',
            'batch_ampliations' => 'nullable|array',
            'batch_ampliations.*' => 'string',
        ]);

        $decisions = CongeDecision::with(['fonctionnaire.specialiteGrade.grade.cadre', 'fonctionnaire.nomFormationSanitaire', 'typeConge'])
            ->whereIn('id', $request->decision_ids)
            ->get();

        // Check if batch ampliations are provided
        if ($request->has('batch_ampliations') && !empty($request->batch_ampliations)) {
            return $this->generateDecisionPDFWithAmpliations($decisions, 'decisions_conge_lot_' . date('Y-m-d') . '.pdf', $request->batch_ampliations);
        }

        return $this->generateDecisionPDF($decisions, 'decisions_conge_lot_' . date('Y-m-d') . '.pdf');
    }

    /**
     * Generate PDF for congé decisions
     */
    private function generateDecisionPDF($decisions, $filename)
    {
        $pdf = new CustomPDF();

        // Set document information
        $pdf->SetCreator('GRHDMSP-Fes');
        $pdf->SetAuthor('Med Kaddouri');
        $pdf->SetTitle('Décisions de Congé');
        $pdf->SetSubject('Décisions de Congé');

        // Set header and footer images
        $pdf->headerImage = public_path('html/assets/img/pdf/header-delegation-urh.png');
        $pdf->footerImage = public_path('html/assets/img/pdf/footer-deligation.png');

        // Set margins - adjusted for content
        $pdf->SetMargins(15, 45, 15);
        $pdf->SetHeaderMargin(15);
        $pdf->SetFooterMargin(25);
        $pdf->SetAutoPageBreak(true, 25); // Enable auto page break with footer margin

        foreach ($decisions as $index => $decision) {
            if ($index > 0) {
                $pdf->AddPage();
            } else {
                $pdf->AddPage();
            }

            // Set font
            $pdf->SetFont('dejavusans', '', 11);

            // Title - reduced spacing
            $pdf->Ln(5);
            $pdf->SetFont('dejavusans', 'B', 14);
            $pdf->Cell(0, 6, 'DÉCISION N° ' . $decision->numero_decision, 0, 1, 'C');
            $pdf->Ln(4);

            // Content - reduced spacing
            $pdf->SetFont('dejavusans', '', 11);
            $pdf->Cell(0, 6, 'Le Délégué du M.S à la Préfecture de Fès :', 0, 1, 'L');
            $pdf->Ln(3);

            $pdf->Cell(0, 6, 'Vu la demande de Congé présentée par ' . (optional($decision->fonctionnaire)->nom ?? '') . ' ' . (optional($decision->fonctionnaire)->prenom ?? ''), 0, 1, 'L');
            $pdf->Ln(2);

            $pdf->Cell(0, 6, 'Vu les dispositions du dahir du 24 février 1958 N° 1-58-008 portant réglementation', 0, 1, 'L');
            $pdf->Cell(0, 6, 'sur les congés du personnel des Administrations Publiques.', 0, 1, 'L');
            $pdf->Ln(2);

            $pdf->Cell(0, 6, 'Modifiées et complétées par la loi N° 59-44 Du 19 Mai 2011 (B.O°) et selon la', 0, 1, 'L');
            $pdf->Cell(0, 6, 'circulaire Ministérielle N° 01/13 du 01 Août 2011', 0, 1, 'L');
            $pdf->Ln(6);

            // DECIDE section
            $pdf->SetFont('dejavusans', 'B', 12);
            $pdf->Cell(0, 8, 'DÉCIDE :', 0, 1, 'C');
            $pdf->Ln(5);

            // Article unique avec format aligné
            $pdf->SetFont('dejavusans', 'B', 11);
            $pdf->Cell(0, 6, 'Article unique :', 0, 1, 'L');
            $pdf->Ln(3);

            // Format aligné avec colonnes
            $pdf->SetFont('dejavusans', '', 11);

            // Type de Congé
            $pdf->Cell(50, 6, 'Type de Congé', 0, 0, 'L');
            $pdf->Cell(10, 6, ':', 0, 0, 'L');
            $pdf->Cell(0, 6, optional($decision->typeConge)->nom ?? 'N/A', 0, 1, 'L');

            // Une durée de
            $pdf->Cell(50, 6, 'Une durée de', 0, 0, 'L');
            $pdf->Cell(10, 6, ':', 0, 0, 'L');
            $pdf->Cell(0, 6, $decision->nombre_jours . ' jour(s)', 0, 1, 'L');

            // Au titre de l'année
            $pdf->Cell(50, 6, 'Au titre de l\'année', 0, 0, 'L');
            $pdf->Cell(10, 6, ':', 0, 0, 'L');
            $pdf->Cell(0, 6, optional($decision->date_debut)->format('Y') ?? '', 0, 1, 'L');

            // Accordé à
            $pdf->Cell(50, 6, 'Accordé à', 0, 0, 'L');
            $pdf->Cell(10, 6, ':', 0, 0, 'L');
            $pdf->Cell(0, 6, (optional($decision->fonctionnaire)->nom ?? '') . ' ' . (optional($decision->fonctionnaire)->prenom ?? ''), 0, 1, 'L');

            // PPR
            $pdf->Cell(50, 6, 'PPR', 0, 0, 'L');
            $pdf->Cell(10, 6, ':', 0, 0, 'L');
            $pdf->Cell(0, 6, $decision->fonctionnaire->ppr, 0, 1, 'L');

            // Grade
            if ($decision->fonctionnaire->specialiteGrade && $decision->fonctionnaire->specialiteGrade->grade) {
                $pdf->Cell(50, 6, 'Grade', 0, 0, 'L');
                $pdf->Cell(10, 6, ':', 0, 0, 'L');
                $pdf->Cell(0, 6, $decision->fonctionnaire->specialiteGrade->grade->nom, 0, 1, 'L');

                // Cadre
                if ($decision->fonctionnaire->specialiteGrade->grade->cadre) {
                    $pdf->Cell(50, 6, 'Cadre', 0, 0, 'L');
                    $pdf->Cell(10, 6, ':', 0, 0, 'L');
                    $pdf->Cell(0, 6, $decision->fonctionnaire->specialiteGrade->grade->cadre->nom, 0, 1, 'L');
                }

                // Spécialité
                $pdf->Cell(50, 6, 'Spécialité', 0, 0, 'L');
                $pdf->Cell(10, 6, ':', 0, 0, 'L');
                $pdf->Cell(0, 6, $decision->fonctionnaire->specialiteGrade->nom, 0, 1, 'L');
            }

            // Formation sanitaire
            if ($decision->fonctionnaire->nomFormationSanitaire) {
                $pdf->Cell(50, 6, 'Est en fonction', 0, 0, 'L');
                $pdf->Cell(10, 6, ':', 0, 0, 'L');
                $pdf->Cell(0, 6, $decision->fonctionnaire->nomFormationSanitaire->nom, 0, 1, 'L');
            }

            // Pour en bénéficier à compter du
            $pdf->Cell(50, 6, 'Pour en bénéficier à compter du', 0, 0, 'L');
            $pdf->Cell(10, 6, ':', 0, 0, 'L');
            $pdf->Cell(0, 6, '  ' . (optional($decision->date_debut)->format('d/m/Y') ?? ''), 0, 1, 'L');

            // Cadre
            $pdf->Cell(60, 6, '-Cadre', 0, 0, 'L');
            $pdf->Cell(20, 6, ':', 0, 0, 'L');
            $pdf->Cell(0, 6, $decision->fonctionnaire->specialiteGrade->grade->cadre->nom ?? 'N/A', 0, 1, 'L');

            // Grade-Cadre
            $pdf->Cell(60, 6, '-Grade', 0, 0, 'L');
            $pdf->Cell(20, 6, ':', 0, 0, 'L');
            $pdf->Cell(0, 6, $decision->fonctionnaire->specialiteGrade->grade->nom ?? 'N/A', 0, 1, 'L');

            // Est en fonction
            $pdf->Cell(60, 6, '-Est en fonction', 0, 0, 'L');
            $pdf->Cell(20, 6, ':', 0, 0, 'L');
            $pdf->Cell(0, 6, $decision->fonctionnaire->nomFormationSanitaire->nom ?? 'N/A', 0, 1, 'L');

            $pdf->Ln(11); // Ligne supplémentaire entre "Est en fonction" et "Pour en bénéficier"

            // Pour en bénéficier
            $pdf->Cell(0, 6, 'Pour en bénéficier d\'un congé ' . (optional($decision->typeConge)->nom ?? '') . ' à compter du :', 0, 0, 'L');
            $pdf->Cell(20, 6, '', 0, 0, 'L'); // Espace de 2 cm
                $pdf->Cell(0, 6, optional($decision->date_debut)->format('d/m/Y') ?? '', 0, 1, 'L');


            // Date and signature - aligned to right
            $pdf->Ln(8);
            $pdf->Cell(0, 5, 'Fès le : ' . date('d/m/Y'), 0, 1, 'R');
            $pdf->SetFont('dejavusans', 'B', 10);
            $pdf->Cell(0, 5, 'LE DÉLÉGUÉ DU MINISTRE DE LA SANTÉ', 0, 1, 'R');
            $pdf->Cell(0, 5, 'À LA PRÉFECTURE FÈS', 0, 1, 'R');

            // Add appropriate spacing before ampliations
            $pdf->Ln(27); // Space after signature section (15 + 2 lines = ~27mm)

            // Ampilation - positioned near footer
            $pdf->SetFont('dejavusans', 'B', 11);
            $pdf->Cell(0, 6, 'Ampilation :', 0, 1, 'L');
            $pdf->SetFont('dejavusans', '', 11);
            $pdf->Cell(0, 6, '-L\'intéressé', 0, 1, 'L');
            $pdf->Cell(0, 6, '-Archive', 0, 1, 'L');
            $pdf->Cell(0, 6, '-M le chef affaire administratif et économique', 0, 1, 'L');

            // ===== DEUXIÈME PAGE - COPIE AVEC MODIFICATION =====
            $pdf->AddPage();

            // Set font
            $pdf->SetFont('dejavusans', '', 11);

            // Title - reduced spacing
            $pdf->Ln(5);
            $pdf->SetFont('dejavusans', 'B', 14);
            $pdf->Cell(0, 6, 'DÉCISION N° ' . $decision->numero_decision, 0, 1, 'C');
            $pdf->Ln(4);

            // Content - reduced spacing
            $pdf->SetFont('dejavusans', '', 11);
            $pdf->Cell(0, 6, 'Le Délégué du M.S à la Préfecture de Fès :', 0, 1, 'L');
            $pdf->Ln(3);

            $pdf->Cell(0, 6, 'Vu la demande de Congé présentée par ' . $decision->fonctionnaire->nom . ' ' . $decision->fonctionnaire->prenom, 0, 1, 'L');
            $pdf->Ln(2);

            $pdf->Cell(0, 6, 'Vu les dispositions du dahir du 24 février 1958 N° 1-58-008 portant réglementation', 0, 1, 'L');
            $pdf->Cell(0, 6, 'sur les congés du personnel des Administrations Publiques.', 0, 1, 'L');
            $pdf->Ln(2);

            $pdf->Cell(0, 6, 'Vu l\'avis favorable de son chef immédiat', 0, 1, 'L');
            $pdf->Ln(5);

            // DECIDE section
            $pdf->SetFont('dejavusans', 'B', 12);
            $pdf->Cell(0, 8, 'DÉCIDE :', 0, 1, 'C');
            $pdf->Ln(5);

            // Article unique avec format aligné
            $pdf->SetFont('dejavusans', 'B', 11);
            $pdf->Cell(0, 6, 'Article unique :', 0, 1, 'L');
            $pdf->Ln(3);

            // Format aligné avec colonnes
            $pdf->SetFont('dejavusans', '', 11);

            // Type de Congé
            $pdf->Cell(50, 6, 'Type de Congé', 0, 0, 'L');
            $pdf->Cell(10, 6, ':', 0, 0, 'L');
            $pdf->Cell(0, 6, optional($decision->typeConge)->nom ?? 'N/A', 0, 1, 'L');

            // Une durée de
            $pdf->Cell(50, 6, 'Une durée de', 0, 0, 'L');
            $pdf->Cell(10, 6, ':', 0, 0, 'L');
            $pdf->Cell(0, 6, $decision->nombre_jours . ' jour(s)', 0, 1, 'L');

            // Au titre de l'année
            $pdf->Cell(50, 6, 'Au titre de l\'année', 0, 0, 'L');
            $pdf->Cell(10, 6, ':', 0, 0, 'L');
            $pdf->Cell(0, 6, optional($decision->date_debut)->format('Y') ?? '', 0, 1, 'L');

            // Accordé à
            $pdf->Cell(50, 6, 'Accordé à', 0, 0, 'L');
            $pdf->Cell(10, 6, ':', 0, 0, 'L');
            $pdf->Cell(0, 6, $decision->fonctionnaire->nom . ' ' . $decision->fonctionnaire->prenom, 0, 1, 'L');

            // PPR
            $pdf->Cell(50, 6, 'PPR', 0, 0, 'L');
            $pdf->Cell(10, 6, ':', 0, 0, 'L');
            $pdf->Cell(0, 6, $decision->fonctionnaire->ppr, 0, 1, 'L');

            // Grade
            if ($decision->fonctionnaire->specialiteGrade && $decision->fonctionnaire->specialiteGrade->grade) {
                $pdf->Cell(50, 6, 'Grade', 0, 0, 'L');
                $pdf->Cell(10, 6, ':', 0, 0, 'L');
                $pdf->Cell(0, 6, $decision->fonctionnaire->specialiteGrade->grade->nom, 0, 1, 'L');

                // Cadre
                if ($decision->fonctionnaire->specialiteGrade->grade->cadre) {
                    $pdf->Cell(50, 6, 'Cadre', 0, 0, 'L');
                    $pdf->Cell(10, 6, ':', 0, 0, 'L');
                    $pdf->Cell(0, 6, $decision->fonctionnaire->specialiteGrade->grade->cadre->nom, 0, 1, 'L');
                }

                // Spécialité
                $pdf->Cell(50, 6, 'Spécialité', 0, 0, 'L');
                $pdf->Cell(10, 6, ':', 0, 0, 'L');
                $pdf->Cell(0, 6, $decision->fonctionnaire->specialiteGrade->nom, 0, 1, 'L');
            }

            // Formation sanitaire
            if ($decision->fonctionnaire->nomFormationSanitaire) {
                $pdf->Cell(50, 6, 'Est en fonction', 0, 0, 'L');
                $pdf->Cell(10, 6, ':', 0, 0, 'L');
                $pdf->Cell(0, 6, $decision->fonctionnaire->nomFormationSanitaire->nom, 0, 1, 'L');
            }

            // Ligne supplémentaire entre "Est en fonction" et "Pour en bénéficier"
            $pdf->Ln(6);

            // MODIFICATION ICI - Pour en bénéficier du congé étrangère à compter du :
            $pdf->Cell(0, 6, 'Pour en bénéficier du congé étrangère à compter du : ' . (optional($decision->date_debut)->format('d/m/Y') ?? ''), 0, 1, 'L');

            // Date and signature - aligned to right
            $pdf->Ln(8);
            $pdf->Cell(0, 5, 'Fès le : ' . date('d/m/Y'), 0, 1, 'R');
            $pdf->SetFont('dejavusans', 'B', 10);
            $pdf->Cell(0, 5, 'LE DÉLÉGUÉ DU MINISTRE DE LA SANTÉ', 0, 1, 'R');
            $pdf->Cell(0, 5, 'À LA PRÉFECTURE FÈS', 0, 1, 'R');

            // Add appropriate spacing before ampliations
            $pdf->Ln(27);

            // Ampilation - positioned near footer
            $pdf->SetFont('dejavusans', 'B', 11);
            $pdf->Cell(0, 6, 'Ampilation :', 0, 1, 'L');
            $pdf->SetFont('dejavusans', '', 11);
            $pdf->Cell(0, 6, '-L\'intéressé', 0, 1, 'L');
            $pdf->Cell(0, 6, '-Archive', 0, 1, 'L');
            $pdf->Cell(0, 6, '-M le chef affaire administratif et économique', 0, 1, 'L');
        }

        // Output PDF
        return response()->streamDownload(
            fn() => $pdf->Output($filename, 'I'),
            $filename
        );
    }

    /**
     * Generate PDF for congé decisions with custom ampliations
     */
    private function generateDecisionPDFWithAmpliations($decisions, $filename, $ampliations = [])
    {
        $pdf = new CustomPDF();

        // Set document information
        $pdf->SetCreator('GRHDMSP-Fes');
        $pdf->SetAuthor('Med Kaddouri');
        $pdf->SetTitle('Décisions de Congé');
        $pdf->SetSubject('Décisions de Congé');

        // Set header and footer images
        $pdf->headerImage = public_path('html/assets/img/pdf/header-delegation-urh.png');
        $pdf->footerImage = public_path('html/assets/img/pdf/footer-deligation.png');

        // Set margins - adjusted for content
        $pdf->SetMargins(15, 45, 15);
        $pdf->SetHeaderMargin(15);
        $pdf->SetFooterMargin(25);
        $pdf->SetAutoPageBreak(true, 25); // Enable auto page break with footer margin

        foreach ($decisions as $index => $decision) {
            if ($index > 0) {
                $pdf->AddPage();
            } else {
                $pdf->AddPage();
            }

            // Set font
            $pdf->SetFont('dejavusans', '', 11);

            // Title - reduced spacing
            $pdf->Ln(5);
            $pdf->SetFont('dejavusans', 'B', 14);
            $pdf->Cell(0, 6, 'DÉCISION N° ' . $decision->numero_decision, 0, 1, 'C');
            $pdf->Ln(4);

            // Content - reduced spacing
            $pdf->SetFont('dejavusans', '', 11);
            $pdf->Cell(0, 6, 'Le Délégué du M.S à la Préfecture de Fès :', 0, 1, 'L');
            $pdf->Ln(3);

            $pdf->Cell(0, 6, 'Vu la demande de Congé présentée par ' . $decision->fonctionnaire->nom . ' ' . $decision->fonctionnaire->prenom, 0, 1, 'L');
            $pdf->Ln(2);

            $pdf->Cell(0, 6, 'Vu les dispositions du dahir du 24 février 1958 N° 1-58-008 portant réglementation', 0, 1, 'L');
            $pdf->Cell(0, 6, 'sur les congés du personnel des Administrations Publiques.', 0, 1, 'L');
            $pdf->Ln(2);

            $pdf->Cell(0, 6, 'Vu l\'avis favorable de son chef immédiat', 0, 1, 'L');
            $pdf->Ln(5);

            // DECIDE section
            $pdf->SetFont('dejavusans', 'B', 12);
            $pdf->Cell(0, 8, 'DÉCIDE :', 0, 1, 'C');
            $pdf->Ln(5);

            // Article unique avec format aligné
            $pdf->SetFont('dejavusans', 'B', 11);
            $pdf->Cell(0, 6, 'Article unique :', 0, 1, 'L');
            $pdf->Ln(3);

            // Format aligné avec colonnes
            $pdf->SetFont('dejavusans', '', 11);

            // Type de Congé
            $pdf->Cell(50, 6, 'Type de Congé', 0, 0, 'L');
            $pdf->Cell(10, 6, ':', 0, 0, 'L');
            $pdf->Cell(0, 6, optional($decision->typeConge)->nom ?? 'N/A', 0, 1, 'L');

            // Une durée de
            $pdf->Cell(50, 6, 'Une durée de', 0, 0, 'L');
            $pdf->Cell(10, 6, ':', 0, 0, 'L');
            $pdf->Cell(0, 6, $decision->nombre_jours . ' jour(s)', 0, 1, 'L');

            // Au titre de l'année
            $pdf->Cell(50, 6, 'Au titre de l\'année', 0, 0, 'L');
            $pdf->Cell(10, 6, ':', 0, 0, 'L');
            $pdf->Cell(0, 6, optional($decision->date_debut)->format('Y') ?? '', 0, 1, 'L');

            // Accordé à
            $pdf->Cell(50, 6, 'Accordé à', 0, 0, 'L');
            $pdf->Cell(10, 6, ':', 0, 0, 'L');
            $pdf->Cell(0, 6, $decision->fonctionnaire->nom . ' ' . $decision->fonctionnaire->prenom, 0, 1, 'L');

            // PPR
            $pdf->Cell(50, 6, 'PPR', 0, 0, 'L');
            $pdf->Cell(10, 6, ':', 0, 0, 'L');
            $pdf->Cell(0, 6, $decision->fonctionnaire->ppr, 0, 1, 'L');

            // Grade
            if ($decision->fonctionnaire->specialiteGrade && $decision->fonctionnaire->specialiteGrade->grade) {
                $pdf->Cell(50, 6, 'Grade', 0, 0, 'L');
                $pdf->Cell(10, 6, ':', 0, 0, 'L');
                $pdf->Cell(0, 6, $decision->fonctionnaire->specialiteGrade->grade->nom, 0, 1, 'L');

                // Cadre
                if ($decision->fonctionnaire->specialiteGrade->grade->cadre) {
                    $pdf->Cell(50, 6, 'Cadre', 0, 0, 'L');
                    $pdf->Cell(10, 6, ':', 0, 0, 'L');
                    $pdf->Cell(0, 6, $decision->fonctionnaire->specialiteGrade->grade->cadre->nom, 0, 1, 'L');
                }

                // Spécialité
                $pdf->Cell(50, 6, 'Spécialité', 0, 0, 'L');
                $pdf->Cell(10, 6, ':', 0, 0, 'L');
                $pdf->Cell(0, 6, $decision->fonctionnaire->specialiteGrade->nom, 0, 1, 'L');
            }

            // Formation sanitaire
            if ($decision->fonctionnaire->nomFormationSanitaire) {
                $pdf->Cell(50, 6, 'Est en fonction', 0, 0, 'L');
                $pdf->Cell(10, 6, ':', 0, 0, 'L');
                $pdf->Cell(0, 6, $decision->fonctionnaire->nomFormationSanitaire->nom, 0, 1, 'L');
            }

            // Ligne supplémentaire entre "Est en fonction" et "Pour en bénéficier"
            $pdf->Ln(6);

            // Pour en bénéficier à compter du
            $pdf->Cell(50, 6, 'Pour en bénéficier à compter du :', 0, 0, 'L');
            $pdf->Cell(20, 6, '', 0, 0, 'L'); // Espace de 2 cm
            $pdf->Cell(0, 6, optional($decision->date_debut)->format('d/m/Y') ?? '', 0, 1, 'L');

            // Date and signature - aligned to right
            $pdf->Ln(8);
            $pdf->Cell(0, 5, 'Fès le : ' . date('d/m/Y'), 0, 1, 'R');
            $pdf->SetFont('dejavusans', 'B', 10);
            $pdf->Cell(0, 5, 'LE DÉLÉGUÉ DU MINISTRE DE LA SANTÉ', 0, 1, 'R');
            $pdf->Cell(0, 5, 'À LA PRÉFECTURE FÈS', 0, 1, 'R');

            // Add appropriate spacing before ampliations
            $pdf->Ln(27); // Space after signature section (15 + 2 lines = ~27mm)

            // Ampilation with custom ampliations
            $pdf->SetFont('dejavusans', 'B', 11);
            $pdf->Cell(0, 6, 'Ampilation :', 0, 1, 'L');
            $pdf->SetFont('dejavusans', '', 11);
            $pdf->Cell(0, 6, '-L\'intéressé', 0, 1, 'L');
            $pdf->Cell(0, 6, '-Archive', 0, 1, 'L');

            // Add custom ampliations if provided
            if (!empty($ampliations)) {
                foreach ($ampliations as $ampliation) {
                    $pdf->Cell(0, 6, '-' . $ampliation, 0, 1, 'L');
                }
            } else {
                // Default ampliations if none selected
                $pdf->Cell(0, 6, '-M le chef affaire administratif et économique', 0, 1, 'L');
            }

            // ===== DEUXIÈME PAGE - COPIE AVEC MODIFICATION =====
            $pdf->AddPage();

            // Set font
            $pdf->SetFont('dejavusans', '', 11);

            // Title - reduced spacing
            $pdf->Ln(5);
            $pdf->SetFont('dejavusans', 'B', 14);
            $pdf->Cell(0, 6, 'DÉCISION N° ' . $decision->numero_decision, 0, 1, 'C');
            $pdf->Ln(4);

            // Content - reduced spacing
            $pdf->SetFont('dejavusans', '', 11);
            $pdf->Cell(0, 6, 'Le Délégué du M.S à la Préfecture de Fès :', 0, 1, 'L');
            $pdf->Ln(3);

            $pdf->Cell(0, 6, 'Vu la demande de Congé présentée par ' . $decision->fonctionnaire->nom . ' ' . $decision->fonctionnaire->prenom, 0, 1, 'L');
            $pdf->Ln(2);

            $pdf->Cell(0, 6, 'Vu les dispositions du dahir du 24 février 1958 N° 1-58-008 portant réglementation', 0, 1, 'L');
            $pdf->Cell(0, 6, 'sur les congés du personnel des Administrations Publiques.', 0, 1, 'L');
            $pdf->Ln(2);

            $pdf->Cell(0, 6, 'Vu l\'avis favorable de son chef immédiat', 0, 1, 'L');
            $pdf->Ln(5);

            // DECIDE section
            $pdf->SetFont('dejavusans', 'B', 12);
            $pdf->Cell(0, 8, 'DÉCIDE :', 0, 1, 'C');
            $pdf->Ln(5);

            // Article unique avec format aligné
            $pdf->SetFont('dejavusans', 'B', 11);
            $pdf->Cell(0, 6, 'Article unique :', 0, 1, 'L');
            $pdf->Ln(3);

            // Format aligné avec colonnes
            $pdf->SetFont('dejavusans', '', 11);

            // Type de Congé
            $pdf->Cell(50, 6, 'Type de Congé', 0, 0, 'L');
            $pdf->Cell(10, 6, ':', 0, 0, 'L');
            $pdf->Cell(0, 6, optional($decision->typeConge)->nom ?? 'N/A', 0, 1, 'L');

            // Une durée de
            $pdf->Cell(50, 6, 'Une durée de', 0, 0, 'L');
            $pdf->Cell(10, 6, ':', 0, 0, 'L');
            $pdf->Cell(0, 6, $decision->nombre_jours . ' jour(s)', 0, 1, 'L');

            // Au titre de l'année
            $pdf->Cell(50, 6, 'Au titre de l\'année', 0, 0, 'L');
            $pdf->Cell(10, 6, ':', 0, 0, 'L');
            $pdf->Cell(0, 6, optional($decision->date_debut)->format('Y') ?? '', 0, 1, 'L');

            // Accordé à
            $pdf->Cell(50, 6, 'Accordé à', 0, 0, 'L');
            $pdf->Cell(10, 6, ':', 0, 0, 'L');
            $pdf->Cell(0, 6, $decision->fonctionnaire->nom . ' ' . $decision->fonctionnaire->prenom, 0, 1, 'L');

            // PPR
            $pdf->Cell(50, 6, 'PPR', 0, 0, 'L');
            $pdf->Cell(10, 6, ':', 0, 0, 'L');
            $pdf->Cell(0, 6, $decision->fonctionnaire->ppr, 0, 1, 'L');

            // Grade
            if ($decision->fonctionnaire->specialiteGrade && $decision->fonctionnaire->specialiteGrade->grade) {
                $pdf->Cell(50, 6, 'Grade', 0, 0, 'L');
                $pdf->Cell(10, 6, ':', 0, 0, 'L');
                $pdf->Cell(0, 6, $decision->fonctionnaire->specialiteGrade->grade->nom, 0, 1, 'L');

                // Cadre
                if ($decision->fonctionnaire->specialiteGrade->grade->cadre) {
                    $pdf->Cell(50, 6, 'Cadre', 0, 0, 'L');
                    $pdf->Cell(10, 6, ':', 0, 0, 'L');
                    $pdf->Cell(0, 6, $decision->fonctionnaire->specialiteGrade->grade->cadre->nom, 0, 1, 'L');
                }

                // Spécialité
                $pdf->Cell(50, 6, 'Spécialité', 0, 0, 'L');
                $pdf->Cell(10, 6, ':', 0, 0, 'L');
                $pdf->Cell(0, 6, $decision->fonctionnaire->specialiteGrade->nom, 0, 1, 'L');
            }

            // Formation sanitaire
            if ($decision->fonctionnaire->nomFormationSanitaire) {
                $pdf->Cell(50, 6, 'Est en fonction', 0, 0, 'L');
                $pdf->Cell(10, 6, ':', 0, 0, 'L');
                $pdf->Cell(0, 6, $decision->fonctionnaire->nomFormationSanitaire->nom, 0, 1, 'L');
            }

            // Ligne supplémentaire entre "Est en fonction" et "Pour en bénéficier"
            $pdf->Ln(6);

            // MODIFICATION ICI - Pour en bénéficier du congé étrangère à compter du :
            $pdf->Cell(0, 6, 'Pour en bénéficier du congé étrangère à compter du : ' . (optional($decision->date_debut)->format('d/m/Y') ?? ''), 0, 1, 'L');

            // Date and signature - aligned to right
            $pdf->Ln(8);
            $pdf->Cell(0, 5, 'Fès le : ' . date('d/m/Y'), 0, 1, 'R');
            $pdf->SetFont('dejavusans', 'B', 10);
            $pdf->Cell(0, 5, 'LE DÉLÉGUÉ DU MINISTRE DE LA SANTÉ', 0, 1, 'R');
            $pdf->Cell(0, 5, 'À LA PRÉFECTURE FÈS', 0, 1, 'R');

            // Add appropriate spacing before ampliations
            $pdf->Ln(27);

            // Ampilation with custom ampliations
            $pdf->SetFont('dejavusans', 'B', 11);
            $pdf->Cell(0, 6, 'Ampilation :', 0, 1, 'L');
            $pdf->SetFont('dejavusans', '', 11);
            $pdf->Cell(0, 6, '-L\'intéressé', 0, 1, 'L');
            $pdf->Cell(0, 6, '-Archive', 0, 1, 'L');

            // Add custom ampliations if provided
            if (!empty($ampliations)) {
                foreach ($ampliations as $ampliation) {
                    $pdf->Cell(0, 6, '-' . $ampliation, 0, 1, 'L');
                }
            } else {
                // Default ampliations if none selected
                $pdf->Cell(0, 6, '-M le chef affaire administratif et économique', 0, 1, 'L');
            }
        }

        // Output PDF
        return response()->streamDownload(
            fn() => $pdf->Output($filename, 'I'),
            $filename
        );
    }

    /**
     * Generate PDF for congé decisions with individual ampliations
     */
    private function generateDecisionPDFWithIndividualAmpliations($decisions, $filename)
    {
        $pdf = new CustomPDF();

        // Set document information
        $pdf->SetCreator('GRHDMSP-Fes');
        $pdf->SetAuthor('Med Kaddouri');
        $pdf->SetTitle('Décisions de Congé');
        $pdf->SetSubject('Décisions de Congé');

        // Set header and footer images
        $pdf->headerImage = public_path('html/assets/img/pdf/header-delegation-urh.png');
        $pdf->footerImage = public_path('html/assets/img/pdf/footer-deligation.png');

        // Set margins - adjusted for content
        $pdf->SetMargins(15, 45, 15);
        $pdf->SetHeaderMargin(15);
        $pdf->SetFooterMargin(5); // Minimal footer margin
        $pdf->SetAutoPageBreak(true, 5); // Minimal auto page break margin

        foreach ($decisions as $index => $decision) {
            if ($index > 0) {
                $pdf->AddPage();
            } else {
                $pdf->AddPage();
            }

            // Set font
            $pdf->SetFont('dejavusans', '', 11);

            // Title - reduced spacing
            $pdf->Ln(5);
            $pdf->SetFont('dejavusans', 'B', 14);
            $pdf->Cell(0, 6, 'DÉCISION N° ' . $decision->numero_decision, 0, 1, 'C');
            $pdf->Ln(4);

            // Content - reduced spacing
            $pdf->SetFont('dejavusans', '', 11);
            $pdf->Cell(0, 6, 'Le Délégué du M.S à la Préfecture de Fès :', 0, 1, 'L');
            $pdf->Ln(3);

            $pdf->Cell(0, 6, 'Vu la demande de Congé présentée par ' . $decision->fonctionnaire->nom . ' ' . $decision->fonctionnaire->prenom, 0, 1, 'L');
            $pdf->Ln(2);

            $pdf->Cell(0, 6, 'Vu les dispositions du dahir du 24 février 1958 N° 1-58-008 portant réglementation', 0, 1, 'L');
            $pdf->Cell(0, 6, 'sur les congés du personnel des Administrations Publiques.', 0, 1, 'L');
            $pdf->Ln(2);

            $pdf->Cell(0, 6, 'Vu l\'avis favorable de son chef immédiat', 0, 1, 'L');
            $pdf->Ln(5);

            // DECIDE section
            $pdf->SetFont('dejavusans', 'B', 12);
            $pdf->Cell(0, 8, 'DÉCIDE :', 0, 1, 'C');
            $pdf->Ln(5);

            // Article unique avec format aligné
            $pdf->SetFont('dejavusans', 'B', 11);
            $pdf->Cell(0, 6, 'Article unique :', 0, 1, 'L');
            $pdf->Ln(3);

            // Format aligné avec colonnes
            $pdf->SetFont('dejavusans', '', 11);

            // Type de Congé
            $pdf->Cell(50, 6, 'Type de Congé', 0, 0, 'L');
            $pdf->Cell(10, 6, ':', 0, 0, 'L');
            $pdf->Cell(0, 6, optional($decision->typeConge)->nom ?? 'N/A', 0, 1, 'L');

            // Une durée de
            $pdf->Cell(50, 6, 'Une durée de', 0, 0, 'L');
            $pdf->Cell(10, 6, ':', 0, 0, 'L');
            $pdf->Cell(0, 6, $decision->nombre_jours . ' jour(s)', 0, 1, 'L');

            // Au titre de l'année
            $pdf->Cell(50, 6, 'Au titre de l\'année', 0, 0, 'L');
            $pdf->Cell(10, 6, ':', 0, 0, 'L');
            $pdf->Cell(0, 6, optional($decision->date_debut)->format('Y') ?? '', 0, 1, 'L');

            // Accordé à
            $pdf->Cell(50, 6, 'Accordé à', 0, 0, 'L');
            $pdf->Cell(10, 6, ':', 0, 0, 'L');
            $pdf->Cell(0, 6, $decision->fonctionnaire->nom . ' ' . $decision->fonctionnaire->prenom, 0, 1, 'L');

            // PPR
            $pdf->Cell(50, 6, 'PPR', 0, 0, 'L');
            $pdf->Cell(10, 6, ':', 0, 0, 'L');
            $pdf->Cell(0, 6, $decision->fonctionnaire->ppr, 0, 1, 'L');

            // Grade
            if ($decision->fonctionnaire->specialiteGrade && $decision->fonctionnaire->specialiteGrade->grade) {
                $pdf->Cell(50, 6, 'Grade', 0, 0, 'L');
                $pdf->Cell(10, 6, ':', 0, 0, 'L');
                $pdf->Cell(0, 6, $decision->fonctionnaire->specialiteGrade->grade->nom, 0, 1, 'L');

                // Cadre
                if ($decision->fonctionnaire->specialiteGrade->grade->cadre) {
                    $pdf->Cell(50, 6, 'Cadre', 0, 0, 'L');
                    $pdf->Cell(10, 6, ':', 0, 0, 'L');
                    $pdf->Cell(0, 6, $decision->fonctionnaire->specialiteGrade->grade->cadre->nom, 0, 1, 'L');
                }

                // Spécialité
                $pdf->Cell(50, 6, 'Spécialité', 0, 0, 'L');
                $pdf->Cell(10, 6, ':', 0, 0, 'L');
                $pdf->Cell(0, 6, $decision->fonctionnaire->specialiteGrade->nom, 0, 1, 'L');
            }

            // Formation sanitaire
            if ($decision->fonctionnaire->nomFormationSanitaire) {
                $pdf->Cell(50, 6, 'Est en fonction', 0, 0, 'L');
                $pdf->Cell(10, 6, ':', 0, 0, 'L');
                $pdf->Cell(0, 6, $decision->fonctionnaire->nomFormationSanitaire->nom, 0, 1, 'L');
            }

            // Ligne supplémentaire entre "Est en fonction" et "Pour en bénéficier"
            $pdf->Ln(6);

            // Pour en bénéficier à compter du
            $pdf->Cell(50, 6, 'Pour en bénéficier à compter du :', 0, 0, 'L');
            $pdf->Cell(20, 6, '', 0, 0, 'L'); // Espace de 2 cm
            $pdf->Cell(0, 6, optional($decision->date_debut)->format('d/m/Y') ?? '', 0, 1, 'L');

            // Date and signature - aligned to right
            $pdf->Ln(8);
            $pdf->Cell(0, 5, 'Fès le : ' . date('d/m/Y'), 0, 1, 'R');
            $pdf->SetFont('dejavusans', 'B', 10);
            $pdf->Cell(0, 5, 'LE DÉLÉGUÉ DU MINISTRE DE LA SANTÉ', 0, 1, 'R');
            $pdf->Cell(0, 5, 'À LA PRÉFECTURE FÈS', 0, 1, 'R');

            // Add appropriate spacing before ampliations
            $pdf->Ln(27); // Space after signature section (15 + 2 lines = ~27mm)

            // Ampilation with individual ampliations for this decision
            $pdf->SetFont('dejavusans', 'B', 11);
            $pdf->Cell(0, 6, 'Ampilation :', 0, 1, 'L');
            $pdf->SetFont('dejavusans', '', 11);
            $pdf->Cell(0, 6, '-L\'intéressé', 0, 1, 'L');
            $pdf->Cell(0, 6, '-Archive', 0, 1, 'L');

            // Add individual ampliations for this decision
            if (!empty($decision->ampliations)) {
                foreach ($decision->ampliations as $ampliation) {
                    $pdf->Cell(0, 6, '-' . $ampliation, 0, 1, 'L');
                }
            } else {
                // Default ampliations if none configured for this decision
                $pdf->Cell(0, 6, '-M le chef affaire administratif et économique', 0, 1, 'L');
            }

            // ===== DEUXIÈME PAGE - COPIE AVEC MODIFICATION =====
            $pdf->AddPage();

            // Set font
            $pdf->SetFont('dejavusans', '', 11);

            // Title - reduced spacing
            $pdf->Ln(5);
            $pdf->SetFont('dejavusans', 'B', 14);
            $pdf->Cell(0, 6, 'DÉCISION N° ' . $decision->numero_decision, 0, 1, 'C');
            $pdf->Ln(4);

            // Content - reduced spacing
            $pdf->SetFont('dejavusans', '', 11);
            $pdf->Cell(0, 6, 'Le Délégué du M.S à la Préfecture de Fès :', 0, 1, 'L');
            $pdf->Ln(3);

            $pdf->Cell(0, 6, 'Vu la demande de Congé présentée par ' . $decision->fonctionnaire->nom . ' ' . $decision->fonctionnaire->prenom, 0, 1, 'L');
            $pdf->Ln(2);

            $pdf->Cell(0, 6, 'Vu les dispositions du dahir du 24 février 1958 N° 1-58-008 portant réglementation', 0, 1, 'L');
            $pdf->Cell(0, 6, 'sur les congés du personnel des Administrations Publiques.', 0, 1, 'L');
            $pdf->Ln(2);

            $pdf->Cell(0, 6, 'Vu l\'avis favorable de son chef immédiat', 0, 1, 'L');
            $pdf->Ln(5);

            // DECIDE section
            $pdf->SetFont('dejavusans', 'B', 12);
            $pdf->Cell(0, 8, 'DÉCIDE :', 0, 1, 'C');
            $pdf->Ln(5);

            // Article unique avec format aligné
            $pdf->SetFont('dejavusans', 'B', 11);
            $pdf->Cell(0, 6, 'Article unique :', 0, 1, 'L');
            $pdf->Ln(3);

            // Format aligné avec colonnes
            $pdf->SetFont('dejavusans', '', 11);

            // Type de Congé
            $pdf->Cell(50, 6, 'Type de Congé', 0, 0, 'L');
            $pdf->Cell(10, 6, ':', 0, 0, 'L');
            $pdf->Cell(0, 6, optional($decision->typeConge)->nom ?? 'N/A', 0, 1, 'L');

            // Une durée de
            $pdf->Cell(50, 6, 'Une durée de', 0, 0, 'L');
            $pdf->Cell(10, 6, ':', 0, 0, 'L');
            $pdf->Cell(0, 6, $decision->nombre_jours . ' jour(s)', 0, 1, 'L');

            // Au titre de l'année
            $pdf->Cell(50, 6, 'Au titre de l\'année', 0, 0, 'L');
            $pdf->Cell(10, 6, ':', 0, 0, 'L');
            $pdf->Cell(0, 6, optional($decision->date_debut)->format('Y') ?? '', 0, 1, 'L');

            // Accordé à
            $pdf->Cell(50, 6, 'Accordé à', 0, 0, 'L');
            $pdf->Cell(10, 6, ':', 0, 0, 'L');
            $pdf->Cell(0, 6, $decision->fonctionnaire->nom . ' ' . $decision->fonctionnaire->prenom, 0, 1, 'L');

            // PPR
            $pdf->Cell(50, 6, 'PPR', 0, 0, 'L');
            $pdf->Cell(10, 6, ':', 0, 0, 'L');
            $pdf->Cell(0, 6, $decision->fonctionnaire->ppr, 0, 1, 'L');

            // Grade
            if ($decision->fonctionnaire->specialiteGrade && $decision->fonctionnaire->specialiteGrade->grade) {
                $pdf->Cell(50, 6, 'Grade', 0, 0, 'L');
                $pdf->Cell(10, 6, ':', 0, 0, 'L');
                $pdf->Cell(0, 6, $decision->fonctionnaire->specialiteGrade->grade->nom, 0, 1, 'L');

                // Cadre
                if ($decision->fonctionnaire->specialiteGrade->grade->cadre) {
                    $pdf->Cell(50, 6, 'Cadre', 0, 0, 'L');
                    $pdf->Cell(10, 6, ':', 0, 0, 'L');
                    $pdf->Cell(0, 6, $decision->fonctionnaire->specialiteGrade->grade->cadre->nom, 0, 1, 'L');
                }

                // Spécialité
                $pdf->Cell(50, 6, 'Spécialité', 0, 0, 'L');
                $pdf->Cell(10, 6, ':', 0, 0, 'L');
                $pdf->Cell(0, 6, $decision->fonctionnaire->specialiteGrade->nom, 0, 1, 'L');
            }

            // Formation sanitaire
            if ($decision->fonctionnaire->nomFormationSanitaire) {
                $pdf->Cell(50, 6, 'Est en fonction', 0, 0, 'L');
                $pdf->Cell(10, 6, ':', 0, 0, 'L');
                $pdf->Cell(0, 6, $decision->fonctionnaire->nomFormationSanitaire->nom, 0, 1, 'L');
            }

            // Ligne supplémentaire entre "Est en fonction" et "Pour en bénéficier"
            $pdf->Ln(6);

            // MODIFICATION ICI - Pour en bénéficier du congé étrangère à compter du :
            $pdf->Cell(0, 6, 'Pour en bénéficier du congé étrangère à compter du : ' . (optional($decision->date_debut)->format('d/m/Y') ?? ''), 0, 1, 'L');

            // Date and signature - aligned to right
            $pdf->Ln(8);
            $pdf->Cell(0, 5, 'Fès le : ' . date('d/m/Y'), 0, 1, 'R');
            $pdf->SetFont('dejavusans', 'B', 10);
            $pdf->Cell(0, 5, 'LE DÉLÉGUÉ DU MINISTRE DE LA SANTÉ', 0, 1, 'R');
            $pdf->Cell(0, 5, 'À LA PRÉFECTURE FÈS', 0, 1, 'R');

            // Add appropriate spacing before ampliations
            $pdf->Ln(27);

            // Ampilation with individual ampliations for this decision
            $pdf->SetFont('dejavusans', 'B', 11);
            $pdf->Cell(0, 6, 'Ampilation :', 0, 1, 'L');
            $pdf->SetFont('dejavusans', '', 11);
            $pdf->Cell(0, 6, '-L\'intéressé', 0, 1, 'L');
            $pdf->Cell(0, 6, '-Archive', 0, 1, 'L');

            // Add individual ampliations for this decision
            if (!empty($decision->ampliations)) {
                foreach ($decision->ampliations as $ampliation) {
                    $pdf->Cell(0, 6, '-' . $ampliation, 0, 1, 'L');
                }
            } else {
                // Default ampliations if none configured for this decision
                $pdf->Cell(0, 6, '-M le chef affaire administratif et économique', 0, 1, 'L');
            }
        }

        // Output PDF
        return response()->streamDownload(
            fn() => $pdf->Output($filename, 'I'),
            $filename
        );
    }

    /**
     * Delete congé decision
     */
    public function deleteDecision($id)
    {
        try {
            $decision = CongeDecision::findOrFail($id);
            $decision->delete();

            return redirect()->back()->with('success', 'Décision supprimée avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de la suppression: ' . $e->getMessage());
        }
    }

    /**
     * AJAX: list certificates between two dates (date_depot)
     */
    public function certificatesList(Request $request)
    {
        try {
            $request->validate([
                'date_debut' => 'required|date',
                'date_fin' => 'required|date|after_or_equal:date_debut'
            ]);

            $certificates = Certificate::with(['fonctionnaire', 'type_certificate'])
                ->whereBetween('date_depot', [$request->date_debut, $request->date_fin])
                ->orderBy('date_depot', 'desc')
                ->get();

            // Map to simple array
            $data = $certificates->map(function($c) {
                return [
                    'id' => $c->id,
                    'ppr' => optional($c->fonctionnaire)->ppr ?? '',
                    'nom' => optional($c->fonctionnaire)->nom ?? '',
                    'prenom' => optional($c->fonctionnaire)->prenom ?? '',
                    'type' => optional($c->type_certificate)->nom ?? '',
                    'date_depot' => $c->date_depot ? \Carbon\Carbon::parse($c->date_depot)->format('d/m/Y') : '',
                    'date_debut' => $c->date_debut ? \Carbon\Carbon::parse($c->date_debut)->format('d/m/Y') : '',
                    'jours' => $c->jours,
                    'url' => $c->url ? asset('storage/' . $c->url) : null,
                ];
            });

            return response()->json(['success' => true, 'data' => $data]);
        } catch (\Illuminate\Validation\ValidationException $ve) {
            return response()->json(['success' => false, 'message' => implode(' | ', $ve->errors()[array_key_first($ve->errors())] ?? ['Validation error'])], 422);
        } catch (\Exception $e) {
            // Provide useful debugging info in local environment
            $msg = 'Erreur interne lors de la récupération des certificats.';
            if (config('app.env') !== 'production') {
                $msg .= ' ' . $e->getMessage();
            }
            return response()->json(['success' => false, 'message' => $msg], 500);
        }
    }

    /**
     * Export certificates to Excel between two dates
     */
    public function exportCertificatesExcel(Request $request)
    {
        $request->validate([
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut'
        ]);

        $certificates = Certificate::with(['fonctionnaire', 'type_certificate'])
            ->whereBetween('date_depot', [$request->date_debut, $request->date_fin])
            ->orderBy('date_depot', 'desc')
            ->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = [
            'A1' => 'PPR',
            'B1' => 'Nom',
            'C1' => 'Prénom',
            'D1' => 'Type de Certificat',
            'E1' => 'Date Dépôt',
            'F1' => 'Date Début',
            'G1' => 'Nombre Jours',
            'H1' => 'Fichier URL'
        ];

        foreach ($headers as $cell => $label) {
            $sheet->setCellValue($cell, $label);
        }

        $sheet->getStyle('A1:H1')->getFont()->setBold(true);

        foreach ($certificates as $index => $c) {
            $row = $index + 2;
            $sheet->setCellValue('A' . $row, optional($c->fonctionnaire)->ppr ?? '');
            $sheet->setCellValue('B' . $row, optional($c->fonctionnaire)->nom ?? '');
            $sheet->setCellValue('C' . $row, optional($c->fonctionnaire)->prenom ?? '');
            $sheet->setCellValue('D' . $row, optional($c->type_certificate)->nom ?? '');
            $sheet->setCellValue('E' . $row, $c->date_depot);
            $sheet->setCellValue('F' . $row, $c->date_debut);
            $sheet->setCellValue('G' . $row, $c->jours);
            $sheet->setCellValue('H' . $row, $c->url ? asset('storage/' . $c->url) : '');
        }

        foreach (range('A', 'H') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        $fileName = 'certificates_' . date('Y-m-d') . '.xlsx';
        $filePath = storage_path('app/public/' . $fileName);

        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend();
    }

    /**
     * Export certificates to a PDF listing between two dates
     */
    public function exportCertificatesPdf(Request $request)
    {
        $request->validate([
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut'
        ]);

        $certificates = Certificate::with(['fonctionnaire', 'type_certificate'])
            ->whereBetween('date_depot', [$request->date_debut, $request->date_fin])
            ->orderBy('date_depot', 'desc')
            ->get();

    // Use landscape for better table width
    $pdf = new CustomPDF('L', 'mm', 'A4');
        $pdf->SetCreator('GRHDMSP-Fes');
        $pdf->SetAuthor('GRH');
        $pdf->SetTitle('Liste des certificats');
        $pdf->headerImage = public_path('html/assets/img/pdf/header-delegation-urh.png');
        $pdf->footerImage = public_path('html/assets/img/pdf/footer-deligation.png');
        $pdf->SetMargins(15, 40, 15);
        $pdf->SetAutoPageBreak(true, 30);
        $pdf->AddPage();
    $pdf->SetFont('dejavusans', 'B', 14);

    // Draw a horizontal line separator between the header image and the title
    // Position it slightly above the current Y so it sits between header and title
    $currentY = $pdf->GetY();
    $lineY = max(8, $currentY - 8);
    $left = 15; // left margin
    $right = $pdf->getPageWidth() - 15; // right margin
    $pdf->SetDrawColor(0, 0, 0);
    $pdf->SetLineWidth(0.4);
    $pdf->Line($left, $lineY, $right, $lineY);

    $pdf->Cell(0, 8, 'Liste des certificats du ' . $request->date_debut . ' au ' . $request->date_fin, 0, 1, 'C');
    $pdf->Ln(6);
        // Reduce font for table to fit more columns
        $pdf->SetFont('dejavusans', '', 9);

    // Build styled HTML table for certificates (landscape layout)
    // Use fixed layout and colgroup to ensure header widths match column data
    $html = '<table border="1" cellpadding="6" style="border-collapse:collapse;font-size:9px;width:100%;table-layout:fixed;font-family:dejavusans;">';
    $html .= '<colgroup>';
    $html .= '<col style="width:7%;">';   // PPR
    $html .= '<col style="width:18%;">';  // Nom
    $html .= '<col style="width:18%;">';  // Prénom
    $html .= '<col style="width:20%;">';  // Type
    $html .= '<col style="width:9%;">';   // Date Dépôt
    $html .= '<col style="width:9%;">';   // Date Début
    $html .= '<col style="width:6%;">';   // Jours
    $html .= '<col style="width:13%;">';  // Fichier
    $html .= '</colgroup>';
    $html .= '<thead>';
    $html .= '<tr style="background-color:#0d6efd;color:#ffffff;font-weight:700;">';
    $html .= '<th style="padding:6px;text-align:left;vertical-align:middle;word-wrap:break-word;overflow-wrap:break-word;">PPR</th>';
    $html .= '<th style="padding:6px;text-align:left;vertical-align:middle;word-wrap:break-word;overflow-wrap:break-word;">Nom</th>';
    $html .= '<th style="padding:6px;text-align:left;vertical-align:middle;word-wrap:break-word;overflow-wrap:break-word;">Prénom</th>';
    $html .= '<th style="padding:6px;text-align:left;vertical-align:middle;word-wrap:break-word;overflow-wrap:break-word;">Type</th>';
    $html .= '<th style="padding:6px;text-align:center;vertical-align:middle;word-wrap:break-word;overflow-wrap:break-word;">Date Dépôt</th>';
    $html .= '<th style="padding:6px;text-align:center;vertical-align:middle;word-wrap:break-word;overflow-wrap:break-word;">Date Début</th>';
    $html .= '<th style="padding:6px;text-align:center;vertical-align:middle;word-wrap:break-word;overflow-wrap:break-word;">Jours</th>';
    $html .= '<th style="padding:6px;text-align:left;vertical-align:middle;word-wrap:break-word;overflow-wrap:break-word;">Fichier</th>';
    $html .= '</tr></thead><tbody>';

        foreach ($certificates as $index => $c) {
            $rowBg = ($index % 2 == 0) ? '#ffffff' : '#f8f9fa';
            $ppr = e(optional($c->fonctionnaire)->ppr ?? '');
            $nom = e(optional($c->fonctionnaire)->nom ?? '');
            $prenom = e(optional($c->fonctionnaire)->prenom ?? '');
            $type = e(optional($c->type_certificate)->nom ?? '-');
            $dateDepot = $c->date_depot ? \Carbon\Carbon::parse($c->date_depot)->format('d/m/Y') : '-';
            $dateDebut = $c->date_debut ? \Carbon\Carbon::parse($c->date_debut)->format('d/m/Y') : '-';
            $jours = $c->jours ?? '-';
            $fichier = $c->url ? e(asset('storage/' . $c->url)) : '-';

            $html .= '<tr style="background-color:' . $rowBg . ';">';
            $html .= '<td style="padding:6px;vertical-align:top;word-wrap:break-word;overflow-wrap:break-word;">' . $ppr . '</td>';
            $html .= '<td style="padding:6px;vertical-align:top;word-wrap:break-word;overflow-wrap:break-word;">' . $nom . '</td>';
            $html .= '<td style="padding:6px;vertical-align:top;word-wrap:break-word;overflow-wrap:break-word;">' . $prenom . '</td>';
            $html .= '<td style="padding:6px;vertical-align:top;word-wrap:break-word;overflow-wrap:break-word;">' . $type . '</td>';
            $html .= '<td style="padding:6px;text-align:center;vertical-align:top;">' . $dateDepot . '</td>';
            $html .= '<td style="padding:6px;text-align:center;vertical-align:top;">' . $dateDebut . '</td>';
            $html .= '<td style="padding:6px;text-align:center;vertical-align:top;">' . $jours . '</td>';
            $html .= '<td style="padding:6px;vertical-align:top;word-wrap:break-word;overflow-wrap:break-word;">' . $fichier . '</td>';
            $html .= '</tr>';
        }

        $html .= '</tbody></table>';

        // Output the HTML table to PDF
        $pdf->writeHTML($html, true, false, true, false, '');

        $fileName = 'certificates_' . date('Y-m-d') . '.pdf';

        return response()->streamDownload(
            fn() => $pdf->Output($fileName, 'I'),
            $fileName
        );
    }
}
