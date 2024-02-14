<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PostController::class, 'index']);
Route::get('add-blog-post-form', [PostController::class, 'create']);
Route::post('store-form', [PostController::class, 'store']);
Route::post('posts/comment/add', [PostController::class, 'storecomment'])->name('post-add-comment');