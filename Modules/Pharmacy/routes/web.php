<?php

use Illuminate\Support\Facades\Route;
use Modules\Pharmacy\Http\Controllers\PharmacyController;
use Modules\Pharmacy\Http\Controllers\DrugController;

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
//     Route::resource('pharmacy', PharmacyController::class)->names('pharmacy');
// });

// Route::get('/drugs/create', [DrugController::class, 'create'])->name('drugs.create');


// Route::get('/drugs/index', [DrugController::class, 'index'])->name('drugs.index');
// Route::post('/drugs/store', [PatientController::class, 'store'])->name('drugs.store');
// Route::post('/drugs/show', [PatientController::class, 'Show-patient'])->name('drugs.store');
Route::resource('drugs', DrugController::class);



