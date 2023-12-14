@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- Barra de navegación -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Sistema Hotelero</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            @if(Auth::check())
                                @if(Auth::user()->rol->nombre_rol === 'Empleado')
                                    <!-- Enlaces específicos para el rol de empleado -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('reservas.index') }}">Gestión de Reservas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('clientes.index') }}">Gestión de Clientes</a>
                                    </li>
                                    <!-- Agrega más enlaces según sea necesario para el rol de empleado -->
                                @elseif(Auth::user()->rol->nombre_rol === 'Administrador')
                                    <!-- Enlaces específicos para el rol de administrador -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Acceso Total</a>
                                    </li>
                                    <!-- Puedes agregar más enlaces específicos para el rol de administrador -->
                                @endif
                            @endif
                        </ul>
                    </div>
                    <div class="ml-auto">
                        @if(Auth::check())
                            <!-- Cuadro que indica el rol del usuario -->
                            <div class="text-right">
                                <p>Rol: {{ Auth::user()->rol->nombre_rol }}</p>
                            </div>
                            <!-- Botón de cierre de sesión -->
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
                            </form>
                        @endif
                    </div>
                </div>
            </nav>

            <!-- Contenido principal -->
            <div class="card mt-3">
                <div class="card-header">Bienvenido al Sistema Hotelero, {{ Auth::user()->nombre_usuario }}!</div>
                <div class="card-body">
                    <h3>Tu Panel de Control</h3>

                    @if(Auth::check())
                        <!-- Contenido específico para el usuario logueado -->
                        <p>¡Bienvenido! Puedes acceder a más funcionalidades.</p>
                    @else
                        <!-- Contenido para usuarios invitados -->
                        <p>¡Eres un usuario invitado! Por favor, inicia sesión para acceder a más funcionalidades.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
