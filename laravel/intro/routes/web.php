<?php

use App\Http\Controllers\SellerController;
use Illuminate\Support\Facades\Route;

//DB::listen(function ($query) {
//    dump($query->sql);
//});

Route::resource('sellers', SellerController::class);
