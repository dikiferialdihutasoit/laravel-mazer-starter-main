<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('dashboard', function() {
        return view('dashboard');
    })->name('dashboard');

    // --- RUTE UNTUK FITUR SURVEI ---
    // Rute untuk menampilkan halaman form
    Route::get('survey/form', [SurveyController::class, 'index'])->name('survey.form');
    // Rute untuk menyimpan data per kategori
    Route::post('survey/category/store', [SurveyController::class, 'storeCategory'])->name('survey.store.category');
    
    // >> LETAKKAN RUTE BARU ANDA DI SINI <<
    // Rute untuk menampilkan halaman hasil survei
    Route::get('survey/results', [SurveyController::class, 'showResults'])->name('survey.results');
    

    // Grup untuk rute komponen contoh dari template
    Route::group(['prefix' => 'component', 'as' => 'component.'], function() {
        Route::get('accordion', function() {
            return view('mazer.components.accordion');
        })->name('accordion');
    });
});

require_once __DIR__ . "/auth.php";