<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    return view('welcome');
});

Route::resource('customer','App\Http\Controllers\API\V1\CustomerController');

Route::resource('comment','App\Http\Controllers\API\V1\CommentController');

Route::resource('posts','App\Http\Controllers\API\V1\PostController');

Route::resource('category','App\Http\Controllers\API\V1\CategoryPostController');

Route::resource('favorite','App\Http\Controllers\API\V1\FavoriteController');

Route::post('/login_app','App\Http\Controllers\API\V1\LoginController@store');

Route::get('/slide','App\Http\Controllers\API\V1\HomeController@slide');

Route::get('/exchange','App\Http\Controllers\API\V1\HomeController@exchange');

Route::get('/weather','App\Http\Controllers\API\V1\HomeController@weather');

Route::get('/latest-new','App\Http\Controllers\API\V1\HomeController@latest');

Route::get('/postCate/{$id}','App\Http\Controllers\API\V1\HomeController@postsByCategory');

Route::post('/favoriteAll','App\Http\Controllers\API\V1\DetailPostController@store');
