<?php

use Illuminate\Support\Facades\Route;
use Modules\Consultation\Http\Controllers\ConsultationController;

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
    Route::resource('consultation', ConsultationController::class)->names('consultation');
});


Route::resource('consultations', ConsultationController::class);
Route::get('consultations/inactive', [ConsultationController::class, 'inactive'])->name('consultations.inactive');
Route::put('consultations/{id}/restore', [ConsnultationController::class, 'restore'])->name('consultations.restore');