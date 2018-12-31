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



Route::get('/','FrontendController@index');
Route::post('message','MessageController@store')->name('post_message');

Auth::routes();
Route::group(['prefix'=>'dashboard','middleware'=>'auth'], function(){
    Route::get('/','BackendController@dashboard');

    Route::group(['prefix'=>'barang'], function(){
        Route::get('/', 'BarangController@index')->name('index_barang');
        Route::post('/','BarangController@store')->name('post_barang');
        Route::post('update','BarangController@update')->name('update_barang');
        Route::get('category', 'CategoryController@index')->name('index_category');
        Route::post('category', 'CategoryController@store')->name('post_category');
        Route::post('category/update', 'CategoryController@update')->name('update_category');
        Route::get('category/{id}', 'CategoryController@destroy')->name('delete_category');
        Route::get('delete/{id}', 'BarangController@destroy')->name('delete_barang');
    });

    Route::group(['prefix'=>'laporan'], function(){
        Route::get('/', 'LaporanController@index')->name('index_laporan');
        Route::get('masuk', 'LaporanController@masuk')->name('index_laporan_masuk');
        Route::get('keluar','LaporanController@keluar')->name('index_laporan_keluar');
        Route::post('add','LaporanController@store')->name('post_laporan');
        Route::post('stok','LaporanController@change_stok')->name('change_stok_laporan');
    });

    Route::group(['prefix'=>'user'], function(){
        Route::get('/', 'UserController@index')->name('index_user');
        Route::get('add', 'UserController@add')->name('add_user');
        Route::post('add','UserController@store')->name('post_user');
        Route::post('update/cc','UserController@update')->name('update_user');
        Route::get('delete/{id}','UserController@destroy')->name('delete_user');

    });

    Route::group(['prefix'=>'message'], function(){
        Route::get('/', 'MessageController@index')->name('index_message');
        Route::get('delete/{id}','MessageController@destroy')->name('delete_message');

    });

});





Route::get('barang/{id}/barang.json', function ($id){
   return \App\Barang::where('id',$id)->get();
});

Route::get('api/delete/category/{id}','CategoryController@apiDelete');
Route::get('api/delete/barang/{id}','BarangController@apiDelete');
Route::get('api/delete/laporan/{invoice}','LaporanController@apiDelete');
Route::get('api/delete/user/{id}','UserController@apiDelete');
Route::get('dashboard/laporan/cetak/{invoice}','LaporanController@createPDF')->name('cetak_laporan');

