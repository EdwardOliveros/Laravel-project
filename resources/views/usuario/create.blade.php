@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>Crear Usuario</h2>
        </div>
        <div>
            <a href="{{ route('usuarios.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>

    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Rol:</strong>
                    <select name="id_rol" class="form-select" required>
                        @foreach($roles as $rol)
                            <option value="{{ $rol->id }}">{{ $rol->nombre_rol }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Tipo de Documento:</strong>
                    <input type="text" name="tipo_doc" class="form-control" required>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Número de Documento:</strong>
                    <input type="text" name="num_doc" class="form-control" required>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Nombres:</strong>
                    <input type="text" name="nombres" class="form-control" required>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Correo:</strong>
                    <input type="email" name="correo" class="form-control" required>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Apellido:</strong>
                    <input type="text" name="apellido" class="form-control" required>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Teléfono:</strong>
                    <input type="text" name="telefono" class="form-control" required>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Nombre de Usuario:</strong>
                    <input type="text" name="nombre_usuario" class="form-control" required>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Contraseña:</strong>
                    <input type="password" name="password" class="form-control" required>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Crear Usuario</button>
            </div>
        </div>
    </form>
</div>
@endsection
