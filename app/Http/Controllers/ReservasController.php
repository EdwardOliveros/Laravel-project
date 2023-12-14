<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Reserva;
use App\Models\Cliente;
use App\Models\EstadoReserva;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $reservas = Reserva::with('cliente', 'estadoReserva')->latest()->get();
        return view('reserva.index', ['reservas' => $reservas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $clientes = Cliente::all();
        $estadosReserva = EstadoReserva::all();
        return view('reserva.create', ['clientes' => $clientes, 'estadosReserva' => $estadosReserva]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'id_cliente' => 'required',
            'fecha_reserva' => 'required|date',
            'cant_habit' => 'required|integer',
            'adultos' => 'required|integer',
            'ninos' => 'required|integer',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'valor' => 'required|numeric',
            'id_estado' => 'required',
            // Otros campos que puedas tener
        ]);

        Reserva::create($request->all());
        return redirect()->route('reservas.index')->with('success', 'Reserva creada con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reserva $reserva)
    {
        return view('reserva.show', ['reserva' => $reserva]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reserva $reserva): View
    {
        $clientes = Cliente::all();
        $estadosReserva = EstadoReserva::all();
        return view('reserva.edit', ['reserva' => $reserva, 'clientes' => $clientes, 'estadosReserva' => $estadosReserva]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reserva $reserva): RedirectResponse
    {
        $request->validate([
            'id_cliente' => 'required',
            'fecha_reserva' => 'required|date',
            'cant_habit' => 'required|integer',
            'adultos' => 'required|integer',
            'ninos' => 'required|integer',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'valor' => 'required|numeric',
            'id_estado' => 'required',
            
        ]);

        $reserva->update($request->all());
        return redirect()->route('reservas.index')->with('success', 'Reserva actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reserva $reserva): RedirectResponse
    {
        $reserva->delete();
        return redirect()->route('reservas.index')->with('success', 'Reserva eliminada con éxito');
    }
}

