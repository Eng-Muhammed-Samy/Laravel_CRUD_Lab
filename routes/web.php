<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('posts/deletedUsers', [PostController::class, 'getDeletedUsers'])->name('posts.deletedUsers');
Route::get('posts/restore/{post}', [PostController::class, 'restore'])->name('posts.restore');
Route::resource("posts", PostController::class);
