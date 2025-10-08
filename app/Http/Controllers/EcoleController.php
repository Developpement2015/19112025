<?php

namespace App\Http\Controllers;

use App\Models\Ecole;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EcoleController extends Controller
{
    /**
     * Get all ecoles for AJAX requests
     */
    public function index()
    {
        $ecoles = Ecole::all();
        return response()->json($ecoles);
    }

    /**
     * Get data for DataTables
     */
    public function data(Request $request)
    {
        $query = Ecole::query();

        return DataTables::of($query)
            ->addColumn('action', function ($data) {
                return '
                    <button type="button" class="btn btn-sm btn-success me-1" onclick="editEcole(' . $data->id . ')">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-danger" onclick="deleteEcole(' . $data->id . ')">
                        <i class="fas fa-trash"></i>
                    </button>
                ';
            })
            ->rawColumns(['action'])
            ->toJson();
    }

    /**
     * Store a new ecole
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'nom_arabe' => 'required|string|max:255',
        ]);

        try {
            $ecole = Ecole::create([
                'nom' => $request->nom,
                'nom_arabe' => $request->nom_arabe,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'École ajoutée avec succès',
                'data' => $ecole
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l\'ajout de l\'école'
            ], 500);
        }
    }

    /**
     * Show a specific ecole
     */
    public function show($id)
    {
        $ecole = Ecole::findOrFail($id);
        return response()->json($ecole);
    }

    /**
     * Update an ecole
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'nom_arabe' => 'required|string|max:255',
        ]);

        try {
            $ecole = Ecole::findOrFail($id);
            $ecole->update([
                'nom' => $request->nom,
                'nom_arabe' => $request->nom_arabe,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'École mise à jour avec succès',
                'data' => $ecole
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la mise à jour de l\'école'
            ], 500);
        }
    }

    /**
     * Delete an ecole
     */
    public function destroy($id)
    {
        try {
            $ecole = Ecole::findOrFail($id);
            $ecole->delete();

            return response()->json([
                'success' => true,
                'message' => 'École supprimée avec succès'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression de l\'école'
            ], 500);
        }
    }
}
