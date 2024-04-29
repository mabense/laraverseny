<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Services\NavService;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $route = 'users.index';
        $view = NavService::error404($request->path());
        if (view()->exists($route)) {
            $view = view($route);
        }
        return NavService::ajaxOrLoad(
            $request,
            $view->with('data', User::all())
        );
    }
}
