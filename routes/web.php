<?php
/* بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيم */

Route::get('/', function () {
    return view('auth.login');
});

Route::get('logout', function () {
    Auth::logout();
    return redirect('/');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//admin
Route::get('/admin/{page}', 'DashboardController@index');
//route web
Route::resource('/page/reseller', 'ResellerController');
Route::resource('/page/supplier', 'SupplierController');
Route::resource('/page/barang', 'BarangController');
Route::resource('/page/kategori', 'KategoriController');

Route::put('/page/barang/tambah/{id}', ['as' => 'barang.stock', 'uses' => 'BarangController@stock']);
Route::delete('/page/delete/order/{id}', ['as' => 'order.delete', 'uses' => 'BarangController@delete']);
Route::put('/page/update/user/{id}', ['as' => 'user.edit','uses' => 'ResellerController@change']);

Route::resource('/page/order', 'OrderResellerController');


//reseller
Route::get('/reseller/{page}', "ResellerDashboard@index");
Route::post('/page/order/reseller', ['as' => 'reseller.order','uses' => 'OrderResellerController@order']);
Route::put('/page/update/harga/{id}', ['as' => 'update.harga', 'uses' => 'OrderResellerController@updateHarga']);
Route::resource('/page/penjualan', 'PenjualanController');

