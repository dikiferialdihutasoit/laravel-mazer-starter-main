<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveyController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::post('/survey/store', [SurveyController::class, 'store'])->name('survey.store');
Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth', 'prefix' => '/'], function() {
    Route::get('dashboard', function() {
        return view('dashboard');
    })->name('dashboard');
    Route::group(['prefix' => 'component', 'as' => 'component.'], function() {
        Route::get('accordion', function() {
            return view('mazer.components.accordion');
        })->name('accordion');
        Route::get('form-blade', function() {
            return view('survey.form');
        })->name('survey.form');
    });
});

require_once __DIR__ . "/auth.php";
