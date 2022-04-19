<?php

use App\Http\Controllers\Api\PostController;
use Illuminate\Support\Facades\Route;

Route::get('posts', [PostController::class, 'index'])
    ->middleware('auth:sanctum');
Route::get('posts/{post}', [PostController::class, 'show']);
