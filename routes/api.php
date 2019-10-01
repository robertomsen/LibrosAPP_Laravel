<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getAllBooks', 'apiController@getAllBooks')->name('getAllBooks');

Route::get('/getBookById/{id}', 'apiController@getBookById')->name('getBookById');

Route::post('/insertBook', 'apiController@insertBook')->name('insertBook');

Route::put('/editBook/{id}', 'apiController@editBook')->name('editBook');

Route::delete('/deleteBook/{id}', 'apiController@deleteBook')->name('deleteBook');

Route::post('/getBooksByGenre', 'apiController@getBooksByGenre')->name('getBooksByGenre');

Route::post('/getBookByISBN', 'apiController@getBookByISBN')->name('getBookByISBN');

Route::post('/getBookByName', 'apiController@getBookByName')->name('getBookByName');

Route::post('/getBookByNameAndGenre', 'apiController@getBookByNameAndGenre')->name('getBookByNameAndGenre');