<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function create()
    {
        if(Auth::check()) {
            return redirect('/');
        }

        $roles = Role::all();
        return view('auth.register', ['roles' => $roles]);
    }

    public function store(RegisterRequest $request) : RedirectResponse
    {
        User::create($request->validated());
        return redirect()->route('register.create')->with('success', 'Usuario creado satisfactoriamente');
    }

    public function login()
    {
        if(Auth::check()) {
            return redirect('/');
        }

        return view('auth.login');
    }

    public function authenticate(LoginRequest $request) : RedirectResponse
    {
        $credentials = $request->getCredentials();

        if(!Auth::validate($credentials)) {
            return redirect()->route('auth.login')->withErrors('Correo o contraseña incorrectos');
        }

        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);

        return $this->authenticated($request, $user);
    }

    public function authenticated(Request $request, $user) : RedirectResponse
    {
        return redirect('/');
    }

    public function logout() : RedirectResponse
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('auth.login');
    }

}
