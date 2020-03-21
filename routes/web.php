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

Route::get('/register', function () {
    return redirect('/#registerNow');
});

Route::get('/', 'HomeController@index')->name('home');

// Route::get('/stage_four', function () {
//     return view('stage_four');
// });

Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/trade', 'HomeController@trading_index')->name('trade');
    Route::get('/trade/sellers/{commodity}', 'MarketController@sellers')->name('sellers');
    Route::get('/trade/buyers/{commodity}', 'MarketController@buyers')->name('buyers');
    Route::get('/trade/dashboard', function () {
        return view('trading.dashboard');
    })->name('dashboard');

    Route::resource('companies', 'CompanyController');
    Route::resource('companies.rfq', 'RFQController')->shallow();
    Route::resource('companies.market', 'MarketController')->shallow();
    Route::resource('companies.warehouse', 'WarehouseController')->shallow();
    Route::resource('companies.reg_documents', 'RegDocumentController')->shallow();
    Route::resource('warehouse.live_market', 'LiveMarketController')->shallow();
    Route::get('/payment/{company}', 'PaymentController@showPayment');
    Route::post('/payment', 'PaymentController@redirectToGateway')->name('reg_payment');
    Route::get('/{company}/trade-investments', 'TradeController@investments');
    Route::get('/{company}/trade-sales', 'TradeController@sales');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {   
    Route::resource('/merchants', 'Admin\MerchantController');
});