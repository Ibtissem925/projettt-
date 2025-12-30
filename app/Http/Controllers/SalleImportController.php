<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\SallesImport;
use Maatwebsite\Excel\Facades\Excel;
use Exception;
use Illuminate\Support\Facades\Log;

class SalleImportController extends Controller
{
    /**
     * Import des salles depuis un fichier Excel/CSV
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function import(Request $request)
    {
        // Validation du fichier
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,xls|max:10240' // Max 10MB
        ]);

        try {
            // Import du fichier Excel
            Excel::import(new SallesImport, $request->file('file'));

            // Log de succès
            Log::info('Salles imported successfully', [
                'file_name' => $request->file('file')->getClientOriginalName(),
                'file_size' => $request->file('file')->getSize(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Rooms imported successfully'
            ], 200);

        } catch (Exception $e) {
            // Log de l'erreur
            Log::error('Error importing salles', [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Import failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}