
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>Iniciar Sesión</h2>
        </div>
    </div>

    <div class="col-12 mt-4">
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" name="correo" class="form-control" id="email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>

            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </form>

        <p class="mt-3">¿No tienes una cuenta? <a href="{{ route('usuarios.create') }}">Regístrate aquí</a></p>
    </div>
</div>
@endsection
