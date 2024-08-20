<?php

use Illuminate\Support\Facades\Route;
use Modules\Lab\Http\Controllers\LabController;
use Modules\Lab\Http\Controllers\LabTestController;

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
    Route::resource('lab', LabController::class)->names('lab');
});


Route::resource('labTests', LabTestController::class);
Route::get('labTest/inactive', [LabTestController::class, 'inactive'])->name('labTests.inactive');
Route::put('labTest/{id}/restore', [LabTestController::class, 'restore'])->name('labTests.restore');


