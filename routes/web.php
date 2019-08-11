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



Route::group(array('prefix' => 'admin', 'before' => 'auth'), function() {
    Route::get('/', 'Admin\AdminController@index')->name('admin.home');
    Route::get('/balance', 'Admin\BalanceController@index')->name('admin.balance');
    Route::get('/balance/deposit', 'Admin\BalanceController@deposit')->name('balance.deposit');
    Route::post('/balance/deposit', 'Admin\BalanceController@depositStore')->name('deposit.store');
    Route::get('/balance/withdrawn', 'Admin\BalanceController@withdrawn')->name('balance.withdrawn');
    Route::post('/balance/withdrawn', 'Admin\BalanceController@withdrawnStore')->name('withdrawn.store');     
});


Route::get('/', 'SiteController@index')->name('home');

Auth::routes();
