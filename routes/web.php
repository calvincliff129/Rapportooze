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

// dashboard
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// contact
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');

// reminder
Route::get('/reminder', [App\Http\Controllers\ReminderController::class, 'index'])->name('reminder');

// activity
Route::get('/activity', [App\Http\Controllers\ActivityController::class, 'index'])->name('activity');

// gift
Route::get('/gift', [App\Http\Controllers\GiftController::class, 'index'])->name('gift');

// debt
Route::get('/debt', [App\Http\Controllers\DebtController::class, 'index'])->name('debt');

// life event
Route::get('/life-event', [App\Http\Controllers\LifeEventController::class, 'index'])->name('life-event');

// timeline
Route::get('/timeline', [App\Http\Controllers\TimelineController::class, 'index'])->name('timeline');