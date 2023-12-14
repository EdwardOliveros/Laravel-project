<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Usuario;
use App\Models\Rol;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $usuarios = Usuario::with('rol')->latest()->get();
        return view('usuario.index', ['usuarios' => $usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $roles = Rol::all();
        return view('usuario.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'id_rol' => 'required',
            'tipo_doc' => 'required',
            'num_doc' => 'required',
            'nombres' => 'required',
            'correo' => 'required|email',
            'apellido' => 'required',
            'telefono' => 'required',
            'nombre_usuario' => 'required|unique:usuarios',
            'password' => 'required',
        ]);

        Usuario::create($request->all());
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        return view('usuario.show', ['usuario' => $usuario]);   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario): View
    {
        $roles = Rol::all();
        return view('usuario.edit', ['usuario' => $usuario, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario): RedirectResponse
    {
        $request->validate([
            'id_rol' => 'required',
            'tipo_doc' => 'required',
            'num_doc' => 'required',
            'nombres' => 'required',
            'correo' => 'required|email',
            'apellido' => 'required',
            'telefono' => 'required',
            'nombre_usuario' => 'required|unique:usuarios,nombre_usuario,' . $usuario->id,
            'password' => 'nullable|required_with:confirm_password|confirmed',
        ]);
    
        $data = $request->all();
    
        // Verificar si se proporciona una nueva contraseña
        if (empty($data['password'])) {
            unset($data['password']); // No actualizar la contraseña si no se proporciona
        } else {
            // Hashear la nueva contraseña antes de actualizar
            $data['password'] = bcrypt($data['password']);
        }
    
        $usuario->update($data);
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario): RedirectResponse
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado con éxito');
    }
}
