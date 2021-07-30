<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// post routes
Route::resource('upload-post', [PostController::class, 'index']);
Route::resource('save', [PostController::class, 'store']);
Route::resource('edit-post/{id}', [PostController::class, 'edit']);
Route::resource('update', [PostController::class, 'update']);
Route::resource('delete-post/{id}', [PostController::class, 'destroy']);

// comment routes
Route::resource('comment/{id}', [CommentController::class, 'show']);
Route::resource('comment_save', [CommentController::class, 'store']);
Route::resource('delete-comment/{id}', [CommentController::class, 'destroy']);




