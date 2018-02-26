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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'Main@index')->name('index');
Route::get('/product','Main@product')->name('product');
Route::get('/product/add','Main@add_product')->name('add_product');
Route::post('/product/save','Main@saveProduct')->name('save');
Route::get('/product/delete/{id}','Main@deleteProduct')->name('delete');
Route::get('/product/edit/{id}','Main@editProduct')->name('edit');
Route::post('/product/edit/save','Main@saveEdit')->name('saveEdit');
Route::get('/data-expired','Main@data_expired')->name('data_expired');
Route::get('/data-expired/add','Main@add_data_expired')->name('add_data_expired');
Route::get('/data-expired/delete/{id}','Main@deleteDataExpired')->name('deleteDataExpired');
Route::get('/data-expired/{edit}/{id}','Main@editDataExpired')->name('editDataExpired');
Route::post('/data-expired/edit/save','Main@saveEditExpired')->name('saveEditExpired');
Route::get('/data-expired/{view}/{id}','Main@editDataExpired')->name('editDataExpired');
Route::post('data-expired/saveAddExpired','Main@saveAddExpired')->name('saveAddExpired');
Route::get('/search/autocomplete','Main@autocomplete')->name('autocomplete');
Route::post('/take_foto','Main@take_foto')->name('take_foto');
Route::post('/set_session','Main@set_redis')->name('set_session');
Route::get('/get_session','Main@get_redis')->name('get_session');
Route::get('/notif','Main@notif')->name('notif');
