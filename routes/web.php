<?php

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


Route::namespace('Web')->group(function () {

    Auth::routes();
    Route::namespace('Dashboard')->group(function () {
        Route::get('/', 'HomeController@index');
        Route::get('/home', 'HomeController@index')->name('home');
    });

    Route::namespace('Profile')->group(function () {
        Route::get('/profile', 'ChangeProfileController@index')->name('web.profile');
        Route::post('/profile', 'ChangeProfileController@store')->name('web.profile.update');

        Route::get('/profile/change-password', 'ChangePasswordController@index')->name('web.profile.change.password');
        Route::post('/profile/change-password', 'ChangePasswordController@store')->name('web.profile.update.password');

        Route::get('/profile/change-avatar', 'ChangeAvatarController@index')->name('web.profile.change.avatar');
        Route::post('/profile/change-avatar', 'ChangeAvatarController@store')->name('web.profile.update.avatar');
        
    });
});
