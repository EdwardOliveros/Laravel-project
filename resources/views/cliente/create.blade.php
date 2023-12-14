@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>Crear Cliente</h2>
        </div>
        <div>
            <a href="{{ route('clientes.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>

    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Usuario:</strong>
                    <select name="id_usuario" class="form-select" required>
                        @foreach($usuarios as $usuario)
                            <option value="{{ $usuario->id }}">{{ $usuario->nombre_usuario }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Fecha de Registro:</strong>
                    <input type="date" name="fecha_registro" class="form-control" required>
                </div>
            </div>

            <!-- Otros campos que puedas tener -->

            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Crear Cliente</button>
            </div>
        </div>
    </form>
</div>
@endsection
