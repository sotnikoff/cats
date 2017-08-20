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

Route::prefix('v1')->group(function(){

    //Random images

    Route::get('/img','ImageController@random');
    Route::get('/img/{size}','ImageController@randomWithSize')->where('size','w\d+|h\d+|w\d+h\d+|h\d+w\d+');


    //Images by Ids

    Route::get('/img/{id}','ImageController@byId')->where('id','\d+');
    Route::get('/img/{id}/{size}','ImageController@byIdWithSize')->where(['id'=>'\d+','byIdWithSize'=>'w\d+|h\d+|w\d+h\d+|h\d+w\d+']);



});
