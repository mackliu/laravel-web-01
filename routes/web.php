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
Auth::routes();

Route::get('/','HomeController@index')->name('home');
Route::get('/news','HomeController@news');
Route::get('/admin','AdminController@index')->name('admin');
Route::get('/login','HomeController@login')->name('login');


//backend
Route::get('/backend/{item}','AdminController@list');
Route::get('/backend/modal/{item}','AdminController@showModal');
Route::post('/backend/show/{item}','AdminController@showRow');
Route::post('/backend/del/{item}','AdminController@delRow');
Route::post('/backend/text/{item}','AdminController@updateCol');

//addRow
Route::post("/backend/addRow/{table}","AdminController@addRow");
