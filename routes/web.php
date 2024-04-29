<?php

use App\Http\Controllers\NavController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [NavController::class, 'welcome']);

Route::get('/welcome', [NavController::class, 'welcome']);

Route::get('/test', [NavController::class, 'test']);

Route::get('/users', [UserController::class, 'index']);

Route::get('/signup', [UserController::class, 'create']);

Route::post('/signup', [UserController::class, 'store']);

//

Route::get('/{route}', [NavController::class, 'notFound']);
