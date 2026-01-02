<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enseignant;

class EnseignantController extends Controller
{
    // Lister tous les enseignants
    public function index()
    {
        
        return response()->json(
            Enseignant::select(
                'id',
                'nom',
                'prenom',
                'email',
                'filiere'
            )->orderBy('id', 'desc')->get()
        );
    }

    // Créer un enseignant
    public function store(Request $request)
    {
        $enseignant = Enseignant::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => bcrypt($request->password ?? 'password123'),
            'filiere' => $request->filiere ?? '',
            'planning_id' => null,
        ]);

        return response()->json([
            'message' => 'Teacher added successfully',
            'data' => $enseignant
        ], 201);
    }

    // Modifier un enseignant
    public function update(Request $request, $id)
    {
        $enseignant = Enseignant::findOrFail($id);

        $enseignant->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'filiere' => $request->filiere,
        ]);

        return response()->json([
            'message' => 'Teacher updated successfully',
            'data' => $enseignant
        ]);
    }

    // Supprimer un enseignant
    public function destroy($id)
    {
        $enseignant = Enseignant::findOrFail($id);
        $enseignant->delete();

        return response()->json([
            'message' => 'Teacher deleted successfully'
        ]);
    }
}