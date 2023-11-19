<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Http\Requests\EntryRequest;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EntryController extends Controller
{
    public function index() : View
    {
        $entries = Entry::all();
        return view('entries.index', ['entries' => $entries]);
    }

    public function show(Entry $entry) : View
    {
        return view('entries.show', ['entry' => $entry]);
    }

    public function create() : View
    {
        return view('entries.create');
    }

    public function edit(Entry $entry) : View
    {
        return view('entries.edit', ['entry' => $entry]);
    }

    public function store(EntryRequest $request) : RedirectResponse
    {
        Entry::create($request->validated());
        return redirect()->route('entries.index')->with('success', 'Entrada registrada correctamente');
    }

    public function update(EntryRequest $request, Entry $entry) : RedirectResponse
    {
        $validatedRequest = $request->validated();

        $entry->update($validatedRequest->all());
        return redirect()->route('entries.show', $entry)->with('success', 'Entrada actualizada correctamente');
    }

    public function destroy(Entry $entry) : RedirectResponse
    {
        $entry->delete();
        return redirect()->route('entries.index')->with('success', 'Entrada eliminada exitosamente');
    }
}
