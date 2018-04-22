<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', 'DashboardController@index')->name('dashboard');
Route::get('odds','DashboardController@odds')->name('odds');
Route::get('country','DashboardController@country')->name('country');
Route::post('/games','DashboardController@other_country')->name('games');
Route::get('print_odd','DashboardController@print_odds')->name('print_odd');
Route::get('download_odds','DashboardController@download_odds')->name('download_odds');
Route::get('download_events','DashboardController@download_events')->name('download_events');
Route::get('country','DashboardController@country')->name('country');
Route::get('betslip', 'DashboardController@betSlip')->name('betslip');
//Route::get('placebet', 'DashboardController@betSlip')->name('placebet');

Route::post('/placebet','DashboardController@placebet')->name('placebet');






