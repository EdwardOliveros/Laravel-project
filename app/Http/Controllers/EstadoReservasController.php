<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Models\EstadoReserva;

class EstadoReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $estadoReservas = EstadoReserva::latest()->get();
        return view('estado_reserva.index', ['estadoReservas' => $estadoReservas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('estado_reserva.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);

        EstadoReserva::create($request->all());
        return redirect()->route('estado_reservas.index')->with('success', 'Creado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(EstadoReserva $estadoReserva)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EstadoReserva $estadoReserva): View
    {
        return view('estado_reserva.edit', ['estadoReserva' => $estadoReserva]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EstadoReserva $estadoReserva): RedirectResponse
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);

        $estadoReserva->update($request->all());
        return redirect()->route('estado_reservas.index')->with('success', 'Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EstadoReserva $estadoReserva)
    {
        //
    }
}

