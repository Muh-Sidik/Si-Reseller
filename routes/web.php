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

Route::get('/page/{page}', 'DashboardController@index');
