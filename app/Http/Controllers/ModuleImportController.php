<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ModulesImport;
use Maatwebsite\Excel\Facades\Excel;

class ModuleImportController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,xls'
        ]);

        try {
            Excel::import(new ModulesImport, $request->file('file'));

            return response()->json([
                "message" => "Modules imported successfully"
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                "message" => "Import failed",
                "error" => $e->getMessage()
            ], 500);
        }
    }
}