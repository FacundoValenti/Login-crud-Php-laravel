<?php

namespace App\Http\Controllers;

use App\Models\Piletum;
use App\Models\Cliente;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PiletumRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PiletumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $pileta = Piletum::paginate();

        return view('piletum.index', compact('pileta'))
            ->with('i', ($request->input('page', 1) - 1) * $pileta->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        {
            $piletum = new Piletum();
            $cliente = Cliente::pluck('nombre','id');
        
            return view('piletum.create', compact('piletum', 'cliente'));
        }
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(PiletumRequest $request): RedirectResponse
    {
        Piletum::create($request->validated());

        return Redirect::route('pileta.index')
            ->with('success', 'Cliente creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $piletum = Piletum::find($id);

        return view('piletum.show', compact('piletum'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $piletum = Piletum::find($id);
        $cliente = Cliente::pluck('nombre', 'id')->toArray();
    
        return view('piletum.edit', compact('piletum', 'cliente'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(PiletumRequest $request, Piletum $piletum): RedirectResponse
    {
        $piletum->update($request->validated());

        return Redirect::route('pileta.index')
            ->with('success', 'cliente-pileta actualizado correctamente');
    }

    public function destroy($id): RedirectResponse
    {
        Piletum::find($id)->delete();

        return Redirect::route('pileta.index')
            ->with('success', 'Cliente-gimnasio eliminado correctamente');
    }
}
