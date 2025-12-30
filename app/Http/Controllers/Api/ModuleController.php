<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Module;
use Exception;
use Illuminate\Support\Facades\Log;

class ModuleController extends Controller
{
    public function index()
    {
        try {
            $modules = Module::select(
                'id',
                'name',
                'code',
                'specialite',
                'groupe',
                'enseignant_id'
            )->orderBy('id', 'desc')->get();

            return response()->json($modules);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error fetching modules',
                'error' => $e->getMessage()
            ], 500);
        }
    }

        public function store(Request $request)
        {
            try {
                // Log les données reçues
                Log::info('Received data:', $request->all());
    
                $module = Module::create([
                    'name' => $request->name,
                    'code' => $request->code,
                    'specialite' => $request->specialite,
                    'groupe' => $request->groupe ?? null,
                    'enseignant_id' => $request->enseignant_id ?? null,
                ]);
    
                return response()->json([
                    'message' => 'Module added successfully',
                    'data' => $module
                ], 201);
    
            } catch (Exception $e) {
                // Log l'erreur complète
                Log::error('Error in store:', [
                    'message' => $e->getMessage(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                    'trace' => $e->getTraceAsString()
                ]);
    
                return response()->json([
                    'message' => 'Error adding module',
                    'error' => $e->getMessage(),
                    'line' => $e->getLine(),
                    'file' => $e->getFile()
                ], 500);
            }
        }
    
        // ... autres méthodes
    

    public function update(Request $request, $id)
    {
        try {
            $module = Module::findOrFail($id);

            $module->update([
                'name' => $request->name,
                'code' => $request->code,
                'specialite' => $request->specialite,
                'groupe' => $request->groupe ?? null,
                'enseignant_id' => $request->enseignant_id ?? null,
            ]);

            return response()->json([
                'message' => 'Module updated successfully',
                'data' => $module
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error updating module',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $module = Module::findOrFail($id);
            $module->delete();

            return response()->json([
                'message' => 'Module deleted successfully'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error deleting module',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}