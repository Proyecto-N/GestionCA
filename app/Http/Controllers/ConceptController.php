<?php

namespace App\Http\Controllers;

use App\Models\Concept;
use App\Http\Requests\ConceptRequest;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ConceptController extends Controller
{
    public function index()
    {
        $concepts = Concept::all();
        return view('concepts.index', ['concepts' => $concepts]);
    }

    public function create()
    {
        return view('concepts.register');
    }

    public function store(ConceptRequest $request) : RedirectResponse
    {
        Concept::create($request->validated());
        return redirect()->route('concepts.index')->with('success', 'Concepto creado correctamente');
    }
}
