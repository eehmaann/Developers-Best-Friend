<?php

Route::get('/', 'TextController@one');
Route::post('/lorem', 'LoremController@lorem');
Route::post('/users', 'UserController@users');