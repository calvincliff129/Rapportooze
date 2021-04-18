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

Auth::routes();

// dashboard
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    // Administration pages routes
    Route::prefix('manage')->middleware('role:administrator')->group(function () {
        Route::get('/', 'App\Http\Controllers\ManageController@index');
        Route::get('/admin', 'App\Http\Controllers\ManageController@dashboard')->name('manage.dashboard');
        Route::resource('/users', 'App\Http\Controllers\UserController');
        Route::resource('/permissions', 'App\Http\Controllers\PermissionController', ['except' => 'destroy']);
        Route::resource('/roles', 'App\Http\Controllers\RoleController', ['except' => 'destroy']);
    });

    // User profile routes
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

    // Contact Management pages routes
    Route::resource('/contact', 'App\Http\Controllers\ContactController');
    Route::resource('/reminder', 'App\Http\Controllers\ReminderController');
    Route::resource('/activity', 'App\Http\Controllers\ActivityController');
    Route::resource('/gift', 'App\Http\Controllers\GiftController');
    Route::resource('/debt', 'App\Http\Controllers\DebtController');
    Route::resource('/life-event', 'App\Http\Controllers\LifeEventController');
    Route::resource('/timeline', 'App\Http\Controllers\TimelineController');
});

