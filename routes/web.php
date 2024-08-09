<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'DashboardController@index')->name('dashboard');
Route::get('absen', 'UserDataController@index')->name('absen');
Route::get('sinkronisasi', 'UserDataController@sinkronisasi')->name('sinkronisasi');
Route::get('masteruser', 'MasteruserController@index')->name('masteruser_index');
Route::get('sinkron_user', 'MasteruserController@sinkronisasi')->name('sinkron_user');
Route::get('masterabsen', 'MasterabsenController@index')->name('indexs');
Route::get('cetak_pdf', 'MasterabsenController@exportPDF')->name('cetak_pdf');
Route::get('excel', 'MasterabsenController@exportEXCEL')->name('excel');
Route::get('filterma', 'MasterabsenController@Filter')->name('filter_masterabsen');
// Route::get('sms_send', 'MasterabsenController@sms_send')->name('sms_send');
Route::get('{id}/kirim', 'MasterabsenController@kirim')->name('pesan_kirim_activ');
Route::get('{id}/batal_kirim', 'MasterabsenController@batal_kirim')->name('pesan_kirim_batal');



Route::group(['prefix' => 'fingerprint'], function() {
  Route::get('/', 'FPController@index')->name('fingerprint_index');
  Route::get('create', 'FPController@create')->name('fingerprint_create');
  Route::post('create', 'FPController@store')->name('fingerprint_store');
  Route::get('{id}/edit', 'FPController@edit')->name('fingerprint_edit');
  Route::post('update', 'FPController@update')->name('fingerprint_update');
  Route::get('{id}/delete', 'FPController@delete')->name('fingerprint_delete');
  Route::get('{id}/check-connection', 'FPController@check_connection')->name('fingerprint_check_connection');
  Route::get('{id}/active', 'FPController@active')->name('fingerprint_active');
  Route::get('{id}/deactive', 'FPController@deactive')->name('fingerprint_deactive');
});

// Route::group(['prefix' => 'pengguna'], function() {
//   Route::get('/', 'PenggunaController@index')->name('pengguna_index');
//   Route::get('create', 'PenggunaController@create')->name('pengguna_create');
//   Route::post('create', 'PenggunaController@store')->name('pengguna_store');
//   Route::get('{id}/edit', 'PenggunaController@edit')->name('pengguna_edit');
//   Route::post('update', 'PenggunaController@update')->name('pengguna_update');
//   Route::get('{id}/delete', 'PenggunaController@delete')->name('pengguna_delete');
// });

Route::group(['prefix' => 'masteruser'], function() {
  Route::get('{id}/edit', 'MasteruserController@edit')->name('masteruser_edit');
  Route::post('update', 'MasteruserController@update')->name('masteruser_update');
  Route::get('{id}/delete', 'MasteruserController@delete')->name('masteruser_delete');
  Route::get('filtermu', 'MasteruserController@Filter')->name('filter_masteruser');

});


