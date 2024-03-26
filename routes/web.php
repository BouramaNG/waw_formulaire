<?php

use App\Http\Controllers\FormulaireController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('formulaire');
});
Route::post('/reponse', [FormulaireController::class, 'ReponseFormulaire'])->name('reponse.store');

