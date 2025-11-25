<?php

use App\Http\Controllers\Admin\RiwayatController;
use App\Http\Controllers\FormulirController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::get('/formulir', [FormulirController::class, 'index'])->name('formulir.index');
Route::post('/formulir', [FormulirController::class, 'store'])->name('formulir.store');

Route::get('/history', [RiwayatController::class, 'indexUser'])->name('history.index');
Route::get('/history/${id}', [RiwayatController::class, 'showUser'])->name('history.show');

Auth::routes();
