<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Services\NavService;

class UserController extends Controller
{


    public function index(Request $request)
    {
        $route = 'users.index';
        $view = NavService::error(404, "\"" . ucwords($route) . "\" " . Response::$statusTexts[404]);
        if (view()->exists($route)) {
            $view = view($route);
        }
        return NavService::ajaxOrLoad(
            $request,
            $view
                ->with("columns", ['Asd', 'Fgh', 'Jkl', 'Éáű'])
                ->with("data", [
                    [42, 72, 103, 1000],
                    [01, 02, 03, 1001],
                    [543, 436, 56745, 1024]
                ])
        );
    }


    public function show(Request $request)
    {
        return NavService::navigate($request, 'users.show');
    }


    public function create(Request $request)
    {
        return NavService::navigate($request, 'users.create');
    }


    public function store(Request $request)
    {
        return NavService::navigate($request, 'users.store');
    }
}
