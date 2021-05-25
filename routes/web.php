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

    
});

// User profile routes
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::get('profile/avatar', ['as' => 'user_avatar.select', 'uses' => 'App\Http\Controllers\ProfileController@chooseAvatar']);
    Route::post('profile/avatar', ['as' => 'user_avatar.update', 'uses' => 'App\Http\Controllers\ProfileController@setAvatar']);
    Route::delete('profile/avatar', ['as' => 'user_avatar.remove', 'uses' => 'App\Http\Controllers\ProfileController@deleteAvatar']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

    // Contact Management pages routes
    Route::resource('/contact', 'App\Http\Controllers\ContactController');
    Route::get('/contact/{contact}/extra', ['as' => 'extra.edit', 'uses' => 'App\Http\Controllers\ContactController@editExtra']);
	Route::put('contact/{contact}/extra', ['as' => 'extra.update', 'uses' => 'App\Http\Controllers\ContactController@updateExtra']);
    Route::get('/contact/{contact}/avatar', ['as' => 'avatar.select', 'uses' => 'App\Http\Controllers\ContactController@chooseAvatar']);
    Route::post('/contact/{contact}/avatar', ['as' => 'avatar.update', 'uses' => 'App\Http\Controllers\ContactController@setAvatar']);
    Route::delete('/contact/{contact}/avatar', ['as' => 'avatar.remove', 'uses' => 'App\Http\Controllers\ContactController@deleteAvatar']);
    Route::resource('/contact/{contact}/reminder', 'App\Http\Controllers\ReminderController')->except(['index', 'show']);
    Route::resource('/contact/{contact}/activity', 'App\Http\Controllers\ActivityController')->except(['index', 'show']);
    Route::resource('/contact/{contact}/gift', 'App\Http\Controllers\GiftController')->except(['index', 'show']);
    // Route::delete('/contact/{contact}/avatar', ['as' => 'gift_photo.remove', 'uses' => 'App\Http\Controllers\GiftController@deletePhoto']);
    Route::resource('/contact/{contact}/debt', 'App\Http\Controllers\DebtController')->except(['index', 'show']);
    Route::resource('/contact/{contact}/life-event', 'App\Http\Controllers\LifeEventController');
    Route::resource('/timeline', 'App\Http\Controllers\TimelineController');