<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');

// Country
Route::get('/countries', 'HomeController@getCountries');

// City
Route::get('/countries/{name}/export-city', 'HomeController@exportCity')
	->name('export_city');
Route::get('/countries/get-city', 'HomeController@getCityByCountry')
	->name('get_city');

// Weather
Route::get('/countries/get-weather', 'HomeController@getWeather')
	->name('get_weather');

// Get Nearby
Route::get('/countries/get-nearby', 'HomeController@getNearby')
	->name('get_nearby');