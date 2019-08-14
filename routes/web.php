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

// Route::get('/', function () {
//     return view('worker.index');
// });
Route::get('/', function () {
    return view('welcome');
});
// Route::get('login', function () {
//     return view('login');
// });
//Route::get('/', 'HomeController@index');
//Route::get('/', 'WorkerController@index');

Route::get('worker', 'UsersController@worker');
Route::get('customer', 'UsersController@customer');

Route::post('worker', 'UsersController@store')->middleware('auth');
Route::post('customer', 'UsersController@store');
Route::post('/getstates','UsersController@getstates');
//Route::post('/login','UsersController@login');
Route::post('/addsalon','WorkerController@addsalon');
Route::post('/editsalon','WorkerController@editsalon');
Route::post('/updatesalon','WorkerController@updatesalon');
Route::post('/deletesalon','WorkerController@deletesalon');
Route::post('/destroy','UsersController@destroy');
Route::post('/viewsalon','CustomerController@viewsalon');



Route::get('/worker/page','WorkerController@index')->middleware('auth');
Route::get('/customer/page','CustomerController@index')->middleware('auth');


Auth::routes();
Route::get('/home', 'HomeController@checkurl');
//Route::get('/home', 'HomeController@index')->name('home');

