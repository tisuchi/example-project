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

Route::get('/join', 'JoinController@show')->name('join.show');
Route::post('/join', 'JoinController@store')->name('join.store');

Route::get('/login', 'LoginController@show')->name('login');
Route::post('/login', 'LoginController@store')->name('login.store');

Route::get('/verify/{token}', 'VerifyEmailController@show')->name('verify.email');

Route::get('redirect/{driver}', 'LoginProviderController@show')->name('login.provider');
Route::get('{driver}/callback', 'LoginProviderController@handleProviderCallback');

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('/dashboard')->group(function () {
        Route::get('/', 'DashboardController@index')->name('dashboard.index');

        Route::prefix('/wallets')->group(function () {
            Route::get('/index', 'WalletController@index')->name('wallets.index');

            Route::get('/create', 'WalletController@create')->name('wallets.create');
            Route::post('/store', 'WalletController@store')->name('wallets.store');

            Route::group(['prefix' => '/{walletId}/topup', 'middleware' => 'check.wallet'], function () {
                Route::get('/create', 'TransactionController@create')->name('topup.create');
                Route::post('/store', 'TransactionController@store')->name('topup.store');
            });

            Route::group(['prefix' => '/reports'], function () {
                Route::get('/', 'ReportsController@index')->name('reports.index');
            });
        });
    });

    Route::get('logout', 'LoginController@destroy')->name('logout');
});
