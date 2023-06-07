<?php

use App\Http\Controllers\EtudiantController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('acceuil');

Route::get('/etudiant',[EtudiantController::class, "index"])->name('etudiant');
Route::get('/etudiant/create',[EtudiantController::class, "create"])->name('etudiant.create');

Route::get('/etudiant/{etudiant}',[EtudiantController::class, "edit"])->name('etudiant.edit');

Route::post('/etudiant/ajouter',[EtudiantController::class, "ajouter"])->name('etudiant.ajouter');
Route::delete('/etudiant/{etudiant}',[EtudiantController::class, "delete"])->name('etudiant.supprimer');
Route::put('/etudiant/{etudiant}', [EtudiantController::class, "update"])->name('etudiant.update');

