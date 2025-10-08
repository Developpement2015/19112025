<?php

namespace App\Http\Controllers;

use App\Models\TypeCategorieFormation;
use App\Utils\CustomPDF;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Yajra\DataTables\Facades\DataTables;

class TypeCategorieFormationController extends Controller
{
    public function page()
    {
        return view('parameters.type-categorie-formation.page');
    }


    public function add(Request $request)
    {
        
        $request->validate([
            'nom' => 'required|string|max:255',
            'nom_arabe' => 'required|string|max:255',
            'categorie_formation_id' => 'required',
        ]);
       

        try {
            TypeCategorieFormation::create([
                'nom' => $request->input('nom'),
                'nom_arabe' => $request->input('nom_arabe'),
                'categorie_formation_id' => $request->input('categorie_formation_id'),
            ]);
            

            return redirect()->back()->with('success', 'Type Categorie Formation ajouté avec succès');
        } catch (\Exception $e) {
             dd($e);
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de l\'ajout de la type Categorie Formation.');
        }
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'nullable|string|max:255',
            'nom_arabe' => 'nullable|string|max:255',
            'categorie_formation_id' => 'required',

        ]);

        try {
            $CategorieFormation = TypeCategorieFormation::find($id);
            $CategorieFormation->nom = $request->input('nom') ?? $CategorieFormation->nom;
            $CategorieFormation->nom_arabe = $request->input('nom_arabe') ?? $CategorieFormation->nom_arabe;
            $CategorieFormation->categorie_formation_id = $request->input('categorie_formation_id') ?? $CategorieFormation->categorie_formation_id;

            $CategorieFormation->save();

            return redirect()->back()->with('success', 'Type Categorie Formation mise à jour avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la mise à jour de la type Categorie Formation.');
        }
    }



    public function data(Request $request)
    {
        $query = TypeCategorieFormation::query();
        $query->where('id', '!=', null);
        return DataTables::of($query)
            ->addColumn('action', function ($data) {
                return view('parameters.type-categorie-formation.action', compact('data'))->render();
            })
            ->addColumn('categories_formations', function ($data) {
                return $data->categorieFormation->nom . ' - ' . $data->categorieFormation->nom_arabe;
            })

            ->rawColumns(['action'])
            ->toJson();
    }


    public function delete($id)
    {
        TypeCategorieFormation::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Type Categorie Formation supprimé avec succès');
    }

    public function export()
    {
        $data = TypeCategorieFormation::all(['nom', 'nom_arabe', 'categorie_formation_id']);


        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Catégorie Formation');
        $sheet->setCellValue('B1', 'Nom');
        $sheet->setCellValue('C1', 'Nom Arabe');


        foreach ($data as $index => $row) {
            $sheet->setCellValue('A' . ($index + 2), $row->categorieFormation->nom . ' - ' . $row->categorieFormation->nom_arabe);
            $sheet->setCellValue('B' . ($index + 2), $row->nom);
            $sheet->setCellValue('C' . ($index + 2), $row->nom_arabe);

        }


        $fileName = 'Type_Categorie_Formation.xlsx';
        $filePath = storage_path("app/public/{$fileName}");

        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend();
    }




    public function pdf()
    {
        $data = TypeCategorieFormation::all(['nom', 'nom_arabe', 'categorie_formation_id']);

        $pdf = new CustomPDF();

        // Set document information
        $pdf->SetCreator('GRHDMSP-Fes');
        $pdf->SetAuthor('Med Kaddouri');
        $pdf->SetTitle('Type Catégorie Formation');
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
        $html = '<h2 style="text-align: center;">Les Type des Catégories Formation</h2>';
        $html .= '<table border="1" cellspacing="0" cellpadding="4" style="width: 100%; text-align: center; border-collapse: collapse; margin-top: 20px;">
                    <thead>
                        <tr>
                            <th style="background-color: #4b75ff; color: white;font-weight: bold;font-size: 14px;">Catégorie de Formation</th>
                            <th style="background-color: #4b75ff; color: white;font-weight: bold;font-size: 14px;">Nom</th>
                            <th style="background-color: #4b75ff; color: white;font-weight: bold;font-size: 14px;">الاسم بالعربية</th>
                        </tr>
                    </thead>
                    <tbody>';

        foreach ($data as $row) {
            $html .= '<tr>
                        <td>' . $row->categorieFormation->nom . ' - ' . $row->categorieFormation->nom_arabe . '</td>

                        <td>' . $row->nom . '</td>
                        <td style="direction: rtl; text-align: center;">' . $row->nom_arabe . '</td>
                      </tr>';
        }

        $html .= '</tbody></table>';

        // Write HTML content
        $pdf->writeHTML($html, true, false, true, false, '');

        // Output PDF to the browser
        return response()->streamDownload(
            fn() => $pdf->Output('TypeCategorieFormation.pdf', 'I'),
            'TypeCategorieFormation.pdf'
        );
    }

}
