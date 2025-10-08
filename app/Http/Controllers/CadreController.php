<?php

namespace App\Http\Controllers;

use App\Models\Cadre;
use Illuminate\Http\Request;
use App\Models\CategorieCadre;
use App\Utils\CustomPDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Yajra\DataTables\Facades\DataTables;

class CadreController extends Controller
{
    public function page()
    {
        return view('parameters.cadres.page');
    }


    public function add(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'nom_arabe' => 'required|string|max:255',
            'categorie_cadre_id' => 'required',

        ]);
        try {
            Cadre::create([
                'nom' => $request->input('nom'),
                'nom_arabe' => $request->input('nom_arabe'),
                'categorie_cadre_id' => $request->input('categorie_cadre_id'),
            ]);

            return redirect()->back()->with('success', 'Cadre ajouté avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de l\'ajout de la Cadre.');
        }
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'nullable|string|max:255',
            'nom_arabe' => 'nullable|string|max:255',
            'categorie_cadre_id' => 'nullable|exists:categorie_cadres,id',
        ]);

        try {
            $CategorieCadre = Cadre::find($id);
            $CategorieCadre->nom = $request->input('nom') ?? $CategorieCadre->nom;
            $CategorieCadre->nom_arabe = $request->input('nom_arabe') ?? $CategorieCadre->nom_arabe;
            $CategorieCadre->categorie_cadre_id = $request->input('categorie_cadre_id') ?? $CategorieCadre->categorie_cadre_id;
            $CategorieCadre->save();

            return redirect()->back()->with('success', 'Cadre mise à jour avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la mise à jour de la Cadre.');
        }
    }



    public function data(Request $request)
    {
        $query = Cadre::query();
        $query->where('id', '!=', null);
        return DataTables::of($query)
            ->addColumn('action', function ($data) {
                return view('parameters.cadres.action', compact('data'))->render();
            })
            ->addColumn("categories_cadres", function ($data) {
                return $data->categorie_cadre ?  $data->categorie_cadre->nom . ' - ' . $data->categorie_cadre->nom_arabe : '-';
            })
            ->rawColumns(['action'])
            ->toJson();
    }


    public function delete($id)
    {
        Cadre::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Cadre supprimé avec succès');
    }

    public function export()
    {
        $data = Cadre::all(['nom', 'nom_arabe', 'categorie_cadre_id']);


        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Catégorie Cadre');
        $sheet->setCellValue('B1', 'Nom');
        $sheet->setCellValue('C1', 'Nom Arabe');



        foreach ($data as $index => $row) {
            $sheet->setCellValue('A' . ($index + 2), $row->categorie_cadre->nom . ' - ' . $row->categorie_cadre->nom_arabe);
            $sheet->setCellValue('B' . ($index + 2), $row->nom);
            $sheet->setCellValue('C' . ($index + 2), $row->nom_arabe);
        }


        $fileName = 'Cadre.xlsx';
        $filePath = storage_path("app/public/{$fileName}");

        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend();
    }




    public function pdf()
    {
        $data = Cadre::all(['nom', 'nom_arabe', 'categorie_cadre_id']);

        $pdf = new CustomPDF();

        // Set document information
        $pdf->SetCreator('GRHDMSP-Fes');
        $pdf->SetAuthor('Med Kaddouri');
        $pdf->SetTitle('Cadres');
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
                            <th style="background-color: #4b75ff; color: white;font-weight: bold;font-size: 14px;">Catégorie Cadre</th>
                            <th style="background-color: #4b75ff; color: white;font-weight: bold;font-size: 14px;">Nom</th>
                            <th style="background-color: #4b75ff; color: white;font-weight: bold;font-size: 14px;">الاسم بالعربية</th>
                        </tr>
                    </thead>
                    <tbody>';

        foreach ($data as $row) {
            $html .= '<tr>
                        <td>' . $row->categorie_cadre->nom . ' - ' . $row->categorie_cadre->nom_arabe . '</td>
                        <td>' . $row->nom . '</td>
                        <td style="direction: rtl; text-align: center;">' . $row->nom_arabe . '</td>
                      </tr>';
        }

        $html .= '</tbody></table>';

        // Write HTML content
        $pdf->writeHTML($html, true, false, true, false, '');

        // Output PDF to the browser
        return response()->streamDownload(
            fn() => $pdf->Output('Cadre.pdf', 'I'),
            'Cadre.pdf'
        );
    }
}
