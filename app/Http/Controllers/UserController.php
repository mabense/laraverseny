<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Models\User;

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
                ->with("data", User::all())
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


    public function signup(Request $request)
    {
        return NavService::navigate($request, 'signup');
    }


    public function login(Request $request)
    {
        return NavService::navigate($request, 'login');
    }
}
