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

Route::get('/', 'PagesController@index');

Route::put('/home/{id}', 'HomeController@update');
Route::get('/home', 'HomeController@index')->name('home');
Route::delete('/home/delete_passenger/{passenger}', 'PassengersController@destroy')->name('passenger');

Route::get('/add_passenger', 'PassengersController@create')->name('add_passenger');
Route::post('/add_passenger', 'PassengersController@store');

Route::get('/add_trip', 'TripsController@create')->name('add_trip');
Route::post('/add_trip', 'TripsController@store');
Route::delete('/home/delete_trip/{trip}', 'TripsController@destroy');

Auth::routes();



