<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JwtController;
use App\Http\Controllers\ProductController;

Route::get('products', [ProductController::class, 'index']);
Route::post('login', [JwtController::class, 'authenticate']);
Route::post('register', [JwtController::class, 'register']);

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('logout', [JwtController::class, 'logout']);
    Route::get('get_user', [JwtController::class, 'get_user']);
 //   Route::get('products', [ProductController::class, 'index']);
    Route::get('products/{id}', [ProductController::class, 'show']);
    Route::post('create', [ProductController::class, 'store']);
    Route::put('update/{product}',  [ProductController::class, 'update']);
    Route::delete('delete/{product}',  [ProductController::class, 'destroy']);
});