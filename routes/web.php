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

Route::get('/','HomeController@index')->name('home');
Route::get('/{slug}','HomeController@view')->name('view');


Route::get('gioi-thieu', function () {
    return view('about');
})->name('about');

Route::group(['prefix' => 'admin','namespace'=>'Admin','middleware'=>'auth'],function () {

        Route::get('/','AdminController@index')->name('admin');
        Route::get('/logout','AdminController@logout')->name('logout');

        include 'admin.php';



    }
);
Route::get('admin/login','Admin\AdminController@login')->name('login');
Route::post('admin/login','Admin\AdminController@post_login')->name('login');


Route::group(['prefix' => 'cart'], function () {
    Route::get('view','CartController@view')->name('cart.view');
    Route::get('add/{id}','CartController@add')->name('cart.add');
    Route::get('remove/{id}','CartController@remove')->name('cart.remove');
    Route::get('update/{id}','CartController@update')->name('cart.update');
    Route::get('clear','CartController@clear')->name('cart.clear');

});


