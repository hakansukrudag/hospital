<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('pages.main');
});

Route::get('/contact', function () {
    return view('pages.contact');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/admin', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/user/store', [App\Http\Controllers\UserController::class, 'store'])->name('storeUserData');
Route::post('/user/delete', [App\Http\Controllers\UserController::class, 'delete'])->name('userDelete');
Route::get('/user/show', [App\Http\Controllers\UserController::class, 'show'])->name('showUserData');
Route::post('/user/edit-changes', [App\Http\Controllers\UserController::class, 'storeChanges'])->name('storeChanges');
Route::post('/appointment/delete', [App\Http\Controllers\HomeController::class, 'appointmentDelete'])->name('appointmentDelete');
Route::post('/appointment/add', [App\Http\Controllers\HomeController::class, 'appointmentAdd'])->name('appointmentAdd');
Route::get('/appointment/show', [App\Http\Controllers\HomeController::class, 'appointmentShow'])->name('appointmentShow');
Route::post('/appointment/store', [App\Http\Controllers\HomeController::class, 'storeAppointmentChanges'])->name('storeAppointmentChanges');

Route::post('/consultant/delete', [App\Http\Controllers\HomeController::class, 'consultantDelete'])->name('consultantDelete');
Route::post('/consultant/add', [App\Http\Controllers\HomeController::class, 'consultantAdd'])->name('consultantAdd');
Route::get('/consultant/show', [App\Http\Controllers\HomeController::class, 'consultantShow'])->name('consultantShow');
Route::post('/consultant/store', [App\Http\Controllers\HomeController::class, 'storeConsultantChanges'])->name('storeConsultantChanges');

Route::post('/medicine/delete', [App\Http\Controllers\HomeController::class, 'medicineDelete'])->name('medicineDelete');
Route::post('/medicine/add', [App\Http\Controllers\HomeController::class, 'medicineAdd'])->name('medicineAdd');
Route::get('/medicine/show', [App\Http\Controllers\HomeController::class, 'medicineShow'])->name('medicineShow');
Route::post('/medicine/store', [App\Http\Controllers\HomeController::class, 'storeMedicineChanges'])->name('storeMedicineChanges');
