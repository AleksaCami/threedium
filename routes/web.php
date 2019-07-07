<?php

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
    return view('auth.login');
});

Auth::routes();

Route::group(['prefix' => 'articles'], function (){
    Route::get('/', 'ArticleController@index');
    Route::get('/create', 'ArticleController@create');
    Route::post('/store', 'ArticleController@store');
    Route::get('/article/{id}', 'ArticleController@show');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
