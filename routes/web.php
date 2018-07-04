<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/businesses', 'BusinessesController@store')->name('businesses');

Route::get('/businesses', 'BusinessesController@index');

Route::put('/businesses/{business}', 'BusinessesController@update');

Route::get('/profile/create','ProfileController@create');

Route::put('/profile/create/{user}','ProfileController@address');

Route::get('/profile','ProfileController@index');

Route::put('/profile/{user}','ProfileController@update');
