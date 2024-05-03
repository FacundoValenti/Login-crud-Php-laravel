<?php

namespace App\Http\Controllers;

use App\Models\Gimnasio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\GimnasioRequest;
use App\Models\Cliente;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class GimnasioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $gimnasios = Gimnasio::paginate();
    
        return view('gimnasio.index', compact('gimnasios'))
            ->with('i', ($request->input('page', 1) - 1) * $gimnasios->perPage());
    }
    


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $gimnasio = new Gimnasio();
        $cliente = Cliente::pluck('nombre','id');

        return view('gimnasio.create', compact('gimnasio', 'cliente'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GimnasioRequest $request): RedirectResponse
    {
        Gimnasio::create($request->validated());

        return Redirect::route('gimnasio.index')
            ->with('success', 'Cliente creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $gimnasio = Gimnasio::find($id);

        return view('gimnasio.show', compact('gimnasio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $gimnasio = Gimnasio::find($id);
        $cliente = Cliente::pluck('nombre', 'id')->toArray();
        return view('gimnasio.edit', compact('gimnasio', 'cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GimnasioRequest $request, Gimnasio $gimnasio): RedirectResponse
    {
        $gimnasio->update($request->validated());

        return Redirect::route('gimnasio.index')
            ->with('success', 'cliente-gimnasio actualizado correctamente');
    }

    public function destroy($id): RedirectResponse
    {
        Gimnasio::find($id)->delete();

        return Redirect::route('gimnasio.index')
            ->with('success', 'Cliente-gimnasio eliminado correctamente');
    }
}
