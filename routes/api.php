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
Route::middleware(['cors'])->group(function () {
    Route::resource('/tip/register','API\v1\RegisterController');
    Route::get('/test', 'API\v1\RegisterController@testEmail');
    Route::get('/testdata', 'API\v1\RegisterController@testData');
    Route::post('/login', 'API\v1\RegisterController@checkPassword');
    Route::get('/pdf', 'API\v1\RegisterController@loadPdf');
    Route::get('/mailpdf', 'API\v1\RegisterController@sendEmailPdf');
    Route::resource('/customer','API\v1\CustomersController');
    Route::post('/login2','API\v1\CustomersController@login');
    Route::resource('/package','API\v1\PackagesController');
    Route::post('/getdata','API\v1\CustomersController@getdata');
});

