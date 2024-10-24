<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::post('packing-lists/import','PackingListController@import')->name('packing-lists.import');
Route::resource('packing-lists','PackingListController');

Route::post('styles/import','StyleController@import')->name('styles.import');
Route::resource('styles','StyleController');

Auth::routes();

