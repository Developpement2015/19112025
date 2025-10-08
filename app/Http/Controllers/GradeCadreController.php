<?php

namespace App\Http\Controllers;

use App\Models\GradeCadre;
use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Region;
use App\Models\Ville;
use App\Utils\CustomPDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Yajra\DataTables\Facades\DataTables;

class GradeCadreController extends Controller
{
    public function page()
    {
        return view('parameters.grades-cadre.page');
    }


    public function add(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'nom_arabe' => 'required|string|max:255',
            'cadre_id' => 'required',

        ]);
        try {
            GradeCadre::create([
                'nom' => $request->input('nom'),
                'nom_arabe' => $request->input('nom_arabe'),
                'cadre_id' => $request->input('cadre_id'),
            ]);

            return redirect()->back()->with('success', 'Grade de Cadre ajouté avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de l\'ajout de la Grade de Cadre.');
        }
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'nullable|string|max:255',
            'nom_arabe' => 'nullable|string|max:255',
            'cadre_id' => 'nullable|exists:cadres,id',
        ]);

        try {
            $GradeCadre = GradeCadre::find($id);
            $GradeCadre->nom = $request->input('nom') ?? $GradeCadre->nom;
            $GradeCadre->nom_arabe = $request->input('nom_arabe') ?? $GradeCadre->nom_arabe;
            $GradeCadre->cadre_id = $request->input('cadre_id') ?? $GradeCadre->cadre_id;
            $GradeCadre->save();

            return redirect()->back()->with('success', 'Grade de Cadre mise à jour avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la mise à jour de la Grade de Cadre.');
        }
    }



    public function data(Request $request)
    {
        $query = GradeCadre::query();
        $query->where('id', '!=', null);
        return DataTables::of($query)
            ->addColumn('action', function ($data) {
                return view('parameters.grades-cadre.action', compact('data'))->render();
            })
            ->addColumn("cadre", function ($data) {
                return $data->cadre ?  $data->cadre->nom . ' - ' . $data->cadre->nom_arabe : '-';
            })
            ->filter(function ($query) use ($request) {
                if ($search = $request->get('search')['value'] ?? null) {
                    $query->where(function ($q) use ($search) {
                        $q->where('nom', 'like', "%{$search}%")
                          ->orWhere('nom_arabe', 'like', "%{$search}%")
                          ->orWhereHas('cadre', function ($q2) use ($search) {
                              $q2->where('nom', 'like', "%{$search}%")
                                 ->orWhere('nom_arabe', 'like', "%{$search}%");
                          });
                    });
                }
            })
            ->rawColumns(['action'])
            ->toJson();
    }


    public function delete($id)
    {
        GradeCadre::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Grade de Cadre supprimé avec succès');
    }

    public function export()
    {
        $data = GradeCadre::all(['nom', 'nom_arabe', 'cadre_id']);


        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Cadre');
        $sheet->setCellValue('B1', 'Nom');
        $sheet->setCellValue('C1', 'Nom Arabe');



        foreach ($data as $index => $row) {
            $sheet->setCellValue('A' . ($index + 2), $row->cadre->nom . ' - ' . $row->cadre->nom_arabe);
            $sheet->setCellValue('B' . ($index + 2), $row->nom);
            $sheet->setCellValue('C' . ($index + 2), $row->nom_arabe);
        }


        $fileName = 'Grades_Cadres.xlsx';
        $filePath = storage_path("app/public/{$fileName}");

        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend();
    }




    public function pdf()
    {
        $data = GradeCadre::all(['nom', 'nom_arabe', 'cadre_id']);

        $pdf = new CustomPDF();

        // Set document information
        $pdf->SetCreator('GRHDMSP-Fes');
        $pdf->SetAuthor('Med Kaddouri');
        $pdf->SetTitle('Grade Cadre');
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
        $html = '<h2 style="text-align: center;">Les Cadre</h2>';
        $html .= '<table border="1" cellspacing="0" cellpadding="4" style="width: 100%; text-align: center; border-collapse: collapse; margin-top: 20px;">
                    <thead>
                        <tr>
                            <th style="background-color: #4b75ff; color: white;font-weight: bold;font-size: 14px;">Cadre</th>
                            <th style="background-color: #4b75ff; color: white;font-weight: bold;font-size: 14px;">Nom</th>
                            <th style="background-color: #4b75ff; color: white;font-weight: bold;font-size: 14px;">الاسم بالعربية</th>
                        </tr>
                    </thead>
                    <tbody>';

        foreach ($data as $row) {
            $html .= '<tr>
                        <td>' . $row->cadre->nom . ' - ' . $row->cadre->nom_arabe . '</td>
                        <td>' . $row->nom . '</td>
                        <td style="direction: rtl; text-align: center;">' . $row->nom_arabe . '</td>
                      </tr>';
        }

        $html .= '</tbody></table>';

        // Write HTML content
        $pdf->writeHTML($html, true, false, true, false, '');

        // Output PDF to the browser
        return response()->streamDownload(
            fn() => $pdf->Output('Grades_Cadres.pdf', 'I'),
            'Grades_Cadres.pdf'
        );
    }

}
