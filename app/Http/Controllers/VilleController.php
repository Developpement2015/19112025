<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Ville;
use App\Utils\CustomPDF;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Yajra\DataTables\Facades\DataTables;

class VilleController extends Controller
{
    public function page()
    {
        return view('parameters.villes.page');
    }


    public function add(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'nom_arabe' => 'required|string|max:255',
            'region_id' => 'required|exists:regions,id',
        ]);

        try {
            Ville::create([
                'nom' => $request->input('nom'),
                'nom_arabe' => $request->input('nom_arabe'),
                'region_id' => $request->input('region_id'),
            ]);

            return redirect()->back()->with('success', 'Villes ajouté avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de l\'ajout de la ville.');
        }
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'nullable|string|max:255',
            'nom_arabe' => 'nullable|string|max:255',
            'region_id' => 'required|exists:regions,id',
        ]);

        try {
            $region = Ville::find($id);
            $region->nom = $request->input('nom') ?? $region->nom;
            $region->nom_arabe = $request->input('nom_arabe') ?? $region->nom_arabe;
            $region->region_id = $request->input('region_id') ?? $region->region_id;
            $region->save();

            return redirect()->back()->with('success', 'Ville mise à jour avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la mise à jour de la ville.');
        }
    }



    public function data(Request $request)
    {
        $query = Ville::query()
            ->with(['region'])
            ->where('id', '!=', null);

        return DataTables::of($query)
            ->addColumn('action', function ($data) {
                return view('parameters.villes.action', compact('data'))->render();
            })
            ->addColumn("region", function ($data) {
                return optional($data->region)->nom ?? 'N/A';
            })
            ->addColumn("region_arabe", function ($data) {
                return optional($data->region)->nom_arabe ?? 'N/A';
            })
            // Filter by region name (French)
            ->filterColumn('region', function ($query, $keyword) {
                $query->whereHas('region', function ($q) use ($keyword) {
                    $q->where('nom', 'like', "%{$keyword}%");
                });
            })

            // Filter by region name (Arabic)
            ->filterColumn('region_arabe', function ($query, $keyword) {
                $query->whereHas('region', function ($q) use ($keyword) {
                    $q->where('nom_arabe', 'like', "%{$keyword}%");
                });
            })
            ->rawColumns(['action'])
            ->toJson();
    }


    public function delete($id)
    {
        Ville::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Ville supprimé avec succès');
    }

    public function export()
    {
        $data = Ville::all(['nom', 'nom_arabe', 'region_id']);


        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Nom');
        $sheet->setCellValue('B1', 'Nom Arabe');
        $sheet->setCellValue('C1', 'Region');
        $sheet->setCellValue('D1', 'Region Arabe');


        foreach ($data as $index => $row) {
            $sheet->setCellValue('A' . ($index + 2), $row->nom);
            $sheet->setCellValue('B' . ($index + 2), $row->nom_arabe);
            $sheet->setCellValue('C' . ($index + 2), optional($row->region)->nom ?? '');
            $sheet->setCellValue('D' . ($index + 2), optional($row->region)->nom_arabe ?? '');
        }


        $fileName = 'villes.xlsx';
        $filePath = storage_path("app/public/{$fileName}");

        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend();
    }




    public function pdf()
    {
        $data = Ville::all(['nom', 'nom_arabe', 'region_id']);

        $pdf = new CustomPDF();

        // Set document information
        $pdf->SetCreator('GRHDMSP-Fes');
        $pdf->SetAuthor('Med Kaddouri');
        $pdf->SetTitle('Regions');
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
        $html = '<h2 style="text-align: center;">Les Villes</h2>';
        $html .= '<table border="1" cellspacing="0" cellpadding="4" style="width: 100%; text-align: center; border-collapse: collapse; margin-top: 20px;">
                    <thead>
                        <tr>
                            <th style="background-color: #4b75ff; color: white;font-weight: bold;font-size: 14px;">Nom</th>
                            <th style="background-color: #4b75ff; color: white;font-weight: bold;font-size: 14px;">الاسم بالعربية</th>
                            <th style="background-color: #4b75ff; color: white;font-weight: bold;font-size: 14px;">Region</th>
                            <th style="background-color: #4b75ff; color: white;font-weight: bold;font-size: 14px;">الجهة</th>
                        </tr>
                    </thead>
                    <tbody>';

        foreach ($data as $row) {
                        $html .= '<tr>
                                                <td>' . $row->nom . '</td>
                                                <td style="direction: rtl; text-align: center;">' . $row->nom_arabe . '</td>
                                                <td>' . (optional($row->region)->nom ?? '') . '</td>
                                                <td style="direction: rtl; text-align: center;">' . (optional($row->region)->nom_arabe ?? '') . '</td>
                                            </tr>';
        }

        $html .= '</tbody></table>';

        // Write HTML content
        $pdf->writeHTML($html, true, false, true, false, '');

        // Output PDF to the browser
        return response()->streamDownload(
            fn() => $pdf->Output('villes.pdf', 'I'),
            'villes.pdf'
        );
    }
}
