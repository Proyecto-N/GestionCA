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

    public function create() : View
    {
        return view('concepts.create');
    }

    public function store(ConceptRequest $request) : RedirectResponse
    {
        Concept::create($request->validated());
        return redirect()->route('concepts.index')->with('success', 'Concepto creado correctamente');
    }
}
