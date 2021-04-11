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
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::post('/user/store', [App\Http\Controllers\UserController::class, 'store'])->name('storeUserData');
Route::post('/user/delete', [App\Http\Controllers\UserController::class, 'delete'])->name('userDelete');
Route::get('/user/show', [App\Http\Controllers\UserController::class, 'show'])->name('showUserData');
Route::post('/user/edit-changes', [App\Http\Controllers\UserController::class, 'storeChanges'])->name('storeChanges');
