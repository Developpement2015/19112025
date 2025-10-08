<?php

namespace App\Http\Controllers;

use App\Models\HistoriquePopulation;
use App\Models\NomFormationSanitaire;
use App\Utils\CustomPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class NomFormationSanitaireController extends Controller
{
    public function page()
    {
        return view('parameters.nom-formation-sanitaire.page');
    }


    public function add(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'nom_arabe' => 'required|string|max:255',
            'niveau_categorie_formation_id' => 'required',
            'arrondissement_commune_id' => 'required',
        ]);

        try {
            NomFormationSanitaire::create([
                'nom' => $request->input('nom'),
                'nom_arabe' => $request->input('nom_arabe'),
                'niveau_categorie_formation_id' => $request->input('niveau_categorie_formation_id'),
                'arrondissement_commune_id' => $request->input('arrondissement_commune_id'),
            ]);

            return redirect()->back()->with('success', 'Nom Categorie Formation ajouté avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de l\'ajout de nom de la Categorie Formation.');
        }
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'nullable|string|max:255',
            'nom_arabe' => 'nullable|string|max:255',
            'niveau_categorie_formation_id' => 'required',
            'arrondissement_commune_id' => 'required',

        ]);

        try {
            $CategorieFormation = NomFormationSanitaire::find($id);
            $CategorieFormation->nom = $request->input('nom') ?? $CategorieFormation->nom;
            $CategorieFormation->nom_arabe = $request->input('nom_arabe') ?? $CategorieFormation->nom_arabe;
            $CategorieFormation->niveau_categorie_formation_id = $request->input('niveau_categorie_formation_id') ?? $CategorieFormation->niveau_categorie_formation_id;
            $CategorieFormation->arrondissement_commune_id = $request->input('arrondissement_commune_id') ?? $CategorieFormation->arrondissement_commune_id;


            $CategorieFormation->save();

            return redirect()->back()->with('success', 'Nom Categorie Formation mise à jour avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la mise à jour de nom de la Categorie Formation.');
        }
    }



    public function data(Request $request)
    {
        $query = NomFormationSanitaire::query();
        $query->where('id', '!=', null);
try {
    return DataTables::of($query)
    ->addColumn('action', function ($data) {
        return view('parameters.nom-formation-sanitaire.action', compact('data'))->render();
    })
    ->addColumn('niveau_categorie_formation', function ($data) {
        $niv = $data->niveaucategorieformation ?? null;
        $typeCat = $niv && isset($niv->type_categorie_formation) ? $niv->type_categorie_formation : null;
        $cat = $typeCat && isset($typeCat->categorieFormation) ? $typeCat->categorieFormation : null;

        $niveau = $cat ? ($cat->nom . ' - ' . $cat->nom_arabe) : '';
        $type = $typeCat ? ($typeCat->nom . ' - ' . $typeCat->nom_arabe) : '';
        $niveauCat = $niv ? ($niv->nom . ' - ' . $niv->nom_arabe) : '';

        return trim((($niveau !== '') ? $niveau . '<br>' : '') . (($type !== '') ? $type . '<br>' : '') . $niveauCat, '<br>');
    })

    ->addColumn('arrondissement_commune', function ($data) {
        $arrObj = $data->arrondissement_commune ?? null;
        $villeObj = $arrObj && isset($arrObj->ville) ? $arrObj->ville : null;
        $regionObj = $villeObj && isset($villeObj->region) ? $villeObj->region : null;

        $arr = $arrObj ? ($arrObj->nom . ' - ' . $arrObj->nom_arabe) : '';
        $ville = $villeObj ? ($villeObj->nom . ' - ' . $villeObj->nom_arabe) : '';
        $region = $regionObj ? ($regionObj->nom . ' - ' . $regionObj->nom_arabe) : '';

        return trim((($arr !== '') ? $arr . '<br>' : '') . (($region !== '') ? $region . '<br>' : '') . $ville, '<br>');
    })


    ->addColumn('population', function ($data) {
        $population = HistoriquePopulation::where('nom_formation_sanitaire_id', $data->id)->orderBy('annee', 'desc')->limit(1)->first();
        return $population ? $population->population . ' - ' . $population->annee : '-';
    })

    ->rawColumns(['action','arrondissement_commune','niveau_categorie_formation'])
    ->toJson();
} catch (\Exception $e) {
    Log::error('NomFormationSanitaire data error: ' . $e->getMessage(), ['exception' => $e]);

    return response()->json([
        'draw' => intval($request->get('draw', 0)),
        'recordsTotal' => 0,
        'recordsFiltered' => 0,
        'data' => [],
        'error' => 'Erreur serveur lors du chargement des données.'
    ], 500);
}
   }


    public function delete($id)
    {
        NomFormationSanitaire::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Nom de Categorie Formation supprimé avec succès');
    }

    public function export()
    {
        $data = NomFormationSanitaire::all(['nom', 'nom_arabe', 'niveau_categorie_formation_id', 'arrondissement_commune_id']);


        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Niveau Catégorie Formation');
        $sheet->setCellValue('B1', 'Arrondissement/Commune');

        $sheet->setCellValue('C1', 'Nom');
        $sheet->setCellValue('D1', 'Nom Arabe');


        foreach ($data as $index => $row) {
            $niv = $row->niveaucategorieformation ?? null;
            $typeCat = $niv && isset($niv->type_categorie_formation) ? $niv->type_categorie_formation : null;
            $cat = $typeCat && isset($typeCat->categorieFormation) ? $typeCat->categorieFormation : null;

            $niveau = $cat ? ($cat->nom . ' - ' . $cat->nom_arabe) : '';
            $type = $typeCat ? ($typeCat->nom . ' - ' . $typeCat->nom_arabe) : '';
            $niveauCat = $niv ? ($niv->nom . ' - ' . $niv->nom_arabe) : '';
            $sheet->setCellValue('A' . ($index + 2), trim((($niveau !== '') ? $niveau . ' | ' : '') . (($type !== '') ? $type . ' | ' : '') . $niveauCat, ' | '));

            $arrObj = $row->arrondissement_commune ?? null;
            $villeObj = $arrObj && isset($arrObj->ville) ? $arrObj->ville : null;
            $regionObj = $villeObj && isset($villeObj->region) ? $villeObj->region : null;

            $arr = $arrObj ? ($arrObj->nom . ' - ' . $arrObj->nom_arabe) : '';
            $ville = $villeObj ? ($villeObj->nom . ' - ' . $villeObj->nom_arabe) : '';
            $region = $regionObj ? ($regionObj->nom . ' - ' . $regionObj->nom_arabe) : '';
            $sheet->setCellValue('B' . ($index + 2), trim((($arr !== '') ? $arr . ' | ' : '') . (($region !== '') ? $region . ' | ' : '') . $ville, ' | '));

            $sheet->setCellValue('C' . ($index + 2), $row->nom);
            $sheet->setCellValue('D' . ($index + 2), $row->nom_arabe);
        }


        $fileName = 'Nom_Categorie_Formation.xlsx';
        $filePath = storage_path("app/public/{$fileName}");

        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend();
    }




    public function pdf()
    {
        $data = NomFormationSanitaire::all(['nom', 'nom_arabe', 'niveau_categorie_formation_id', 'arrondissement_commune_id']);

        $pdf = new CustomPDF();

        // Set document information
        $pdf->SetCreator('GRHDMSP-Fes');
        $pdf->SetAuthor('Med Kaddouri');
        $pdf->SetTitle('Nom Catégorie Formation');
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
        $html = '<h2 style="text-align: center;">Les noms des Catégories Formation</h2>';
        $html .= '<table border="1" cellspacing="0" cellpadding="4" style="width: 100%; text-align: center; border-collapse: collapse; margin-top: 20px;">
                    <thead>
                        <tr>
                            <th style="background-color: #4b75ff; color: white;font-weight: bold;font-size: 14px;">Niveau Catégorie Formation</th>
                            <th style="background-color: #4b75ff; color: white;font-weight: bold;font-size: 14px;">Arrondissement/Commune</th>
                            <th style="background-color: #4b75ff; color: white;font-weight: bold;font-size: 14px;">Nom</th>
                            <th style="background-color: #4b75ff; color: white;font-weight: bold;font-size: 14px;">الاسم بالعربية</th>
                        </tr>
                    </thead>
                    <tbody>';

        foreach ($data as $row) {
                        $niv = $row->niveaucategorieformation ?? null;
                        $typeCat = $niv && isset($niv->type_categorie_formation) ? $niv->type_categorie_formation : null;
                        $cat = $typeCat && isset($typeCat->categorieFormation) ? $typeCat->categorieFormation : null;

                        $niveau = $cat ? ($cat->nom . ' - ' . $cat->nom_arabe) : '';
                        $type = $typeCat ? ($typeCat->nom . ' - ' . $typeCat->nom_arabe) : '';
                        $niveauCat = $niv ? ($niv->nom . ' - ' . $niv->nom_arabe) : '';

                        $arrObj = $row->arrondissement_commune ?? null;
                        $villeObj = $arrObj && isset($arrObj->ville) ? $arrObj->ville : null;
                        $regionObj = $villeObj && isset($villeObj->region) ? $villeObj->region : null;

                        $arr = $arrObj ? ($arrObj->nom . ' - ' . $arrObj->nom_arabe) : '';
                        $ville = $villeObj ? ($villeObj->nom . ' - ' . $villeObj->nom_arabe) : '';
                        $region = $regionObj ? ($regionObj->nom . ' - ' . $regionObj->nom_arabe) : '';

                        $html .= '<tr>'
                                . '<td style="text-align: center;">' . trim((($niveau !== '') ? $niveau . '<br>' : '') . (($type !== '') ? $type . '<br>' : '') . $niveauCat, '<br>') . '</td>'
                                . '<td style="text-align: center;">' . trim((($arr !== '') ? $arr . '<br>' : '') . (($region !== '') ? $region . '<br>' : '') . $ville, '<br>') . '</td>'
                                . '<td>' . $row->nom . '</td>'
                                . '<td style="direction: rtl; text-align: center;">' . $row->nom_arabe . '</td>'
                                . '</tr>';
        }

        $html .= '</tbody></table>';

        // Write HTML content
        $pdf->writeHTML($html, true, false, true, false, '');

        // Output PDF to the browser
        return response()->streamDownload(
            fn() => $pdf->Output('NomCategorieFormation.pdf', 'I'),
            'NomCategorieFormation.pdf'
        );
    }

}
