<?php

namespace App\Http\Controllers;

use App\Models\TypeStage;
use App\Utils\CustomPDF;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Yajra\DataTables\Facades\DataTables;

class TypeStageController extends Controller
{
    public function page()
    {
        return view('parameters.stages.types.page');
    }


    public function add(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'nom_arabe' => 'required|string|max:255',
        ]);

        try {
            TypeStage::create([
                'nom' => $request->input('nom'),
                'nom_arabe' => $request->input('nom_arabe'),
            ]);

            return redirect()->back()->with('success', 'Types stage ajouté avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de l\'ajout de la type de stage.');
        }
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'nullable|string|max:255',
            'nom_arabe' => 'nullable|string|max:255',
        ]);

        try {
            $types = TypeStage::find($id);
            $types->nom = $request->input('nom') ?? $types->nom;
            $types->nom_arabe = $request->input('nom_arabe') ?? $types->nom_arabe;
            $types->save();

            return redirect()->back()->with('success', 'Types stage mise à jour avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la mise à jour de la Types stage.');
        }
    }



    public function data(Request $request)
    {
        $query = TypeStage::query();
        $query->where('id', '!=', null);
        return DataTables::of($query)
            ->addColumn('action', function ($data) {
                return view('parameters.stages.types.action', compact('data'))->render();
            })
            ->rawColumns(['action'])
            ->toJson();
    }


    public function delete($id)
    {
        TypeStage::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Types stage supprimé avec succès');
    }

    public function export()
    {
        $data = TypeStage::all(['nom', 'nom_arabe']);


        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Nom');
        $sheet->setCellValue('B1', 'Nom Arabe');


        foreach ($data as $index => $row) {
            $sheet->setCellValue('A' . ($index + 2), $row->nom);
            $sheet->setCellValue('B' . ($index + 2), $row->nom_arabe);
        }


        $fileName = 'types_stages.xlsx';
        $filePath = storage_path("app/public/{$fileName}");

        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend();
    }




    public function pdf()
    {
        $data = TypeStage::all(['nom', 'nom_arabe']);

        $pdf = new CustomPDF();

        // Set document information
        $pdf->SetCreator('GRHDMSP-Fes');
        $pdf->SetAuthor('Med Kaddouri');
        $pdf->SetTitle('Type Stage');
        $pdf->SetSubject('Export PDF');

        // Set header and footer images
        $pdf->headerImage = public_path('html/assets/img/pdf/header-delegation.png');
        $pdf->footerImage = public_path('html/assets/img/pdf/footer-deligation.png');

        // Set margins
        $pdf->SetMargins(15, 50, 15); // Left, Top, Right
        $pdf->SetHeaderMargin(20);
        $pdf->SetFooterMargin(20);

        // Set Auto Page Break
        $pdf->SetAutoPageBreak(true, 30); // Bottom margin for auto page break

        // Add a page
        $pdf->AddPage();

        // Set font
        $pdf->SetFont('dejavusans', '', 12);

        // Add content
        $html = '<h2 style="text-align: center;">Les Types de Stages</h2>';
        $html .= '<table border="1" cellspacing="0" cellpadding="4" style="width: 100%; text-align: center; border-collapse: collapse; margin-top: 20px;">
                    <thead>
                        <tr>
                            <th style="background-color: #4b75ff; color: white;font-weight: bold;font-size: 14px;">Nom</th>
                            <th style="background-color: #4b75ff; color: white;font-weight: bold;font-size: 14px;">الاسم بالعربية</th>
                        </tr>
                    </thead>
                    <tbody>';

        foreach ($data as $row) {
            $html .= '<tr>
                        <td>' . $row->nom . '</td>
                        <td style="direction: rtl; text-align: center;">' . $row->nom_arabe . '</td>
                      </tr>';
        }

        $html .= '</tbody></table>';

        // Write HTML content
        $pdf->writeHTML($html, true, false, true, false, '');

        // Output PDF to the browser
        return response()->streamDownload(
            fn() => $pdf->Output('TypeStage.pdf', 'I'),
            'TypeStage.pdf'
        );
    }

    // API Methods for Modal Integration
    public function index()
    {
        return response()->json(TypeStage::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'nom_arabe' => 'required|string|max:255',
        ]);

        try {
            $typeStage = TypeStage::create([
                'nom' => $request->nom,
                'nom_arabe' => $request->nom_arabe,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Type de stage ajouté avec succès',
                'data' => $typeStage
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l\'ajout du type de stage'
            ], 500);
        }
    }

    public function show($id)
    {
        $typeStage = TypeStage::findOrFail($id);
        return response()->json($typeStage);
    }

    public function updateApi(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'nom_arabe' => 'required|string|max:255',
        ]);

        try {
            $typeStage = TypeStage::findOrFail($id);
            $typeStage->update([
                'nom' => $request->nom,
                'nom_arabe' => $request->nom_arabe,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Type de stage mis à jour avec succès',
                'data' => $typeStage
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la mise à jour du type de stage'
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            TypeStage::findOrFail($id)->delete();
            return response()->json([
                'success' => true,
                'message' => 'Type de stage supprimé avec succès'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression du type de stage'
            ], 500);
        }
    }
}
