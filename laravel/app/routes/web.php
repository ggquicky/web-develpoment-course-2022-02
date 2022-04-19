<?php

use App\Events\PostCreated;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('send', function () {
    broadcast(
        new PostCreated(\App\Models\Post::findOrFail(1))
    );
});

Route::middleware('auth')->group(function () {
    Route::resource('posts', PostController::class)
        ->only(['create', 'destroy', 'index', 'show', 'store']);
    Route::resource('posts.likes', PostLikeController::class)
        ->only(['destroy', 'store']);
});
