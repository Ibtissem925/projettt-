<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\EtudiantsImport;
use Maatwebsite\Excel\Facades\Excel;
use Exception;
use Illuminate\Support\Facades\Log;

class EtudiantImportController extends Controller
{
    /**
     * Import des étudiants depuis un fichier Excel/CSV
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,xls|max:10240' // Max 10MB
        ]);

        try {
            Excel::import(new EtudiantsImport, $request->file('file'));

            Log::info('Etudiants imported successfully', [
                'file_name' => $request->file('file')->getClientOriginalName(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Students imported successfully'
            ], 200);

        } catch (Exception $e) {
            Log::error('Error importing etudiants', [
                'error' => $e->getMessage(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Import failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}