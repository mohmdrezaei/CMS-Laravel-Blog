<?php

use App\Http\Controllers\landingController;
use App\Http\Controllers\Panel\CategoryController;
use App\Http\Controllers\Panel\CommentController;
use App\Http\Controllers\CommentController as StoreCommentController;

use App\Http\Controllers\Panel\DashboardController;
use App\Http\Controllers\Panel\EditorUploadController;
use App\Http\Controllers\Panel\PostController;
use App\Http\Controllers\Panel\ProfileController;
use App\Http\Controllers\Panel\UserController;
use App\Http\Controllers\SearchPostController;
use App\Http\Controllers\ShowPostCategoryController;
use App\Http\Controllers\ShowPostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [landingController::class , 'index'])->name('index');
Route::get('post/{post}',[ShowPostController::class,'show'])->name('post.show');
Route::get('category/{category:slug}',[ShowPostCategoryController::class,'show'])->name('category.show');
Route::get('search',[SearchPostController::class,'show'])->name('post.search');
Route::post('/comment',[StoreCommentController::class,'store'])->name('comment.store');



Route::get('/dashboard',[DashboardController::class,'index'])->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->get('/profile',[ProfileController::class,'show'])->name('profile');
Route::middleware('auth')->patch('/profile',[ProfileController::class,'update'])->name('profile.update');


Route::middleware(['auth','admin'])->prefix('/panel')->group(function (){
    Route::resource('users',UserController::class)->except(['show']);
    Route::resource('categories',CategoryController::class)->except(['create','show']);
    Route::get('comments',[CommentController::class,'index'])->name('comments.index');
    Route::delete('comments/{comment}',[CommentController::class,'destroy'])->name('comments.destroy');
    Route::patch('comments/{comment}',[CommentController::class,'update'])->name('comments.update');

});
Route::post('/editor/upload',[EditorUploadController::class, 'upload'])->name('editor-upload');
Route::middleware(['auth','author'])->prefix('/panel')->group(function (){
    Route::resource('/posts',PostController::class);
});


require __DIR__.'/auth.php';
