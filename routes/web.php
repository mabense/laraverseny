<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function (Request $request) {
    if ($request->ajax()) {
        return view('welcome')->renderSections();
    }
    // return redirect('/');
});

Route::get('/bye', function (Request $request) {
    if ($request->ajax()) {
        return view('bye')->renderSections();
    }
    // return redirect('/');
});
