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
 Route::resource('user', 'UserController');
 Route::get('/students', function () {
    return view('user.students');
});
Route::get('/deans', function () {
    return view('user.deans');
});
Route::get('/teachers', function () {
    return view('user.teachers');
});
Route::get('editStudents', array('uses' => 'UserController@editStudents'));
Route::resource('student', 'StudentController');
Route::resource('group', 'GroupController');
Route::get('/members/{id}', 'GroupController@members');
Route::get('/groups/{id}', 'DepartmentController@members');
Route::get('/deans/{id}', 'DepartmentController@deans');
Route::resource('dean', 'DeanController');
Route::resource('teacher', 'TeacherController');
Route::resource('department', 'DepartmentController');
Route::resource('lecture', 'LectureController');