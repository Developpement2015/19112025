<?php

namespace App\Http\Controllers;

use App\Models\SpecialiteGrade;
use App\Utils\CustomPDF;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Yajra\DataTables\Facades\DataTables;

class SpecialiteGradeController extends Controller
{
    public function page()
    {
        return view('parameters.specialite-grade.page');
    }


    public function add(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'nom_arabe' => 'required|string|max:255',
            'grade_id' => 'required',

        ]);
        try {
            SpecialiteGrade::create([
                'nom' => $request->input('nom'),
                'nom_arabe' => $request->input('nom_arabe'),
                'grade_id' => $request->input('grade_id'),
            ]);

            return redirect()->back()->with('success', 'Specialite grade  ajouté avec succès');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de l\'ajout de Specialite grade.');
        }
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'nullable|string|max:255',
            'nom_arabe' => 'nullable|string|max:255',
            'grade_id' => 'nullable',
        ]);


        try {
            $GradeCadre = SpecialiteGrade::find($id);
            $GradeCadre->nom = $request->input('nom') ?? $GradeCadre->nom;
            $GradeCadre->nom_arabe = $request->input('nom_arabe') ?? $GradeCadre->nom_arabe;
            $GradeCadre->grade_id = $request->input('grade_id') ?? $GradeCadre->grade_id;
            $GradeCadre->save();

            return redirect()->back()->with('success', 'Specialite Grade mise à jour avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la mise à jour de la Specialite Grade.');
        }
    }



public function data(Request $request)
{
    // 1. Eager load all necessary relationships to make it fast and efficient.
    // This reduces hundreds of database queries down to just a few.
    $query = SpecialiteGrade::with([
        'grade.cadre.categorie_cadre'
    ]);

    return DataTables::of($query)
        ->addColumn('action', function ($data) {
            return view('parameters.specialite-grade.action', compact('data'))->render();
        })
        ->addColumn("grade", function ($data) {
            // 2. Use the null-safe operator (?->) to prevent errors.
            // This stops the code from crashing if 'grade' or 'cadre' is null.
            $category = $data->grade?->cadre?->categorie_cadre?->nom . ' - ' . $data->grade?->cadre?->categorie_cadre?->nom_arabe;
            $cadre = $data->grade?->cadre?->nom . ' - ' . $data->grade?->cadre?->nom_arabe;
            $grade = $data->grade?->nom . ' - ' . $data->grade?->nom_arabe;

            // This ensures nothing is displayed if a relationship is missing.
            if (!$data->grade) {
                return '-';
            }

            return $category . "<br/>" . $cadre . "<br/>" . $grade;
        })
        ->rawColumns(['action', 'grade'])
        ->toJson();
}



    public function delete($id)
    {
        SpecialiteGrade::where('id', $id)->delete();
        return redirect()->back()->with('success', 'specialite grade supprimé avec succès');
    }

    public function export()
    {
        $data = SpecialiteGrade::all(['nom', 'nom_arabe', 'grade_id']);


        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Catégorie Cadre');
        $sheet->setCellValue('B1', 'Nom');
        $sheet->setCellValue('C1', 'Nom Arabe');



        foreach ($data as $index => $row) {
            $sheet->setCellValue('A' . ($index + 2), $row->grade->cadre->categorie_cadre->nom . ' - ' . $row->grade->cadre->categorie_cadre->nom_arabe . ' - ' .  $row->grade->cadre->nom . ' - ' . $row->grade->cadre->nom_arabe . ' - ' . $row->grade->nom . ' - ' . $row->grade->nom_arabe);
            $sheet->setCellValue('B' . ($index + 2), $row->nom);
            $sheet->setCellValue('C' . ($index + 2), $row->nom_arabe);
        }


        $fileName = 'Specialite_Grade.xlsx';
        $filePath = storage_path("app/public/{$fileName}");

        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend();
    }




    public function pdf()
    {
        $data = SpecialiteGrade::all(['nom', 'nom_arabe', 'grade_id']);

        $pdf = new CustomPDF();

        // Set document information
        $pdf->SetCreator('GRHDMSP-Fes');
        $pdf->SetAuthor('Med Kaddouri');
        $pdf->SetTitle('Specialite Grade');
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
        $html = '<h2 style="text-align: center;">Les Spécialité</h2>';
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
                        <td>' . $row->grade->cadre->categorie_cadre->nom . ' - ' . $row->grade->cadre->categorie_cadre->nom_arabe . '<br/>' . $row->grade->cadre->nom . ' - ' . $row->grade->cadre->nom_arabe . '<br/>' . $row->grade->nom . ' - ' . $row->grade->nom_arabe . '</td>
                        <td>' . $row->nom . '</td>
                        <td style="direction: rtl; text-align: center;">' . $row->nom_arabe . '</td>
                      </tr>';
        }

        $html .= '</tbody></table>';

        // Write HTML content
        $pdf->writeHTML($html, true, false, true, false, '');

        // Output PDF to the browser
        return response()->streamDownload(
            fn() => $pdf->Output('Specialite_Grade.pdf', 'I'),
            'Specialite_Grade.pdf'
        );
    }

}
