<?php

use App\Http\Controllers\AdminPostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostCommentController;

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

Route::get('post/{post:slug}', [PostController::class, 'show'])->name('post');
Route::post('post/{post:slug}/comments', [PostCommentController::class, 'store']);

Route::post('newsletter', NewsLetterController::class);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [LoginController::class, 'create'])->middleware('guest');
Route::post('login', [LoginController::class, 'store'])->middleware('guest');
Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth');

Route::get('admin/post', [AdminPostController::class, 'index'])->middleware('admin');
Route::post('admin/post', [AdminPostController::class, 'store'])->middleware('admin');
Route::get('admin/post/create', [AdminPostController::class, 'create'])->middleware('admin');
Route::get('admin/post/{post}/edit', [AdminPostController::class, 'edit'])->middleware('admin');
Route::patch('admin/post/{post}', [AdminPostController::class, 'update'])->middleware('admin');
Route::delete('admin/post/{post}', [AdminPostController::class, 'destroy'])->middleware('admin');
