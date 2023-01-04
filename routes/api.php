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


Route::post('add', 'App\Http\Controllers\API\apicontroller@store');
Route::get('add', 'App\Http\Controllers\API\apicontroller@index');
Route::get('add/{id}', 'App\Http\Controllers\API\apicontroller@showbyid');
Route::put('update/{id}', 'App\Http\Controllers\API\apicontroller@updatedata');
Route::delete('delete/{id}', 'App\Http\Controllers\API\apicontroller@delete');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
