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

    public function show(Role $role) : View
    {
        return view('roles.show', ['role' => $role]);
    }

    public function create() : View
    {
        return view('roles.create');
    }

    public function edit(Role $role) : View
    {
        return view('roles.edit', ['role' => $role]);
    }

    public function store(RoleRequest $request) : RedirectResponse
    {
        Role::create($request->validated());
        return redirect()->route('roles.index')->with('success', 'Rol registrado correctamente');
    }

    public function update(RoleRequest $request, Role $role) : RedirectResponse
    {
        $validatedRequest = $request->validated();

        $role->update($validatedRequest->all());
        return redirect()->route('roles.show', $role)->with('success', 'Rol actualizado correctamente');
    }

    public function destroy(Role $role) : RedirectResponse
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Rol eliminado exitosamente');
    }
}
