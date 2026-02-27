<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CatatanController;
use App\Http\Controllers\KontakController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/catatan/arsip', [CatatanController::class, 'arsip'])->name('catatan.arsip');
    Route::get('/catatan/export', [CatatanController::class, 'export']);
    Route::get('/catatan/import', [CatatanController::class, 'importForm']);
    Route::post('/catatan/import', [CatatanController::class, 'import']);

    Route::resource('catatan', CatatanController::class);

    Route::post('/catatan/{id}/archive', [CatatanController::class, 'archive']);
    Route::post('/catatan/{id}/unarchive', [CatatanController::class, 'unarchive']);


    Route::resource('kontak', KontakController::class);

});



require __DIR__.'/auth.php';
