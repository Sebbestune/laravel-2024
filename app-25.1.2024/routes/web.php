<?php

use App\Models\Article;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome/{name}', function($name) {
    return view('nyvy', ['name' => $name, 'usertype' => "loggedin"]);
});

Route::get('test', function(){
    return [1,2,3];
});

Route::post("/articles", function ($request) {

        $request->title = htmlspecialchars($request->title);

        $article = new Article();
        $article->title = $request->title;
        $article->description = $request->desc;
        $article->save();
    
    
});