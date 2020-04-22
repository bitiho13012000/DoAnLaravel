<?php

    Route::group(['prefix' => 'category'],function(){

    Route::get('/', 'CategoryController@index')->name('cate');

    Route::get('del/{id}', 'CategoryController@delete')->name('cate_del');

    Route::get('edit/{id}', 'CategoryController@edit')->name('cate_edit');

    Route::post('edit/{id}', 'CategoryController@post_edit')->name('cate_edit');


    Route::get('add', 'CategoryController@add')->name('cate_add');

    Route::post('add', 'CategoryController@post_add')->name('cate_add');
});
?>
