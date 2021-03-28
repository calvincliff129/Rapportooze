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

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::prefix('manage')->middleware('role:administrator')->group(function () {
    Route::get('/', 'App\Http\Controllers\ManageController@index');
    Route::get('/dashboard', 'App\Http\Controllers\ManageController@dashboard')->name('manage.dashboard');
});

// Route::get('dashboard', 'App\Http\Controllers\UserController@dashboard')->middleware('auth');

// Dashboard
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Contact
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
