<?php

use App\Http\Controllers\BukuController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::group([], function() {

    Route::get('/buku', [BukuController::class, 'getData'])->name('buku.getData');
    // Route::get('/buku-table', [BukuController::class, 'table'])->name('buku.table');
    // Route::get('/buku/{id}', [BukuController::class, 'show'])->name('buku.show');
    // Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
    // Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');
    // Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
    // Route::get('/kategori-buku', [BukuController::class, 'get'])->name('buku.get');


});
