<?php

Route::get('/','HomeController@index');
Route::get('/viec','HomeController@chitiet');
Route::get('/dangtin','HomeController@dangtin');

Route::get('dom','DomController@index');