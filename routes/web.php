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



Route::group(['middleware' => ['auth']], function () {
    Route::prefix('/dashboard')->group(function () {
        Route::get('/', 'DashboardController@index')->name('dashboard.index');
    });
});
