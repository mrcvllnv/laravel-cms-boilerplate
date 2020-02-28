<?php

Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('users', 'UsersController@index')->name('users.index');
});
