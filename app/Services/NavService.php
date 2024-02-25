<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class NavService
{


    public static function navigate(Request $request, string $route = "")
    {
        if ($route == "") {

            $route = Route::currentRouteName();
        }
        $view = NavService::error(404, "\"" . ucwords($route) . "\" " . Response::$statusTexts[404]);
        if (view()->exists($route)) {
            $view = view($route);
        }
        return NavService::ajaxOrLoad($request, $view);
    }


    public static function error(int $code, string $message = "")
    {
        return view('error')
            ->with('code', $code)
            ->with('message', $message ?: Response::$statusTexts[$code]);
    }


    public static function ajaxOrLoad(Request $request, View $view)
    {
        if ($request->ajax()) {
            /** @disregard P1013  */
            return $view->renderSections();
        }
        return $view;
    }
}
