<?php

namespace App\Http\Controllers;

use App\Models\Greve;
use App\Models\Fonctionnaire;
use Illuminate\Http\Request;

class GreveController extends Controller
{
    public function index()
    {
        $greves = Greve::with('fonctionnaire')->latest()->paginate(20);
        return view('greves.index', compact('greves'));
    }

    public function create()
    {
        $fonctionnaires = Fonctionnaire::all();
        return view('greves.create', compact('fonctionnaires'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fonctionnaire_id' => 'required|exists:fonctionnaires,id',
            'date_debut' => 'required|date',
            'date_fin' => 'nullable|date|after_or_equal:date_debut',
            'remarque' => 'nullable|string',
        ]);
        Greve::create($request->all());
        return redirect()->back()->with('success', 'Grève ajoutée avec succès.');
    }

    public function show(Greve $greve)
    {
        return view('greves.show', compact('greve'));
    }

    public function edit(Greve $greve)
    {
        $fonctionnaires = Fonctionnaire::all();
        return view('greves.edit', compact('greve', 'fonctionnaires'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fonctionnaire_id' => 'required|exists:fonctionnaires,id',
            'date_debut' => 'required|date',
            'date_fin' => 'nullable|date|after_or_equal:date_debut',
            'remarque' => 'nullable|string',
        ]);
        Greve::findOrFail($id)->update($request->all());
        return redirect()->back()->with('success', 'Grève mise à jour avec succès.');
    }

    public function destroy($id)
    {
        Greve::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Grève supprimée avec succès.');
    }

