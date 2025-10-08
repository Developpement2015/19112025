<?php

namespace App\Http\Controllers;

use App\Models\Encadrant;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EncadrantController extends Controller
{
    /**
     * Get all encadrants for AJAX requests
     */
    public function index()
    {
        $encadrants = Encadrant::all();
        return response()->json($encadrants);
    }

    /**
     * Get data for DataTables
     */
    public function data(Request $request)
    {
        $query = Encadrant::query();

        return DataTables::of($query)
            ->addColumn('action', function ($data) {
                return '
                    <button type="button" class="btn btn-sm btn-success me-1" onclick="editEncadrant(' . $data->id . ')">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-danger" onclick="deleteEncadrant(' . $data->id . ')">
                        <i class="fas fa-trash"></i>
                    </button>
                ';
            })
            ->rawColumns(['action'])
            ->toJson();
    }

    /**
     * Store a new encadrant
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'nom_arabe' => 'required|string|max:255',
            'fonction' => 'required|string|max:255',
            'fonction_arabe' => 'required|string|max:255',
        ]);

        try {
            $encadrant = Encadrant::create([
                'nom' => $request->nom,
                'nom_arabe' => $request->nom_arabe,
                'fonction' => $request->fonction,
                'fonction_arabe' => $request->fonction_arabe,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Encadrant ajouté avec succès',
                'data' => $encadrant
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l\'ajout de l\'encadrant'
            ], 500);
        }
    }

    /**
     * Show a specific encadrant
     */
    public function show($id)
    {
        $encadrant = Encadrant::findOrFail($id);
        return response()->json($encadrant);
    }

    /**
     * Update an encadrant
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'nom_arabe' => 'required|string|max:255',
            'fonction' => 'required|string|max:255',
            'fonction_arabe' => 'required|string|max:255',
        ]);

        try {
            $encadrant = Encadrant::findOrFail($id);
            $encadrant->update([
                'nom' => $request->nom,
                'nom_arabe' => $request->nom_arabe,
                'fonction' => $request->fonction,
                'fonction_arabe' => $request->fonction_arabe,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Encadrant mis à jour avec succès',
                'data' => $encadrant
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la mise à jour de l\'encadrant'
            ], 500);
        }
    }

    /**
     * Delete an encadrant
     */
    public function destroy($id)
    {
        try {
            $encadrant = Encadrant::findOrFail($id);
            $encadrant->delete();

            return response()->json([
                'success' => true,
                'message' => 'Encadrant supprimé avec succès'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression de l\'encadrant'
            ], 500);
        }
    }
}
