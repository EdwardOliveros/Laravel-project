@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>Editar Rol</h2>
        </div>
        <div>
            <a href="{{ route('roles.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>

    <form action="{{ route('roles.update', $rol->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Nombre del Rol:</strong>
                    <input type="text" name="nombre_rol" class="form-control" value="{{ $rol->nombre_rol }}" required>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Descripción:</strong>
                    <textarea class="form-control" name="descripcion" rows="4" required>{{ $rol->descripcion }}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Actualizar Rol</button>
            </div>
        </div>
    </form>
</div>
@endsection
