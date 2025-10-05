<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CanEditPost;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::controller(PostController::class)->group(function () {
        Route::get('/posts/create', 'create')->name('posts.create');
        Route::post('/posts/store', 'store')->name('posts.store');
    });
    Route::post('/posts/{post}/comment',  [CommentController::class, 'store'])->name('posts.comment');
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/edit',  [PostController::class, 'edit'])->name('posts.edit')->middleware(CanEditPost::class);
Route::post('/posts/{post}/edit',  [PostController::class, 'update'])->name('posts.update')->middleware(CanEditPost::class);
Route::delete('/comments/{id}',  [CommentController::class, 'delete'])->name('comments.delete')->middleware(CanEditPost::class);

require __DIR__.'/auth.php';
