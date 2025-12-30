<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ModuleController;
use App\Http\Controllers\Api\EtudiantController;
use App\Http\Controllers\Api\EnseignantController;
use App\Http\Controllers\ModuleImportController;
use App\Http\Controllers\SalleImportController;
use App\Http\Controllers\Api\SalleController;
use App\Http\Controllers\EtudiantImportController;


// Import Excel
Route::post('/import/etudiants', [EtudiantImportController::class, 'import']);
Route::post('/import/modules', [ModuleImportController::class, 'import']);
Route::post('/import/salles', [SalleImportController::class, 'import']);

// CRUD Étudiants
Route::get('/etudiants', [EtudiantController::class, 'index']);
Route::post('/etudiants', [EtudiantController::class, 'store']);
Route::put('/etudiants/{id}', [EtudiantController::class, 'update']);
Route::delete('/etudiants/{id}', [EtudiantController::class, 'destroy']);

// CRUD Enseignants
Route::get('/enseignants', [EnseignantController::class, 'index']);
Route::post('/enseignants', [EnseignantController::class, 'store']);
Route::put('/enseignants/{id}', [EnseignantController::class, 'update']);
Route::delete('/enseignants/{id}', [EnseignantController::class, 'destroy']);

// CRUD Modules
Route::get('/modules', [ModuleController::class, 'index']);
Route::post('/modules', [ModuleController::class, 'store']);
Route::put('/modules/{id}', [ModuleController::class, 'update']);
Route::delete('/modules/{id}', [ModuleController::class, 'destroy']);

Route::get('/salles', [SalleController::class, 'index']);
Route::post('/salles', [SalleController::class, 'store']);
Route::put('/salles/{id}', [SalleController::class, 'update']);
Route::delete('/salles/{id}', [SalleController::class, 'destroy']);