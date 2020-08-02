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


Route::get('index', 'mycontroller@index')->name('index');

Route::get('insertCart/{id}', 'mycontroller@insertCart');

Route::get('viewCart', 'mycontroller@viewCart')->name('viewCart');

Route::get('deleteCart/{id}', 'mycontroller@deleteCart');

Route::get('updateCart/', 'mycontroller@updateCart')->name('updateCart');