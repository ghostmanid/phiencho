<?php

Route::get('/','HomeController@index');
Route::get('/viec/{id}','HomeController@chitiet');
Route::get('/dangtin','HomeController@dangtin');

Route::get('dom','DomController@index');
Route::get('dom/autoxoa','DomController@autoxoa');


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');


//Jobs, Edit, Delte 

Route::get('job/{id}/edit','HomeController@edit');
Route::post('job/update','HomeController@update');
Route::get('job/{id}/destroy','HomeController@destroy');

// Registration routes...
// Route::get('auth/register', 'Auth\AuthController@getRegister');
// Route::post('auth/register', 'Auth\AuthController@postRegister');
