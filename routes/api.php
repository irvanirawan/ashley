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

Route::get('/tes', function (Request $request) {
    return json_encode(['status'=>'OK']);
});

Route::get('/perawatan', 'ApiController@perawatan');
Route::get('/tanggal', 'ApiController@tanggal');
Route::get('/terapis', 'ApiController@terapis');
