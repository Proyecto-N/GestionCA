<?php

namespace App\Http\Controllers;

use App\Models\Concept;
use App\Http\Requests\ConceptRequest;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ConceptController extends Controller
{
    public function index() : View
    {
        $concepts = Concept::all();
        return view('concepts.index', ['concepts' => $concepts]);
    }

    public function show(Concept $concept) : View
    {
        return view('concepts.show', ['concept' => $concept]);
    }

    public function create() : View
    {
        return view('concepts.create');
    }

    public function edit(Concept $concept) : View
    {
        return view('concepts.edit', ['concept'] => $concept);
    }

    public function store(ConceptRequest $request) : RedirectResponse
    {
        Concept::create($request->validated());
        return redirect()->route('concepts.index')->with('success', 'Concepto creado correctamente');
    }

    public function update(ConceptRequest $request, Concept $concept) : RedirectResponse
    {
        $validatedRequest = $request->validated();

        $concept->update($validatedRequest->all());
        return redirect()->route('concepts.show', $concept)->with('success', 'Concepto actualizado exitosamente');
    }

    public function destroy(Concept $concept) : RedirectResponse
    {
        $concept->delete();
        return redirect()->route('concepts.index')->with('success', 'Concepto eliminado exitosamente');
    }
}
