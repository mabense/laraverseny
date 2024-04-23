<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\NavService;

class NavController extends Controller
{


    public function welcome(Request $request)
    {
        return NavService::navigate($request, 'welcome');
    }


    public function test(Request $request)
    {
        return NavService::navigate($request, 'test');
    }


    public function notFound(Request $request, string $route = "")
    {
        $view = NavService::error404($route);
        return NavService::ajaxOrLoad($request, $view);
    }
}
