<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salle;
use Exception;

class SalleController extends Controller
{
    // Lister toutes les salles
    public function index()
    {
        try {
            $salles = Salle::select(
                'id',
                'libelle',
                'capacity',
                'localisation'
            )->orderBy('id', 'desc')->get();

            return response()->json($salles);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error fetching rooms',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Créer une salle
    public function store(Request $request)
    {
        try {
            $salle = Salle::create([
                'libelle' => $request->name,
                'capacity' => $request->capacity,
                'localisation' => $request->location,
                'disponibilite' => true,
                'examen_id' => null,
                'responsable_id' => null,
            ]);

            return response()->json([
                'message' => 'Room added successfully',
                'data' => $salle
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error adding room',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Modifier une salle
    public function update(Request $request, $id)
    {
        try {
            $salle = Salle::findOrFail($id);

            $salle->update([
                'libelle' => $request->name,
                'capacity' => $request->capacity,
                'localisation' => $request->location,
            ]);

            return response()->json([
                'message' => 'Room updated successfully',
                'data' => $salle
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error updating room',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Supprimer une salle
    public function destroy($id)
    {
        try {
            $salle = Salle::findOrFail($id);
            $salle->delete();

            return response()->json([
                'message' => 'Room deleted successfully'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error deleting room',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}