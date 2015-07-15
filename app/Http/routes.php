<?php

Route::get('/','HomeController@index');
Route::get('/viec/{id}','HomeController@chitiet');
Route::get('/dangtin','HomeController@dangtin');

Route::get('dom','DomController@index');