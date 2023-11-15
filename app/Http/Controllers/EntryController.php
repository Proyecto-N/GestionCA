<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Http\Requests\EntryRequest;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class EntryController extends Controller
{
    public function index()
    {
        $entries = Entry::all();
        return view('entries.index', ['entries' => $entries]);
    }

    public function create()
    {
        return view('entries.register');
    }

    public function store(EntryRequest $request) : RedirectResponse
    {
        Entry::create($request->validated());
        return redirect()->route('entries.index')->with('success', 'Entrada registrada correctamente');
    }
}
