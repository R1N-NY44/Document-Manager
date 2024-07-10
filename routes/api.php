<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\KatBukuController;
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

    Route::prefix('kategori-buku')->controller(KatBukuController::class)->name('katbuku.')->group(function() {
        Route::get('/', 'create')->name('getData'); //get all data
        Route::get('{id}', 'show')->name('show'); //get data by category id
        //Route::post('store', 'store')->name('store'); //post data (create data)
        //Route::put('update/{id}', 'update')->name('update'); //update data
        //Route::delete('delete/{id}', 'destroy')->name('destroy'); //delete data
    });

    // sama aja :)
    // Route::get('katalog-buku', [KatBukuController::class, 'create'])->name('buku.list'); //get all data category
    // Route::get('katalog-buku/{id}', [BukuController::class, 'show'])->name('buku.show'); //get data by category id


    Route::prefix('buku')->controller(BukuController::class)->name('buku.')->group(function() {
        Route::get('/', 'create')->name('getData'); //get all data
        Route::get('{id}', 'show')->name('show'); //get data by category id
        Route::post('store', 'store')->name('store'); //post data (create data)
        Route::put('update/{id}', 'update')->name('update'); //update data
        Route::delete('delete/{id}', 'destroy')->name('destroy'); //delete data
    });

    // sama aja :)
    // Route::get('buku', [BukuController::class, 'create'])->name('buku.getData'); //get all data
    // Route::get('buku/{id}', [BukuController::class, 'show'])->name('buku.show'); //get data by category id
    // Route::post('buku/store', [BukuController::class, 'store'])->name('buku.store'); //post data (create data)
    // Route::put('buku/update/{id}', [BukuController::class, 'update'])->name('buku.update'); //update data
    // Route::delete('buku/delete/{id}', [BukuController::class, 'destroy'])->name('buku.destroy'); //delete data

});
