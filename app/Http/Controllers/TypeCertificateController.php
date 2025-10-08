<?php

namespace App\Http\Controllers;

use App\Models\TypeCertificate;
use App\Utils\CustomPDF;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Yajra\DataTables\Facades\DataTables;

class TypeCertificateController extends Controller
{
    public function page()
    {
        return view('parameters.certificats.types.page');
    }


    public function add(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'nom_arabe' => 'required|string|max:255',
        ]);

        try {
            TypeCertificate::create([
                'nom' => $request->input('nom'),
                'nom_arabe' => $request->input('nom_arabe'),
            ]);

            return redirect()->back()->with('success', 'Types certificate ajouté avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de l\'ajout de la type de certificate.');
        }
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'nullable|string|max:255',
            'nom_arabe' => 'nullable|string|max:255',
        ]);

        try {
            $types = TypeCertificate::find($id);
            $types->nom = $request->input('nom') ?? $types->nom;
            $types->nom_arabe = $request->input('nom_arabe') ?? $types->nom_arabe;
            $types->save();

            return redirect()->back()->with('success', 'Types certificate mise à jour avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la mise à jour de la Types certificate.');
        }
    }



    public function data(Request $request)
    {
        $query = TypeCertificate::query();
        $query->where('id', '!=', null);
        return DataTables::of($query)
            ->addColumn('action', function ($data) {
                return view('parameters.certificats.types.action', compact('data'))->render();
            })
            ->rawColumns(['action'])
            ->toJson();
    }


    public function delete($id)
    {
        TypeCertificate::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Service supprimé avec succès');
    }

    public function export()
    {
        $data = TypeCertificate::all(['nom', 'nom_arabe']);


        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Nom');
        $sheet->setCellValue('B1', 'Nom Arabe');


        foreach ($data as $index => $row) {
            $sheet->setCellValue('A' . ($index + 2), $row->nom);
            $sheet->setCellValue('B' . ($index + 2), $row->nom_arabe);
        }


        $fileName = 'TypeCertificate.xlsx';
        $filePath = storage_path("app/public/{$fileName}");

        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend();
    }




    public function pdf()
    {
        $data = TypeCertificate::all(['nom', 'nom_arabe']);

        $pdf = new CustomPDF();

        // Set document information
        $pdf->SetCreator('GRHDMSP-Fes');
        $pdf->SetAuthor('Med Kaddouri');
        $pdf->SetTitle('Type certificate');
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
        $html = '<h2 style="text-align: center;">Les Services</h2>';
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
            fn() => $pdf->Output('TypeCertificate.pdf', 'I'),
            'TypeCertificate.pdf'
        );
    }
}
