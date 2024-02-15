<?php

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
    return view('posts');
});

Route::get('post/{post}', function ($post) {
    $filePath = __DIR__ . "/../resources/post/{$post}.html";

    if(!file_exists($filePath)){
        abort(404);
    }
    
    $post = file_get_contents($filePath);

    return view('post',[
        'post' => $post
    ]);
});