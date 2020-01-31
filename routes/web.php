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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    return view('stage_one');
});

Route::get('/stage_two', function () {
    return view('stage_two');
});


Route::get('/stage_three', function () {
    return view('stage_three');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resources([
    'companies' => 'CompanyController',
]);
