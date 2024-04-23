<?php

namespace App\Services;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

use function Laravel\Prompts\error;

class NavService
{


    public static function navigate(Request $request, string $route = "")
    {
        if ($route == "") {
            $route = Route::currentRouteName();
        }
        $view = NavService::error404($route);
        if (view()->exists($route)) {
            $view = view($route);
        }
        return NavService::ajaxOrLoad($request, $view);
    }


    public static function ajaxOrLoad(Request  $request, View $view)
    {
        if ($request->ajax()) {
            /** @disregard P1013  */
            return $view->renderSections();
        }
        return $view;
    }


    public static function error404(string $route = "")
    {
        $route = $route ? "\"" . ucwords($route) . "\" " : "";
        return NavService::error(404, $route . Response::$statusTexts[404]);
    }


    public static function error(int $code, string $message = "")
    {
        if (!$message) {
            $texts = Response::$statusTexts;
            $message = array_key_exists($code, $texts) ? $texts[$code] : "";
        }
        return view('error')
            ->with('code', $code)
            ->with('message', $message);
    }
}
