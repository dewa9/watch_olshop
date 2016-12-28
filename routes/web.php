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

Route::get('/', function () {
    return view('MasterSiswa.add_siswa');
});
Route::get('/register','RegisterOnlineController@add');
Route::post('/pos_tregister','RegisterOnlineController@store');

Route::post('/siswa/postdatasiswa','MasterSiswaController@store');

Route::get('/merk/addmerk','MerkController@add');
Route::post('/merk/storemerk','MerkController@store');
Route::get('/merk/getDataMerk','MerkController@show');
Route::post('/merk/delete','MerkController@delete');
Route::get("/merek/populate_select",'MerkController@populateSelect');
//product
Route::get('/product/addproduct','ProductController@add');
Route::post('/product/storeproduct','ProductController@store');
Route::post('/product/update','ProductController@update');
Route::get('/product/detail/{id}','ProductController@detail');
Route::get('/product/showproduct','ProductController@show');
Route::post('/product/storeimage','ProductController@storeImage');
Route::get('/product/getDataProduct','ProductController@getDataProduct');
Route::get('/product/delete/{id}','ProductController@delete');

//spesification

Route::post('/spesification/storespesification','SpesificationController@store');
Route::post('/spesification/update','SpesificationController@update');

