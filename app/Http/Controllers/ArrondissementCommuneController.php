<?php

namespace App\Http\Controllers;

use App\Models\ArrondissementCommune;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use TCPDF;
use Yajra\DataTables\Facades\DataTables;
use App\Utils\CustomPDF;

class ArrondissementCommuneController extends Controller
{
    public function page()
    {
        return view('parameters.arrondissements-communes.page');
    }


    public function add(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'nom_arabe' => 'required|string|max:255',
            'ville_id' => 'required',

        ]);

        try {
            ArrondissementCommune::create([
                'nom' => $request->input('nom'),
                'nom_arabe' => $request->input('nom_arabe'),
                'ville_id' => $request->input('ville_id'),
            ]);

            return redirect()->back()->with('success', 'Arrondissement/Commune ajouté avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de l\'ajout de l\'arrondissement/commune.');
        }
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'nullable|string|max:255',
            'nom_arabe' => 'nullable|string|max:255',
            'ville_id' => 'required',
        ]);

        try {
            $arrondissementCommune = ArrondissementCommune::find($id);
            $arrondissementCommune->nom = $request->input('nom') ?? $arrondissementCommune->nom;
            $arrondissementCommune->nom_arabe = $request->input('nom_arabe') ?? $arrondissementCommune->nom_arabe;
            $arrondissementCommune->ville_id = $request->input('ville_id');
            $arrondissementCommune->save();

            return redirect()->back()->with('success', 'Arrondissement/Commune mise à jour avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la mise à jour de l\'arrondissement/commune.');
        }
    }



    public function data(Request $request)
    {
        $query = ArrondissementCommune::query();
        $query->where('id', '!=', null);
        return DataTables::of($query)
            ->addColumn('action', function ($data) {
                return view('parameters.arrondissements-communes.action', compact('data'))->render();
            })
            ->addColumn('ville', function ($data) {
                return $data->ville->nom . ' - ' . $data->ville->nom_arabe ;
            })
            ->rawColumns(['action'])
            ->toJson();
    }


    public function delete($id)
    {
        ArrondissementCommune::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Arrondissement/Commune supprimé avec succès');
    }

    public function export()
    {
        $data = ArrondissementCommune::all(['nom', 'nom_arabe', 'ville_id']);


        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Nom');
        $sheet->setCellValue('B1', 'Nom Arabe');
        $sheet->setCellValue('C1', 'Ville');


        foreach ($data as $index => $row) {
            $sheet->setCellValue('A' . ($index + 2), $row->nom);
            $sheet->setCellValue('B' . ($index + 2), $row->nom_arabe);
            $sheet->setCellValue('C' . ($index + 2), $row->ville->nom . ' - ' . $row->ville->nom_arabe);
        }


        $fileName = 'arrondissements_communes.xlsx';
        $filePath = storage_path("app/public/{$fileName}");

        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend();
    }




    public function pdf()
    {
        $data = ArrondissementCommune::all(['nom', 'nom_arabe', 'ville_id']);

        $pdf = new CustomPDF();

        // Set document information
        $pdf->SetCreator('GRHDMSP-Fes');
        $pdf->SetAuthor('Med Kaddouri');
        $pdf->SetTitle('Arrondissements et Communes');
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
        $html = '<h2 style="text-align: center;">Arrondissements et Communes</h2>';
        $html .= '<table border="1" cellspacing="0" cellpadding="4" style="width: 100%; text-align: center; border-collapse: collapse; margin-top: 20px;">
                    <thead>
                        <tr>
                            <th style="background-color: #4b75ff; color: white;font-weight: bold;font-size: 14px;">Nom</th>
                            <th style="background-color: #4b75ff; color: white;font-weight: bold;font-size: 14px;">الاسم بالعربية</th>
                            <th style="background-color: #4b75ff; color: white;font-weight: bold;font-size: 14px;">Ville</th>
                        </tr>
                    </thead>
                    <tbody>';

        foreach ($data as $row) {
            $html .= '<tr>
                        <td>' . $row->nom . '</td>
                        <td style="direction: rtl; text-align: center;">' . $row->nom_arabe . '</td>
                        <td>' . $row->ville->nom . ' - ' . $row->ville->nom_arabe . '</td>
                      </tr>';
        }

        $html .= '</tbody></table>';

        // Write HTML content
        $pdf->writeHTML($html, true, false, true, false, '');

        // Output PDF to the browser
        return response()->streamDownload(
            fn() => $pdf->Output('arrondissements_communes.pdf', 'I'),
            'arrondissements_communes.pdf'
        );
    }
}
