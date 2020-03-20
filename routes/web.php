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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('worker')
    ->as('worker.')
    ->group(function() {
        Route::get('home', 'Home\WorkerHomeController@index')->name('home');
Route::namespace('Auth\Login')
      ->group(function() {
       Route::get('login', 'WorkerController@showLoginForm')->name('login');
    Route::post('login', 'WorkerController@login')->name('login');
    Route::post('logout', 'WorkerController@logout')->name('logout');
      });
 });