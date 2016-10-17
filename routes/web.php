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
Route::post('/books', 'BookController@store')->name('books.store');
*/
Route::get('/', 'TextController@one');
//Route::get('/', function(){
//	return view('oldindex');
//});

# View all lorem paragraphs
Route::post('/lorem', 'TextController@lorem');
//() {
//	return view('lorem');
//});
//
# View all lorem paragraphs
Route::post('/users', 'TextController@users');
//	return view('lorem');
//})