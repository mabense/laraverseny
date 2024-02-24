<?php

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

Route::get('/', function (Request $request) {
    return ajaxOrLoadRoute($request, 'welcome');
});

Route::get('/contests', function (Request $request) {
    return ajaxOrLoadRoute($request, 'contests');
});

Route::get('/users', function (Request $request) {
    return ajaxOrLoadRoute($request, 'users');
});

Route::get('/welcome', function (Request $request) {
    return ajaxOrLoadRoute($request, 'welcome');
});

Route::get('/bye', function (Request $request) {
    return ajaxOrLoadRoute($request, 'bye');
});

Route::get('/{_}', function ($_, Request $request) {
    $view = viewError(404, "\"" . ucwords($_) . "\" " . Response::$statusTexts[404]);
    
    if ($request->ajax()) {
        /** @disregard P1013  */
        return $view->renderSections();
    }
    return $view;
});

function ajaxOrLoadRoute(Request $request, string $route) {
    $view = viewError(404, "\"" . ucwords($route) . "\" " . Response::$statusTexts[404]);
    if(view()->exists($route)) {
        $view = view($route);
    }
    
    if ($request->ajax()) {
        /** @disregard P1013  */
        return $view->renderSections();
    }
    return $view;
}

function viewError(int $code, string $message = "") {
    return view('error')
    ->with('code', $code)
    ->with('message', ($message == "") ? Response::$statusTexts[$code] : $message);
}
