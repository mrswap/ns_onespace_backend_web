<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Common\HomePageController;
use App\Http\Controllers\Api\Common\PropertyController;


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


//Auth Api
Route::POST('/v1/otp-send/{user}', [AuthController::class, 'sendLoginOTP']);
Route::POST('/v1/verify-otp/{user}', [AuthController::class, 'verifyOTP']);

//guest-non logged in

Route::prefix('v1/home/')->group(function () {
  Route::get('index', [HomePageController::class, 'homeData']);
  Route::get('properties/{type}/{value}/{limit}', [HomePageController::class, 'propertiesData']);
});

Route::prefix('v1/properties/')->group(function () {
  Route::get('get/filter-data', [PropertyController::class, 'getFilterData']);
  Route::get('get-properties', [PropertyController::class, 'propertySearch']);
  Route::get('properties-details/{id}', [PropertyController::class, 'propertydetails']);
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
  return $request->user();
});
