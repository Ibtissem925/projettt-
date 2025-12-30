<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Etudiant;

class EtudiantController extends Controller
{
    public function store(Request $request)
    {
        $etudiant = Etudiant::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'date_naissance' => null,
            'niveau' => $request->niveau,
            'filiere' => $request->filiere,
            'groupe' => $request->groupe,
            'user_id' => null,
            'planning_id' => null,
        ]);
    
        return response()->json([
            'message' => 'Student added successfully',
            'data' => $etudiant
        ], 201);
    }
    public function index()
    {
        return response()->json(
            Etudiant::select(
                'id',
                'nom',
                'prenom',
                'niveau',
                'filiere',
                'groupe'
            )->orderBy('id', 'desc')->get()
        );
    }

    public function destroy($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $etudiant->delete();
    
        return response()->json([
            'message' => 'Student deleted successfully'
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $etudiant = Etudiant::findOrFail($id);

        $etudiant->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'niveau' => $request->niveau,
            'filiere' => $request->filiere,
            'groupe' => $request->groupe,
        ]);

        return response()->json([
            'message' => 'Student updated successfully',
            'data' => $etudiant
        ]);
    }
    
}
