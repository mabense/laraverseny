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

Route::get('/', function (Request $request) {
    return ajaxOrLoadRoute($request, 'welcome');
});

Route::get('/welcome', function (Request $request) {
    return ajaxOrLoadRoute($request, 'welcome');
});

Route::get('/bye', function (Request $request) {
    return ajaxOrLoadRoute($request, 'bye');
});

function ajaxOrLoadRoute(Request $request, string $route) {
    if ($request->ajax()) {
        /** @disregard P1013  */
        return view($route)->renderSections();
    }
    return view($route);
}
