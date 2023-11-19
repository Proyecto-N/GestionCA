<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Requests\RoleRequest;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RoleController extends Controller
{
    public function index() : View
    {
        $roles = Role::all();
        return view('roles.index', ['roles' => $roles]);
    }

    public function create() : View
    {
        return view('roles.create');
    }

    public function store(RoleRequest $request) : RedirectResponse
    {
        Role::create($request->validated());
        return redirect()->route('roles.index')->with('success', 'Venta registrada correctamente');
    }
}
