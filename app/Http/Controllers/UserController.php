<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index() : View
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    public function show(User $user) : View
    {
        return view('user.show', ['user' => $user]);
    }

    public function edit(User $user) : View
    {
        return view('user.edit', ['user' => $user]);
    }

    public function update(UserRequest $request, User $user) : RedirectResponse
    {
        $validatedRequest = $request->validated();

        $user->update($validatedRequest->all());
        return redirect()->route('users.show', $user)->with('success', 'Usuario actualizado exitosamente');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente');
    }
}
