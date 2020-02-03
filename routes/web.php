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

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('stage_one');
});

Route::get('/stage_two', function () {
    return view('stage_two');
});

Route::get('/stage_three', function () {
    return view('stage_three');
});

Route::get('/stage_four', function () {
    return view('stage_four');
});

Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::resource('companies', 'CompanyController');
    Route::resource('companies.reg_documents', 'RegDocumentController')->shallow();
    Route::get('/payment/{company}', 'PaymentController@showPayment');
    Route::post('/payment', 'PaymentController@redirectToGateway')->name('reg_payment');
});