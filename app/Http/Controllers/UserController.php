<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Services\NavService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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


    public function create(Request $request)
    {
        return NavService::navigate($request, 'users.create');
    }


    public function store(Request $request)
    {
        $formFields = $request->validate(
            [
                'surname' => ['required', 'min:3'],
                'givenname' => ['required', 'min:3'],
                'email' => ['required', 'email', Rule::unique('users', 'email')],
                'password' => ['required', 'confirmed', 'min:6']
            ],
            [
                'surname.required' => 'Kell vezetéknév',
                'surname.min' => 'Legalább 3 karakter hosszú vezetéknév kell',
                'givenname.required' => 'Kell keresztnév',
                'givenname.min' => 'Legalább 3 karakter hosszú keresztnév kell',
                'email.required' => 'Kell email',
                'email.email' => 'Hibás az email',
                'email.unique' => 'Ez az email már foglalt',
                'password.required' => 'Kell jelszó',
                'password.confirmed' => 'A jelszavak nem egyeznek',
                'password.min' => 'Legalább 6 karakter hosszú jelszó kell'
            ]
        );

        $formFields['password'] = bcrypt($formFields['password']);

        $newUser = User::create($formFields);
        auth()->login($newUser);

        // return redirect()->to('signup');

        return NavService::ajaxOrLoad($request, view('/'));
    }


    public function login(Request $request)
    {
        //
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return NavService::ajaxOrLoad($request, view('/'));
    }
}
