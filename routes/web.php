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


//backend
Route::get('/backend/title','AdminController@title');
Route::get('/backend/ad','AdminController@ad');
Route::get('/backend/mvim','AdminController@mvim');
Route::get('/backend/image','AdminController@image');
Route::get('/backend/total','AdminController@total');
Route::get('/backend/bottom','AdminController@bottom');
Route::get('/backend/news','AdminController@news');
Route::get('/backend/admin','AdminController@admin');
Route::get('/backend/menu','AdminController@menu');


