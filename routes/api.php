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

Route::get('/first_login', 'ApiController@firstLogin')->name('first_login');
Route::get('/no_rfid_tag', 'ApiController@noRfidTag')->name('no_rfid_tag');

Route::get('/msgs', 'ApiController@msgs')->name('msgs');
Route::get('/login', 'ApiController@login')->name('login');

Route::middleware('rfid_auth')->get('/test', 'ApiController@test');

Route::post('/slack_post', 'ApiController@slackPost');

Route::get('/test2', 'ApiController@test2');

Route::apiResource('messages', 'MessageController');

//Route::middleware('rfid_auth')->get('/test2', 'ApiController@test2');
//Route::get('/test2', 'ApiController@test2');
/*
Route::get('/test', function(){
  return response()->json([
    'test' => 123
  ]);
});
*/
