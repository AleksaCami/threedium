<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Brisanje clanaka iz tabele
Route::post('/articles/destroy/{id}', 'ArticleController@destroy');

// Get clanaka iz baze u tabelu
Route::get('data', 'ArticleController@getData');
