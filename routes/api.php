<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiConroller;

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

Route::middleware(['check_api_key'])->group(function () {
    Route::post('live_post', 'App\Http\Controllers\ApiConroller@post');
    Route::get('live_matches', 'App\Http\Controllers\ApiConroller@list');
    Route::get('live_find/{id}', 'App\Http\Controllers\ApiConroller@find');
    Route::put('live_update/{id}', 'App\Http\Controllers\ApiConroller@update');
    Route::DELETE('live_delete/{id}', 'App\Http\Controllers\ApiConroller@delete');

});

// Route::post('live_post', 'App\Http\Controllers\ApiConroller@post');
// Route::get('live_matches', 'App\Http\Controllers\ApiConroller@list');
// Route::get('live_find/{id}', 'App\Http\Controllers\ApiConroller@find');
// Route::put('live_update/{id}', 'App\Http\Controllers\ApiConroller@update');
// Route::DELETE('live_delete/{id}', 'App\Http\Controllers\ApiConroller@delete');
// Route::put('live_valu/', 'App\Http\Controllers\ApiConroller@val');