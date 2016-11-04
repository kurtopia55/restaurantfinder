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

Route::get('/', 'LocationsController@viewMap');

Route::get('/search/locations', 'LocationsController@searchLocations');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/locations', 'HomeController@viewLocations');

Route::get('/locations/remove/{id}', 'HomeController@removeLocation');

Route::match(['get', 'post'], '/locations/update/{id}', 'HomeController@updateLocation');

Route::match(['get', 'post'], '/locations/new', 'HomeController@newLocation');