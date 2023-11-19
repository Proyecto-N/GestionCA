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

    public function store(OutputRequest $request) : RedirectResponse
    {
        Output::create($request->validated());
        return redirect()->route('outputs.index')->with('success', 'Salida creada correctamente');
    }
}
