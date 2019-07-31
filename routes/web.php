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
    Route::get('balance', 'Admin\BalanceController@index')->name('admin.balance');
    Route::get('/', 'Admin\AdminController@index')->name('admin.home');
});



Route::get('/', 'SiteController@index')->name('home');

Auth::routes();
