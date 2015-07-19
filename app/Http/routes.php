<?php

Route::get('/','HomeController@index');
Route::get('/viec/{id}','HomeController@chitiet');
Route::get('/dangtin','HomeController@dangtin');

Route::get('dom','DomController@index');


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');


//Jobs, Edit, Delte 

Route::get('job/{id}/edit','HomeController@edit');
Route::get('job/{id}/destroy','HomeController@destroy');

// Registration routes...
// Route::get('auth/register', 'Auth\AuthController@getRegister');
// Route::post('auth/register', 'Auth\AuthController@postRegister');