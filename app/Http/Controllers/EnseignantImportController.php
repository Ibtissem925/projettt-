<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\EnseignantsImport;
use Maatwebsite\Excel\Facades\Excel;
use Exception;

class EnseignantImportController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,xls|max:10240'
        ]);

        try {
            Excel::import(new EnseignantsImport, $request->file('file'));

            return response()->json([
                'success' => true,
                'message' => 'Teachers imported successfully'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Import failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}