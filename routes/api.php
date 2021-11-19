<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers;

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



Route::get('students','App\Http\Controllers\ApiController@getAllStudents');
Route::get('students/{id}','App\Http\Controllers\ApiController@getStudent');
Route::post('students','App\Http\Controllers\ApiController@createStudent');
Route::put('students/{id}','App\Http\Controllers\ApiController@updateStudent');
Route::delete('students/{id}','App\Http\Controllers\ApiController@deleteStudent');




