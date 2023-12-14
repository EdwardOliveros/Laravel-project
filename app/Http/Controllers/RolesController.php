<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Rol;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $roles = Rol::latest()->get();
        return view('rol.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('rol.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre_rol' => 'required',
            'descripcion' => 'required',
        ]);

        Rol::create($request->all());
        return redirect()->route('roles.index')->with('success', 'Rol creado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rol $rol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rol $rol): View
    {
        return view('rol.edit', ['rol' => $rol]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rol $rol): RedirectResponse
    {
        $request->validate([
            'nombre_rol' => 'required',
            'descripcion' => 'required',
        ]);

        $rol->update($request->all());
        return redirect()->route('roles.index')->with('success', 'Rol actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rol $rol): RedirectResponse
    {
        $rol->delete();
        return redirect()->route('roles.index')->with('success', 'Rol eliminado con éxito');
    }
}
