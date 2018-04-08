<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', 'DashboardController@index')->name('dashboard');
Route::get('odds','DashboardController@odds')->name('odds');
Route::get('country','DashboardController@country')->name('country');
Route::post('/games','DashboardController@other_country')->name('games');

