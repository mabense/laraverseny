<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

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
        $formFields = $request->validate([
            'surname' => ['required', 'min:3'],
            'givenname' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);
        $formFields['password'] = bcrypt($formFields['password']);
        $user = User::create($formFields);
        auth()->login($user);
        return self::index($request);
    }


    public function login(Request $request)
    {
        return NavService::navigate($request, 'login');
    }


    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required'
        ]);
        $formFields['password'] = bcrypt($formFields['password']);
        
        // auth()->login($user);
        return NavService::navigate($request, 'welcome');
    }
}
