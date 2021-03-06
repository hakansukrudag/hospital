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
    return view('admin_dashboard');
});

Route::get('/game/game1', function () {
    return view('pages.game1');
})->name('game1');

Route::get('/game/game2', function () {
    return view('pages.game2');
})->name('game2');

Route::get('/game/game3', function () {
    return view('pages.game3');
})->name('game3');

Auth::routes();

/**
 * User Dashboard
 */
Route::get('/user/dashboard/profile', [App\Http\Controllers\UserController::class, 'showUserProfile'])->name('showUserProfile');
Route::post('/user/dashboard/profile', [App\Http\Controllers\UserController::class, 'storeUserProfile'])->name('storeUserProfile');

/**
 *  User Department
 */
Route::get('/user/dashboard/contact-details', [App\Http\Controllers\UserController::class, 'showContactDetails'])->name('showContactDetails');
Route::post('/user/dashboard/contact-details', [App\Http\Controllers\UserController::class, 'storeContactDetails'])->name('storeContactDetails');

/**
 *  User Procedure
 */
Route::get('/user/dashboard/contact-details', [App\Http\Controllers\UserController::class, 'showContactDetails'])->name('showContactDetails');
Route::post('/user/dashboard/contact-details', [App\Http\Controllers\UserController::class, 'storeContactDetails'])->name('storeContactDetails');


/********************************************
 * AJAX Routes
 */
Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('adminDashboard');
Route::get('/user/dashboard', [App\Http\Controllers\UserController::class, 'index'])->name('userDashboard');

Route::post('/user/store', [App\Http\Controllers\AdminController::class, 'store'])->name('storeUserData');
Route::post('/user/delete', [App\Http\Controllers\AdminController::class, 'delete'])->name('userDelete');
Route::get('/user/show', [App\Http\Controllers\AdminController::class, 'show'])->name('showUserData');
Route::post('/user/edit-changes', [App\Http\Controllers\AdminController::class, 'storeChanges'])->name('storeChanges');
Route::post('/appointment/delete', [App\Http\Controllers\AdminController::class, 'appointmentDelete'])->name('appointmentDelete');
Route::post('/appointment/add', [App\Http\Controllers\AdminController::class, 'appointmentAdd'])->name('appointmentAdd');
Route::get('/appointment/show', [App\Http\Controllers\AdminController::class, 'appointmentShow'])->name('appointmentShow');
Route::post('/appointment/store', [App\Http\Controllers\AdminController::class, 'storeAppointmentChanges'])->name('storeAppointmentChanges');

Route::post('/consultant/delete', [App\Http\Controllers\AdminController::class, 'consultantDelete'])->name('consultantDelete');
Route::post('/consultant/add', [App\Http\Controllers\AdminController::class, 'consultantAdd'])->name('consultantAdd');
Route::get('/consultant/show', [App\Http\Controllers\AdminController::class, 'consultantShow'])->name('consultantShow');
Route::post('/consultant/store', [App\Http\Controllers\AdminController::class, 'storeConsultantChanges'])->name('storeConsultantChanges');

Route::post('/department/delete', [App\Http\Controllers\AdminController::class, 'departmentDelete'])->name('departmentDelete');
Route::post('/department/add', [App\Http\Controllers\AdminController::class, 'departmentAdd'])->name('departmentAdd');
Route::get('/department/show', [App\Http\Controllers\AdminController::class, 'departmentShow'])->name('departmentShow');
Route::post('/department/store', [App\Http\Controllers\AdminController::class, 'storeDepartmentChanges'])->name('storeDepartmentChanges');

Route::post('/medicine/delete', [App\Http\Controllers\AdminController::class, 'medicineDelete'])->name('medicineDelete');
Route::post('/medicine/add', [App\Http\Controllers\AdminController::class, 'medicineAdd'])->name('medicineAdd');
Route::get('/medicine/show', [App\Http\Controllers\AdminController::class, 'medicineShow'])->name('medicineShow');
Route::post('/medicine/store', [App\Http\Controllers\AdminController::class, 'storeMedicineChanges'])->name('storeMedicineChanges');

Route::post('/procedure/delete', [App\Http\Controllers\AdminController::class, 'procedureDelete'])->name('procedureDelete');
Route::post('/procedure/add', [App\Http\Controllers\AdminController::class, 'procedureAdd'])->name('procedureAdd');
Route::get('/procedure/show', [App\Http\Controllers\AdminController::class, 'procedureShow'])->name('procedureShow');
Route::post('/procedure/store', [App\Http\Controllers\AdminController::class, 'storeProcedureChanges'])->name('storeProcedureChanges');
/****************************************************/
