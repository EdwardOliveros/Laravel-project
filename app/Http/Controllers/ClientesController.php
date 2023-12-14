<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Cliente;
use App\Models\Usuario;
use App\Models\Factura;
use App\Models\Reserva;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $clientes = Cliente::with('usuario')->latest()->get();
        return view('cliente.index', ['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $usuarios = Usuario::all();
        return view('cliente.create', ['usuarios' => $usuarios]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'id_usuario' => 'required',
            'fecha_registro' => 'required|date',
            // Otros campos que puedas tener
        ]);

        Cliente::create($request->all());
        return redirect()->route('clientes.index')->with('success', 'Cliente creado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        return view('cliente.show', ['cliente' => $cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente): View
    {
        $usuarios = Usuario::all();
        return view('cliente.edit', ['cliente' => $cliente, 'usuarios' => $usuarios]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente): RedirectResponse
    {
        $request->validate([
            'id_usuario' => 'required',
            'fecha_registro' => 'required|date',
            // Otros campos que puedas tener
        ]);

        $cliente->update($request->all());
        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente): RedirectResponse
    {
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado con éxito');
    }
}
