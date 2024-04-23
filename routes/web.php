<?php

use App\Http\Controllers\NavController;
use Illuminate\Support\Facades\Route;

Route::get('/', [NavController::class, 'welcome']);
Route::get('/welcome', [NavController::class, 'welcome']);
Route::get('/test', [NavController::class, 'test']);


Route::get('/{route}', [NavController::class, 'notFound']);
