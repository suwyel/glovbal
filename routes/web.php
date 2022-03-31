<?php

use app\Helpers\general;
use App\Models\Matchlive;
use App\Models\live_matches;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\liveControoller;
use App\Http\Controllers\GenerelController;
use App\Http\Controllers\Auth\LoginController;
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

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('backend.administration.welcome');
    });
    Route::DELETE('live/delet/{id}', function ($id) {
        $val = Matchlive::find($id);
        // return $val;
        $val->delete();
        // return ['success' => 'delet success '];
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    });
    Route::get('/live_information', function () {
        return view('backend.administration.live_mach_add');
    });
    Route::get('/live/view', function () {
        // $user = live_matches::all();
        // $user['live_matche'] = live_matches::orderBy('id', 'desc')->paginate(8);

        return view('backend.administration.compani_view');
        // , compact('user')
    });

    // Auth::routes();


    // Route::get('/live_view', [App\Http\Controllers\GenerelController::class, 'view'])->name('view');

    // GenerelController
    // Route::get('live/view', 'App\Http\Controllers\GenerelController@live_view')->name('live_view');
    Route::get('compani/info', 'App\Http\Controllers\GenerelController@compani_info')->name('compani_info');

    Route::post('compani/info/sav', 'App\Http\Controllers\GenerelController@compani_sav');

    Route::get('generel/seting', 'App\Http\Controllers\GenerelController@generel')->name('generel');
    Route::post('store_settings', 'App\Http\Controllers\GenerelController@store_settings')->name('store_settings');
    Route::get('face/data', 'App\Http\Controllers\GenerelController@face_data');
    // Route::DELETE('/delet/{id}', 'App\Http\Controllers\GenerelController@destroy');


    Route::resource('live_matches', 'App\Http\Controllers\liveControoller');


});














// app\Helpers\general . php cricket series
