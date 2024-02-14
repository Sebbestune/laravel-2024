<?php

use App\Http\Controllers\api\RecipeController;
use App\Http\Controllers\api\RecipeListController;
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

Route::get("recipes", [RecipeController::class, "index"]);
Route::get("recipes/{id}", [RecipeController::class, "show"]);
Route::post("recipes", [RecipeController::class, "store"]);
Route::put("recipes/{id}", [RecipeController::class, "update"]);
Route::put("recipes/{id}", [RecipeController::class, "destroy"]);

Route::get("lists", [RecipeListController::class, "index"]);
Route::get("lists/{id}", [RecipeListController::class, "show"]);
Route::post("lists", [RecipeListController::class, "store"]);
Route::put("lists/{id}", [RecipeListController::class, "update"]);
Route::put("lists/{id}", [RecipeListController::class, "destroy"]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
