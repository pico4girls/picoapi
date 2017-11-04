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

//Route::middleware('rfid_auth')->post('/test', 'ApiController@test');

//Route::middleware('rfid_auth')->get('/test2', 'ApiController@test2');
//Route::get('/test2', 'ApiController@test2');

Route::get('/test', function(){
  return response()->json([
    'test' => 123
  ]);
});
