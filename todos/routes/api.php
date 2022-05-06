<?php

use App\Http\Controllers\Api\TodoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('todos', TodoController::class);
Route::get('users', [UserController::class, 'index']);
Route::get('users/search', [UserController::class, 'search']);
