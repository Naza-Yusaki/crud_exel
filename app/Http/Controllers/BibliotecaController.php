<?php

namespace App\Http\Controllers;

use App\Models\Biblioteca;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\BibliotecaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class BibliotecaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $bibliotecas = Biblioteca::paginate();

        return view('biblioteca.index', compact('bibliotecas'))
            ->with('i', ($request->input('page', 1) - 1) * $bibliotecas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $biblioteca = new Biblioteca();

        return view('biblioteca.create', compact('biblioteca'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BibliotecaRequest $request): RedirectResponse
    {
        Biblioteca::create($request->validated());

        return Redirect::route('bibliotecas.index')
            ->with('success', 'Biblioteca created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $biblioteca = Biblioteca::find($id);

        return view('biblioteca.show', compact('biblioteca'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $biblioteca = Biblioteca::find($id);

        return view('biblioteca.edit', compact('biblioteca'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BibliotecaRequest $request, Biblioteca $biblioteca): RedirectResponse
    {
        $biblioteca->update($request->validated());

        return Redirect::route('bibliotecas.index')
            ->with('success', 'Biblioteca updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Biblioteca::find($id)->delete();

        return Redirect::route('bibliotecas.index')
            ->with('success', 'Biblioteca deleted successfully');
    }
}
