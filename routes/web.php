<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AdminPostController,
    LoginController,
    NewsLetterController,
    RegisterController,
    PostCommentController,
    PostController
};

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


Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('post/{post:slug}', [PostController::class, 'show'])->name('post.show');

Route::middleware('guest')->group(function () {

    // Prevent showing error when search /register
    Route::get('register', fn() => redirect('/'));
    Route::resource('register', RegisterController::class)->only(['create', 'store']);

    // Prevent showing error when search /login
    Route::get('login', fn() => redirect('/'));
    Route::resource('login', LoginController::class)->only(['create', 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');
    Route::post('newsletter', NewsLetterController::class)->name('newsletter');
    Route::post('post/{post:slug}/comments', [PostCommentController::class, 'store'])->name('post.store.comments');

    Route::middleware('can:admin')->name('admin.')->group(function () {
        Route::resource('admin/post', AdminPostController::class)->except('show');
    });
});