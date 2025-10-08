<?php

namespace App\Http\Controllers;

use App\Models\HistoriquePopulation;
use Illuminate\Http\Request;

class HistoriquePopulationController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'annee' => 'required|max:255',
            'population' => 'required|max:255',
            'nom_formation_sanitaire_id' => 'required',
        ]);


        $checkexistingpopulationinthesameyear = HistoriquePopulation::where('annee', $request->input('annee'))->where('nom_formation_sanitaire_id', $request->input('nom_formation_sanitaire_id'))->first();

        if ($checkexistingpopulationinthesameyear) {
            return redirect()->back()->with('error', 'Une population existe déjà pour cette année.');
        }

        try {
            HistoriquePopulation::create([
                'annee' => $request->input('annee'),
                'population' => $request->input('population'),
                'nom_formation_sanitaire_id' => $request->input('nom_formation_sanitaire_id'),
            ]);

            return redirect()->back()->with('success', 'Population ajouté avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de l\'ajout de nom de la population.');
        }
    }


    public function delete($id)
    {
        try {
            HistoriquePopulation::where('id', $id)->delete();
            return redirect()->back()->with('success', 'Population supprimé avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la suppression de la population.');
        }
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'annee' => 'required|max:255',
            'population' => 'required|max:255',
            'nom_formation_sanitaire_id' => 'required',
        ]);
        $checkexistingpopulationinthesameyear = HistoriquePopulation::where('annee', $request->input('annee'))->where('nom_formation_sanitaire_id', $request->input('nom_formation_sanitaire_id'))->first();

        if ($checkexistingpopulationinthesameyear) {
            return redirect()->back()->with('error', 'Une population existe déjà pour cette année.');
        }

        try {
            HistoriquePopulation::where('id', $id)->update([
                'annee' => $request->input('annee'),
                'population' => $request->input('population'),
                'nom_formation_sanitaire_id' => $request->input('nom_formation_sanitaire_id'),
            ]);

            return redirect()->back()->with('success', 'Population modifié avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la modification de la population.');
        }
    }
}
