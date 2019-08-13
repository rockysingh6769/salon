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
    return view('customer.index');
});
Route::get('/worker', function () {
    return view('welcome');
});
Route::get('login', function () {
    return view('login');
});

Route::get('worker', 'UsersController@worker');
Route::get('customer', 'UsersController@customer');

Route::post('worker', 'UsersController@store');
Route::post('customer', 'UsersController@store');
Route::post('/getstates','UsersController@getstates');
Route::post('/login','UsersController@login');


