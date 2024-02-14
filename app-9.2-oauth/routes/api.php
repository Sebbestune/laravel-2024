<?php

use App\Http\Controllers\Api\AuthenticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'Api', 'prefix' => 'v1'], function () {

    Route::post('login', [AuthenticationController::class, 'store']);

    Route::get('test', function(){
        return response()->json([
            'success' => true,
            'message' => 'This is a test message! You are logged in!',
        ], 200);
    })->middleware('auth:api');
    
    Route::post('logout', [AuthenticationController::class, 'destroy'])->middleware('auth:api');

});

// localhost:8000/api/v1/login