<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

use App\Http\Controllers\NavController;
use App\Http\Controllers\ContestController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [NavController::class, 'welcome']);

Route::get('/welcome', [NavController::class, 'welcome']);

Route::get('/bye', [NavController::class, 'bye']);

Route::get('/contests', [ContestController::class, 'index']);

Route::get('/users', [UserController::class, 'index']);

Route::post('/users', [UserController::class, 'store']);

Route::get('/signup', [UserController::class, 'create']);

Route::get('/login', [UserController::class, 'login']);

// Route::get('/{page}', [NavController::class, 'ajax'])->where('page', 'contests|users');

Route::get('/{route}', [NavController::class, 'notFound']);
