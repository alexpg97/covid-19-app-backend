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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('covid')->group(function () {
    Route::get('', 'CovidController@getInfo');
    Route::get('getContinents', 'CovidController@getContinents');
    Route::get('perContinent/{continent}', 'CovidController@getPerContinent');
    Route::get('perCountry/{country}', 'CovidController@getByCountry');
});
