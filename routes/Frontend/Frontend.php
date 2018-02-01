<?php

/**
 * Frontend Controllers
 */

Route::group(['middleware' => 'verifyTop'], function () {
    Route::get('/', 'FrontendController@index')->name('index');
    Route::get('/page/{id?}', 'FrontendController@index');
    Route::get('/search/{kw}', 'FrontendController@searchResult');
});

Route::get('/number/{id}', 'FrontendController@changeNum');
Route::get('/ads/{id?}', 'FrontendController@getAd');
Route::get('/about/{id?}', 'FrontendController@aboutView');
Route::post('/about/send/message', 'FrontendController@sendMessage');

