<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\DashboardController; // <-- PENYESUAIAN 1

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function() {
    
    // PENYESUAIAN 2: Arahkan rute dashboard ke controller
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Rute untuk fitur survei 
    Route::get('survey/form', [SurveyController::class, 'index'])->name('survey.form');
    Route::get('survey/results', [SurveyController::class, 'showResults'])->name('survey.results');
    Route::post('survey/category/store', [SurveyController::class, 'storeCategory'])->name('survey.store.category');
    
    // Rute API untuk data grafik
    Route::get('api/chart-data', [DashboardController::class, 'getChartData'])->name('chart.data');

    // Grup untuk rute komponen contoh dari template
    Route::group(['prefix' => 'component', 'as' => 'component.'], function() {
        Route::get('accordion', function() {
            return view('mazer.components.accordion');
        })->name('accordion');
    });
});


require_once __DIR__ . "/auth.php";