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

Route::get('/posts', 'PostsController@index');
Route::post('/posts/store', 'PostsController@store');
Route::get('/posts/{id?}', 'PostsController@show');
Route::post('/posts/update/{id?}', 'PostsController@update');
Route::delete('/posts/{id?}', 'PostsController@destroy');

Route::get('/', function () {
    return view('app');
});

Route::get('/{any}', function () {
    return view('app');
})->where('any','.*');