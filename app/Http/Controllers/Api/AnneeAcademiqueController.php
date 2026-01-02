<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AnneeAcademique;
use App\Models\Etudiant;
use App\Models\Enseignant;
use Exception;

class AnneeAcademiqueController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Compter automatiquement
            $totalEtudiants = Etudiant::count();
            $totalEnseignants = Enseignant::count();

            $annee = AnneeAcademique::create([
                'annee' => $request->annee,
                'total_etudiants' => $totalEtudiants,
                'total_enseignants' => $totalEnseignants,
            ]);

            return response()->json([
                'message' => 'Academic year added successfully',
                'data' => $annee
            ], 201);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error adding academic year',
                'error' => $e->getMessage()
            ], 500);
        }
    }

  
}