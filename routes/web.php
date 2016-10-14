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
*/

Route::get('/', function(){
	return view('oldindex');//view('oldindex');
});

# View all lorem paragraphs
Route::get('/lorem', function() {
	return view('lorem');
});

# View all lorem paragraphs
//Route::get('/user', function() {
//	return view('lorem');
//})