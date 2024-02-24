<?php

use App\Http\Controllers\NavController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

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

Route::get('/', [NavController::class, 'navigate'])->name('welcome');

Route::get('/welcome', [NavController::class, 'navigate'])->name('welcome');

Route::get('/bye', [NavController::class, 'navigate'])->name('bye');

// Route::get('/{page}', [NavController::class, 'ajax'])->where('page', 'contests|users');

Route::get('/{route}', [NavController::class, 'notFound']);
