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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'App\Http\Controllers'], function () {

    Route::group(['prefix' => 'schools'], function () {
        Route::get('', 'SchoolController@index');
        Route::post('', 'SchoolController@store');
        Route::put('{id}', 'SchoolController@update');
        Route::delete('{id}', 'SchoolController@destroy');
    });

    Route::group(['prefix' => 'courses'], function () {
        Route::get('', 'CourseController@index');
        Route::post('', 'CourseController@store');
        Route::put('{id}', 'CourseController@update');
        Route::delete('{id}', 'CourseController@destroy');
    });

    Route::group(['prefix' => 'students'], function () {
        Route::get('', 'StudentController@index');
        Route::post('', 'StudentController@store');
        Route::put('{id}', 'StudentController@update');
        Route::delete('{id}', 'StudentController@destroy');
    });
});
