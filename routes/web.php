<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::delete('packing-lists/{batch}','PackingListController@destroyPerBatch')->name('packing-lists.destroy-per-batch');
Route::delete('packing-lists/{batch}/{factory_po}','PackingListController@destroyPerPO')->name('packing-lists.destroy-per-po');
Route::get('packing-lists/export/{batch}/{factory_po}','PackingListController@export')->name('packing-lists.export');
Route::get('packing-lists/show-batch/{batch}','PackingListController@showBatch')->name('packing-lists.show-batch');
Route::post('packing-lists/import','PackingListController@import')->name('packing-lists.import');
Route::resource('packing-lists','PackingListController');

Route::delete('styles/destroy/{style}','StyleController@destroyPerStyle')->name('styles.destroy-per-style');
Route::delete('styles/{content}','StyleController@destroyPerContent')->name('styles.destroy-per-content');
Route::get('styles/show-content/{style}','StyleController@showContent')->name('styles.show-content');
Route::post('styles/import','StyleController@import')->name('styles.import');
Route::resource('styles','StyleController');

Route::resource('carton-marks','CartonMarkController');

Route::resource('cartons','CartonController');

Auth::routes();

