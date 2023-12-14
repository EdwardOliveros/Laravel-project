@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>Lista de Clientes</h2>
        </div>
        <div>
            <a href="{{ route('clientes.create') }}" class="btn btn-primary">Crear Cliente</a>
        </div>
    </div>

    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>ID</th>
                <th>Usuario</th>
                <th>Fecha de Registro</th>
                <!-- Otros campos que puedas tener -->
                <th>Acción</th>
            </tr>
            @foreach($clientes as $cliente)
                <tr>
                    <td class="fw-bold">{{ $cliente->id }}</td>
                    <td>{{ $cliente->usuario->nombre_usuario }}</td>
                    <td>{{ $cliente->fecha_registro }}</td>
                    <!-- Otros campos que puedas tener -->
                    <td>
                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning">Editar</a>

                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
