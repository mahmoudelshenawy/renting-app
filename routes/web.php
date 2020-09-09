<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(url('admin/login'));
});

Route::get('lang/{lang}', function ($lang) {
    session()->has('lang') ? session()->forget('lang') : '';

    $lang == 'ar' ? session()->put('lang', 'ar') : session()->put('lang', 'en');

    return back();
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Config::set('auth.defines', 'admin');
    Route::get('login', 'Admin@login');

    Route::post('login', 'Admin@finishLogin')->name('login');

    Route::group(['middleware' => 'admin:admin'], function () {

        Route::resource('admins', 'Admin');
        Route::resource('apartments', 'Apartments');
        Route::resource('rentants', 'Rentants');
        Route::resource('leases', 'Leases');

        //Multi delete 
        Route::delete('leases/delete/all', 'Leases@multi_delete');
        Route::delete('rentants/delete/all', 'Rentants@multi_delete');
        Route::delete('apartments/delete/all', 'Apartments@multi_delete');
        Route::delete('admins/delete/all', 'Admin@multi_delete');
    });
});
