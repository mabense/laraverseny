<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

use App\Services\NavService;

class NavController extends Controller
{


    public function welcome(Request $request) {
        return NavService::navigate($request, 'welcome');
    }


    public function bye(Request $request) {
        return NavService::navigate($request, 'bye');
    }


    public static function notFound(Request $request, string $route)
    {
        $route = $route ? "\"" . ucwords($route) . "\" " : "";
        $view = NavService::error(404, $route . Response::$statusTexts[404]);
        return NavService::ajaxOrLoad($request, $view);
    }
}
