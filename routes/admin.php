<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PegawaiController;
use App\Http\Controllers\Admin\CutiController;
use App\Http\Controllers\Admin\RiwayatController;

Route::middleware(['auth'])->group(function () {
    Route::redirect('/', '/admin/pegawai');
    Route::resource('pegawai', PegawaiController::class);
    Route::resource('cuti', CutiController::class);
    Route::resource('riwayat', RiwayatController::class);
    Route::post('/riwayat/{id}/approve', [RiwayatController::class, 'approve'])->name('riwayat.approve');
    Route::post('/riwayat/{id}/reject', [RiwayatController::class, 'reject'])->name('riwayat.reject');
});
