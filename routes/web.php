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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('joboffers','JobOfferController');
Route::resource('companies','CompanyController');

Route::get('/joboffers/{id}/add_to_fav','UserController@add_to_fav');
Route::get('/joboffers/{id}/remove_from_fav','UserController@remove_from_fav');
