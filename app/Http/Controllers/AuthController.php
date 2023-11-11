<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Http\Requests\RegisterRequest;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function createRegister()
    {
        $roles = Role::all();
        return view('auth.register', ['roles' => $roles]);
    }

    public function store(RegisterRequest $request) : RedirectResponse
    {
        User::create($request->validated());
        return redirect()->route('register.create')->with('success', 'Usuario creado satisfactoriamente');
    }

    public function createLogin()
    {
        return view('auth.login');
    }
}
