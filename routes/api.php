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

// untuk hystori
Route::get('hystori', 'Api\HystoriController@index');
Route::post('hystori/store', 'Api\HystoriController@store');

Route::get('tarif', 'Api\TarifController@index');

Route::get('hystori/kirim/{id}', 'Api\HystoriController@kirim');
Route::get('hystori/sampai/{id}', 'Api\HystoriController@sampai');

Route::get('login/{email}/{pass}', 'Api\Login@getLogin');

Route::get('kurir', 'Api\HistoryKurirController@index');
Route::get('notakirim/{id?}', 'Api\NotakirimsController@index');

Route::get('bawa/{id}/{ide}', 'Api\NotakirimsController@bawa');
Route::get('kirim/{id}', 'Api\NotakirimsController@kirim');
Route::get('sampai/{id}', 'Api\NotakirimsController@sampai');
Route::get('konfirmasi/{id}', 'Api\NotakirimsController@konfirmasi');

// tracking client
Route::get('tracking/{id}', 'Api\NotifTrackingController@getTracking');
Route::get('getmaps/{id}', 'Api\NotifTrackingController@getMaps');