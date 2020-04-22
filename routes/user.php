<?php

    Route::group(['prefix' => 'user'],function(){

    Route::get('/', 'UserController@index')->name('user');

    Route::get('del/{id}', 'UserController@delete')->name('user_del');

    Route::get('edit/{id}', 'UserController@edit')->name('user_edit');

    Route::post('edit/{id}', 'UserController@post_edit')->name('user_edit');


    Route::get('add', 'UserController@add')->name('user_add');

    Route::post('add', 'UserController@post_add')->name('user_add');
});
?>