    /**
     * Export all greves to Excel
     */
    public function exportAllExcel(Request $request)
    {
        $greves = Greve::with(['fonctionnaire.nomFormationSanitaire', 'fonctionnaire.position'])
            ->orderBy('date_debut', 'desc')
            ->get();

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = [
            'A1' => 'PPR', 'B1' => 'Nom', 'C1' => 'Prénom', 'D1' => 'Position',
            'E1' => 'Formation sanitaire', 'F1' => 'Date début', 'G1' => 'Date fin', 'H1' => 'Durée (jours)', 'I1' => 'Remarque'
        ];
        foreach ($headers as $cell => $header) {
            $sheet->setCellValue($cell, $header);
            $sheet->getStyle($cell)->getFont()->setBold(true);
        }

        $row = 2;
        foreach ($greves as $g) {
            $nombreJours = 0;
            if ($g->date_debut && $g->date_fin) {
                $dateDebut = \Carbon\Carbon::parse($g->date_debut);
                $dateFin = \Carbon\Carbon::parse($g->date_fin);
                $nombreJours = $dateDebut->diffInDays($dateFin) + 1;
            }
            $sheet->setCellValue('A' . $row, optional($g->fonctionnaire)->ppr ?? '');
            $sheet->setCellValue('B' . $row, optional($g->fonctionnaire)->nom ?? '');
            $sheet->setCellValue('C' . $row, optional($g->fonctionnaire)->prenom ?? '');
            $sheet->setCellValue('D' . $row, optional(optional($g->fonctionnaire)->position)->nom ?? '');
            $sheet->setCellValue('E' . $row, optional(optional($g->fonctionnaire)->nomFormationSanitaire)->nom ?? '');
            $sheet->setCellValue('F' . $row, $g->date_debut ?? '');
            $sheet->setCellValue('G' . $row, $g->date_fin ?? '');
            $sheet->setCellValue('H' . $row, $nombreJours);
            $sheet->setCellValue('I' . $row, $g->remarque ?? '');
            $row++;
        }

        foreach (range('A', 'I') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        $filename = 'greves_all_' . date('Y-m-d_H-i-s') . '.xlsx';
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);

        return response()->streamDownload(function() use ($writer) {
            $writer->save('php://output');
        }, $filename, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        ]);
    }

    /**
     * Return greves for a specific fonctionnaire as JSON
     */
    public function forFonctionnaire($id)
    {
        $greves = Greve::with(['fonctionnaire.nomFormationSanitaire', 'fonctionnaire.position'])
            ->where('fonctionnaire_id', $id)
            ->orderBy('date_debut', 'desc')
            ->get()
            ->map(function($g) {
                return [
                    'id' => $g->id,
                    'date_debut' => $g->date_debut,
                    'date_fin' => $g->date_fin,
                    'nombre_jours' => $g->nombre_jours ?? $g->calculateNombreJours(),
                    'remarque' => $g->remarque,
                    'fonctionnaire' => [
                            'id' => optional($g->fonctionnaire)->id,
                            'ppr' => optional($g->fonctionnaire)->ppr,
                            'nom' => optional($g->fonctionnaire)->nom,
                            'prenom' => optional($g->fonctionnaire)->prenom,
                            'position' => optional(optional($g->fonctionnaire)->position)->nom ?? null,
                            'nom_formation_sanitaire' => optional(optional($g->fonctionnaire)->nomFormationSanitaire)->nom ?? null,
                        ]
                ];
            });

        return response()->json(['success' => true, 'greves' => $greves]);
    }

    /**
     * Export greves for a fonctionnaire to Excel
     */
    public function exportForFonctionnaireExcel(Request $request)
    {
        $request->validate(['fonctionnaire_id' => 'required|exists:fonctionnaires,id']);
        $id = $request->fonctionnaire_id;

        $greves = Greve::with(['fonctionnaire.nomFormationSanitaire', 'fonctionnaire.position'])
            ->where('fonctionnaire_id', $id)
            ->orderBy('date_debut', 'desc')
            ->get();

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = [
            'A1' => 'PPR', 'B1' => 'Nom', 'C1' => 'Prénom', 'D1' => 'Formation sanitaire',
            'E1' => 'Position', 'F1' => 'Date début', 'G1' => 'Date fin', 'H1' => 'Durée (jours)', 'I1' => 'Remarque'
        ];
        foreach ($headers as $cell => $header) {
            $sheet->setCellValue($cell, $header);
            $sheet->getStyle($cell)->getFont()->setBold(true);
        }

        $row = 2;
        foreach ($greves as $g) {
            $sheet->setCellValue('A' . $row, optional($g->fonctionnaire)->ppr ?? '');
            $sheet->setCellValue('B' . $row, optional($g->fonctionnaire)->nom ?? '');
            $sheet->setCellValue('C' . $row, optional($g->fonctionnaire)->prenom ?? '');
            $sheet->setCellValue('D' . $row, optional(optional($g->fonctionnaire)->nomFormationSanitaire)->nom ?? '');
            $sheet->setCellValue('E' . $row, optional(optional($g->fonctionnaire)->position)->nom ?? '');
            $sheet->setCellValue('F' . $row, $g->date_debut ?? '');
            $sheet->setCellValue('G' . $row, $g->date_fin ?? '');
            $sheet->setCellValue('H' . $row, $g->nombre_jours ?? $g->calculateNombreJours());
            $sheet->setCellValue('I' . $row, $g->remarque ?? '');
            $row++;
        }

        foreach (range('A', 'I') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        $filename = 'greves_fonctionnaire_' . $id . '_' . date('Y-m-d_H-i-s') . '.xlsx';
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit;
    }

    /**
     * Export greves for a fonctionnaire to PDF (server-side query)
     */
    public function exportForFonctionnairePdf(Request $request)
    {
        $request->validate(['fonctionnaire_id' => 'required|exists:fonctionnaires,id']);
        $id = $request->fonctionnaire_id;

        $greves = Greve::with(['fonctionnaire.nomFormationSanitaire', 'fonctionnaire.position'])
            ->where('fonctionnaire_id', $id)
            ->orderBy('date_debut', 'desc')
            ->get();

        $pdf = new \TCPDF('P', 'mm', 'A4');
        $pdf->SetCreator('Application GRH-DMSPS Fès');
        $pdf->SetAuthor('DMSPS Fès');
        $pdf->SetTitle('Grèves fonctionnaire ' . $id);
        $pdf->SetMargins(15, 15, 15);
        $pdf->SetAutoPageBreak(true, 15);
        $pdf->AddPage();

        $pdf->SetFont('dejavusans', 'B', 14);
        $pdf->Cell(0, 8, 'GRÈVES DU FONCTIONNAIRE', 0, 1, 'C');
        $pdf->Ln(4);

        $pdf->SetFont('dejavusans', 'B', 10);
        $pdf->Cell(30, 8, 'PPR', 1, 0, 'C', true);
        $pdf->Cell(45, 8, 'Nom', 1, 0, 'C', true);
        $pdf->Cell(45, 8, 'Prénom', 1, 0, 'C', true);
        $pdf->Cell(40, 8, 'Formation', 1, 0, 'C', true);
        $pdf->Cell(25, 8, 'Début', 1, 0, 'C', true);
        $pdf->Cell(25, 8, 'Fin', 1, 0, 'C', true);
        $pdf->Cell(20, 8, 'Durée', 1, 1, 'C', true);

        $pdf->SetFont('dejavusans', '', 10);
        foreach ($greves as $g) {
            $ppr = optional($g->fonctionnaire)->ppr ?? '';
            $nom = optional($g->fonctionnaire)->nom ?? '';
            $prenom = optional($g->fonctionnaire)->prenom ?? '';
            $formation = optional(optional($g->fonctionnaire)->nomFormationSanitaire)->nom ?? '';
            $dateDeb = $g->date_debut ?? '';
            $dateFin = $g->date_fin ?? '';
            $jours = $g->nombre_jours ?? $g->calculateNombreJours();

            $pdf->Cell(30, 7, $ppr, 1, 0, 'C');
            $pdf->Cell(45, 7, substr($nom, 0, 25), 1, 0, 'L');
            $pdf->Cell(45, 7, substr($prenom, 0, 25), 1, 0, 'L');
            $pdf->Cell(40, 7, substr($formation, 0, 20), 1, 0, 'L');
            $pdf->Cell(25, 7, $dateDeb, 1, 0, 'C');
            $pdf->Cell(25, 7, $dateFin, 1, 0, 'C');
            $pdf->Cell(20, 7, $jours, 1, 1, 'C');
        }

        $filename = 'greves_fonctionnaire_' . $id . '_' . date('Y-m-d_H-i-s') . '.pdf';
        return response($pdf->Output($filename, 'S'))
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="' . $filename . '"');
    }
}
