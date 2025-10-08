<?php

namespace App\Http\Controllers;

use App\Models\NiveauCategorieFormation;
use App\Utils\CustomPDF;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Yajra\DataTables\Facades\DataTables;

class NiveauCategorieFormationController extends Controller
{
    public function page()
    {
        return view('parameters.niveau-categorie-formation.page');
    }


    public function add(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'nom_arabe' => 'required|string|max:255',
            'type_categorie_formation_id' => 'required',
        ]);

        try {
            NiveauCategorieFormation::create([
                'nom' => $request->input('nom'),
                'nom_arabe' => $request->input('nom_arabe'),
                'type_categorie_formation_id' => $request->input('type_categorie_formation_id'),
            ]);

            return redirect()->back()->with('success', 'Niveau Categorie Formation ajouté avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de l\'ajout de la niveau Categorie Formation.');
        }
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'nullable|string|max:255',
            'nom_arabe' => 'nullable|string|max:255',
            'type_categorie_formation_id' => 'required',

        ]);

        try {
            $CategorieFormation = NiveauCategorieFormation::find($id);
            $CategorieFormation->nom = $request->input('nom') ?? $CategorieFormation->nom;
            $CategorieFormation->nom_arabe = $request->input('nom_arabe') ?? $CategorieFormation->nom_arabe;
            $CategorieFormation->type_categorie_formation_id = $request->input('type_categorie_formation_id') ?? $CategorieFormation->type_categorie_formation_id;

            $CategorieFormation->save();

            return redirect()->back()->with('success', 'Niveau Categorie Formation mise à jour avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la mise à jour de la niveau Categorie Formation.');
        }
    }



    public function data(Request $request)
    {
        $query = NiveauCategorieFormation::query();
        $query->where('id', '!=', null);
        return DataTables::of($query)
            ->addColumn('action', function ($data) {
                return view('parameters.niveau-categorie-formation.action', compact('data'))->render();
            })
            ->addColumn('type_categorie_formation', function ($data) {
                return
                    $data->type_categorie_formation->categorieFormation->nom . ' - ' . $data->type_categorie_formation->categorieFormation->nom_arabe . '<br>' .

                    $data->type_categorie_formation->nom . ' - ' . $data->type_categorie_formation->nom_arabe;
            })

            ->rawColumns(['action','type_categorie_formation'])
            ->toJson();
    }


    public function delete($id)
    {
        NiveauCategorieFormation::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Niveau Categorie Formation supprimé avec succès');
    }

    public function export()
    {
        $data = NiveauCategorieFormation::all(['nom', 'nom_arabe', 'type_categorie_formation_id']);


        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Type Catégorie Formation');
        $sheet->setCellValue('B1', 'Nom');
        $sheet->setCellValue('C1', 'Nom Arabe');


        foreach ($data as $index => $row) {
            $sheet->setCellValue('A' . ($index + 2), $row->type_categorie_formation->categorieFormation->nom . ' - ' . $row->type_categorie_formation->categorieFormation->nom_arabe .

                $row->type_categorie_formation->nom . ' - ' . $row->type_categorie_formation->nom_arabe);
            $sheet->setCellValue('B' . ($index + 2), $row->nom);
            $sheet->setCellValue('C' . ($index + 2), $row->nom_arabe);
        }


        $fileName = 'Niveau_Categorie_Formation.xlsx';
        $filePath = storage_path("app/public/{$fileName}");

        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend();
    }




    public function pdf()
    {
        $data = NiveauCategorieFormation::all(['nom', 'nom_arabe', 'type_categorie_formation_id']);

        $pdf = new CustomPDF();

        // Set document information
        $pdf->SetCreator('GRHDMSP-Fes');
        $pdf->SetAuthor('Med Kaddouri');
        $pdf->SetTitle('Niveau Catégorie Formation');
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
        $html = '<h2 style="text-align: center;">Les niveaux des Catégories Formation</h2>';
        $html .= '<table border="1" cellspacing="0" cellpadding="4" style="width: 100%; text-align: center; border-collapse: collapse; margin-top: 20px;">
                    <thead>
                        <tr>
                            <th style="background-color: #4b75ff; color: white;font-weight: bold;font-size: 14px;">Type Catégorie de Formation</th>
                            <th style="background-color: #4b75ff; color: white;font-weight: bold;font-size: 14px;">Nom</th>
                            <th style="background-color: #4b75ff; color: white;font-weight: bold;font-size: 14px;">الاسم بالعربية</th>
                        </tr>
                    </thead>
                    <tbody>';

        foreach ($data as $row) {
            $html .= '<tr>
                        <td ><span style=" text-align: center;">' . $row->type_categorie_formation->categorieFormation->nom . ' - </span><span style="direction: rtl; text-align: center;">' . $row->type_categorie_formation->categorieFormation->nom_arabe . '</span><br>
                        <span style="direction: ltr; text-align: left;">' . $row->type_categorie_formation->nom . ' - </span><span style="direction: rtl; text-align: center;">' . $row->type_categorie_formation->nom_arabe . '</span></td>

                        <td>' . $row->nom . '</td>
                        <td style="direction: rtl; text-align: center;">' . $row->nom_arabe . '</td>
                      </tr>';
        }

        $html .= '</tbody></table>';

        // Write HTML content
        $pdf->writeHTML($html, true, false, true, false, '');

        // Output PDF to the browser
        return response()->streamDownload(
            fn() => $pdf->Output('NiveauCategorieFormation.pdf', 'I'),
            'NiveauCategorieFormation.pdf'
        );
    }
}
