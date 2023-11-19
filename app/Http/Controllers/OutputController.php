<?php

namespace App\Http\Controllers;

use App\Models\Output;
use App\Http\Requests\OutputRequest;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OutputController extends Controller
{
    public function index() : View
    {
        $outputs = Output::all();
        return view('outputs.index', ['outputs' => $outputs]);
    }

    public function show(Output $output) : View
    {
        return view('outputs.show', ['output' => $output]);
    }

    public function create() : View
    {
        return view('outputs.create');
    }

    public function edit(Output $output) : View
    {
        return view('outputs.edit', ['output' => $output]);
    }

    public function store(OutputRequest $request) : RedirectResponse
    {
        Output::create($request->validated());
        return redirect()->route('outputs.index')->with('success', 'Salida creada correctamente');
    }

    public function update(OutputRequest $request, Output $output) : RedirectResponse
    {
        $validatedRequest = $request->validated();

        $output->update($validatedRequest->all());
        return redirect()->route('outputs.show', $output)->with('success', 'Salida actualizada correctamente');
    }

    public function destroy(Output $output) : RedirectResponse
    {
        $output->delete();
        return redirect()->route('outputs.index')->with('success', 'Salida eliminada exitosamente');
    }
}
