<?php

namespace App\Http\Controllers;

use App\Models\Option;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OptionController extends Controller
{
    /**
     * Get all options for AJAX requests
     */
    public function index()
    {
        $options = Option::all();
        return response()->json($options);
    }

    /**
     * Get data for DataTables
     */
    public function data(Request $request)
    {
        $query = Option::query();

        return DataTables::of($query)
            ->addColumn('action', function ($data) {
                return '
                    <button type="button" class="btn btn-sm btn-success me-1" onclick="editOption(' . $data->id . ')">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-danger" onclick="deleteOption(' . $data->id . ')">
                        <i class="fas fa-trash"></i>
                    </button>
                ';
            })
            ->rawColumns(['action'])
            ->toJson();
    }

    /**
     * Store a new option
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'nom_arabe' => 'required|string|max:255',
        ]);

        try {
            $option = Option::create([
                'nom' => $request->nom,
                'nom_arabe' => $request->nom_arabe,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Option ajoutée avec succès',
                'data' => $option
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l\'ajout de l\'option'
            ], 500);
        }
    }

    /**
     * Show a specific option
     */
    public function show($id)
    {
        $option = Option::findOrFail($id);
        return response()->json($option);
    }

    /**
     * Update an option
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'nom_arabe' => 'required|string|max:255',
        ]);

        try {
            $option = Option::findOrFail($id);
            $option->update([
                'nom' => $request->nom,
                'nom_arabe' => $request->nom_arabe,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Option mise à jour avec succès',
                'data' => $option
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la mise à jour de l\'option'
            ], 500);
        }
    }

    /**
     * Delete an option
     */
    public function destroy($id)
    {
        try {
            $option = Option::findOrFail($id);
            $option->delete();

            return response()->json([
                'success' => true,
                'message' => 'Option supprimée avec succès'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression de l\'option'
            ], 500);
        }
    }
}
