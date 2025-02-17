<?php

use Illuminate\Support\Facades\Route;
use Modules\Diagnosis\Http\Controllers\DiagnosisController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([], function () {
    Route::resource('diagnosis', DiagnosisController::class)->names('diagnosis');
});



Route::resource('diagnoses', DiagnosisController::class);
Route::get('diag/inactive', [DiagnosisController::class, 'inactive'])->name('diagnosis.inactive');
Route::put('diag/{id}/restore', [DiagnosisController::class, 'restore'])->name('diagnosis.restore');


