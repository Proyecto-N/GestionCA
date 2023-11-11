<?php

namespace App\Http\Controllers;

use App\Models\Role;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function store(Request $request)
    {
        $validation = $request->validate([
            'role' => 'required',
            'description' => 'required'
        ]);

        Role::create($validation);
    }
}
