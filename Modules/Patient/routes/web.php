<?php

use Illuminate\Support\Facades\Route;
use Modules\Patient\Http\Controllers\PatientController;

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

// Route::group([], function () {
//     Route::resource('patient', PatientController::class)->names('patient');
// });

// Route::get('/patients', [PatientController::class, 'Create-patient'])->name('patients.create');
// Route::get('/patients/index', [PatientController::class, 'index'])->name('patients.index');
// Route::post('/patients/store', [PatientController::class, 'store'])->name('patients.store');
// Route::post('/patients/show', [PatientController::class, 'Show-patient'])->name('patients.store');






Route::resource('patients', PatientController::class);

Route::get('patient/inactive', [PatientController::class, 'inactive'])->name('patients.inactive');
Route::get('/patient/{id}', [PatientController::class, 'showInactive'])->name('patients.show');
Route::get('/patient/{id}', [PatientController::class, 'showInactive'])->name('inactivePatients.show');
Route::put('patient/{id}/restore', [PatientController::class, 'restore'])->name('patients.restore');







