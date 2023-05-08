<?php

use App\Http\Controllers\CashMachineController;
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

Route::get('/', 'CashMachineController@homepage')->name('homepage');

Route::get('/handleCash', 'CashMachineController@handleCash')->name('handleCash');
Route::post('/storeCash', 'CashMachineController@storeCash')->name('storeCash');

Route::get('/handleCreditCard', 'CashMachineController@handleCreditCard')->name('handleCreditCard');
Route::post('/storeCreditCard', 'CashMachineController@storeCreditCard')->name('storeCreditCard');

Route::get('/handleBankTransfer', 'CashMachineController@handleBankTransfer')->name('handleBankTransfer');
Route::post('/storeBankTransfer', 'CashMachineController@storeBankTransfer')->name('storeBankTransfer');
