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

Route::get('post/{slug}', function ($slug) {
    
    if(!file_exists($filePath =  __DIR__ . "/../resources/post/{$slug}.html")){
        abort(404);
    }

    // cache the filepath content for 20 seconds
    $post = cache()->remember("post.{$slug}", now()->addSeconds(30) ,fn() => file_get_contents($filePath));
    

    return view('post',[
        'post' => $post
    ]);
});