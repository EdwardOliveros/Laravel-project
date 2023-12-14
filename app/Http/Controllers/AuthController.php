<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    protected $model = Usuario::class;

    /**
     * Muestra el formulario de inicio de sesión.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Procesa la solicitud de inicio de sesión.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $credentials = $request->only('correo', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticación exitosa
            return redirect()->route('home');
        }

        // Autenticación fallida
        return redirect()->route('login')->with('error', 'Credenciales incorrectas. ¿No tienes una cuenta? Regístrate aquí.');
    }

    /**
     * Cierra la sesión del usuario.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
