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

// ADMIN CONTROLLER
Route::get('/','App\Http\Controllers\AdminController@dashboard');
Route::get('/admin','App\Http\Controllers\AdminController@index');
Route::post('/admin-login','App\Http\Controllers\AdminController@dashboard');
Route::get('/dashboard','App\Http\Controllers\AdminController@show_dashboard');
Route::get('/logout','App\Http\Controllers\AdminController@logout');


// CUSTOMER CONTROLLER
Route::get('/customer','App\Http\Controllers\CustomerController@index');
Route::get('/add-customer-form','App\Http\Controllers\CustomerController@create');
Route::post('/add-customer','App\Http\Controllers\CustomerController@store');
Route::get('/edit-customer-form/id={id}','App\Http\Controllers\CustomerController@edit');
Route::post('/edit-customer','App\Http\Controllers\CustomerController@update');
Route::get('/delete-customer/id={id}','App\Http\Controllers\CustomerController@destroy');

// CATEGORY CONTROLLER
Route::get('/category','App\Http\Controllers\CategoryController@index');
Route::get('/add-category-form','App\Http\Controllers\CategoryController@create');
Route::get('/edit-category-form/id={id}','App\Http\Controllers\CategoryController@edit');
Route::post('/add-category','App\Http\Controllers\CategoryController@store');
Route::post('/edit-category','App\Http\Controllers\CategoryController@update');
Route::get('/delete-category/id={id}','App\Http\Controllers\CategoryController@destroy');

//POST CONTROLLER
Route::get('/posts','App\Http\Controllers\PostController@index');
Route::get('/add-post-form','App\Http\Controllers\PostController@create');
Route::post('/add-post','App\Http\Controllers\PostController@store');
Route::get('/edit-post-form/id={id}','App\Http\Controllers\PostController@edit');
Route::post('/edit-post','App\Http\Controllers\PostController@update');
Route::get('/delete-post/id={id}','App\Http\Controllers\PostController@destroy');
