<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

use App\Services\NavService;

class NavController extends Controller
{


    public function navigate(Request $request, string $route = "")
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


    public function notFound(Request $request, string $route)
    {
        $route = $route ? "\"" . ucwords($route) . "\" " : "";
        $view = NavService::error(404, $route . Response::$statusTexts[404]);
        return NavService::ajaxOrLoad($request, $view);
    }
}
