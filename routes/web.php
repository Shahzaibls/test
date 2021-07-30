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
Route::get('upload-post', [PostController::class, 'index']);
Route::post('save', [PostController::class, 'store']);
Route::get('edit-post/{id}', [PostController::class, 'edit']);
Route::post('update', [PostController::class, 'update']);
Route::get('delete-post/{id}', [PostController::class, 'destroy']);

// comment routes
Route::get('comment/{id}', [CommentController::class, 'show']);
Route::post('comment_save', [CommentController::class, 'store']);
Route::get('delete-comment/{id}', [CommentController::class, 'destroy']);




