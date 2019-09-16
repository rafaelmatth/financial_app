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

    Route::get('/historic-search', 'Admin\BalanceController@historic')->name('admin.historic');
    Route::any('/historic', 'Admin\BalanceController@searchHistoric')->name('historic.search');

    Route::get('/balance', 'Admin\BalanceController@index')->name('admin.balance');

    Route::get('/balance/deposit', 'Admin\BalanceController@deposit')->name('balance.deposit');
    Route::post('/balance/deposit', 'Admin\BalanceController@depositStore')->name('deposit.store');

    Route::get('/balance/withdrawn', 'Admin\BalanceController@withdrawn')->name('balance.withdrawn');
    Route::post('/balance/withdrawn', 'Admin\BalanceController@withdrawnStore')->name('withdrawn.store');

    Route::get('/balance/transfer', 'Admin\BalanceController@transfer')->name('balance.transfer');
    Route::post('/balance/transfer/confirm', 'Admin\BalanceController@confirmTransfer')->name('confirm.transfer');     
    Route::post('/balance/transfer/confirm/store', 'Admin\BalanceController@transferStore')->name('transfer.store');   
    
});


Route::get('profile', 'Admin\UserController@profile')->name('profile')->middleware('auth');
Route::get('/', 'SiteController@index')->name('home');

Route::post('profile-update', 'Admin\UserController@profileUpdate')->name('profileUpdate')->middleware('auth');


Auth::routes();
