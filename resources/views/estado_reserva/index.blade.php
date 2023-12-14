@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">CRUD de Estados de Reservas</h2>
        </div>
        <div>
            <a href="{{ route('estado_reservas.create') }}" class="btn btn-primary">Crear Estado de Reserva</a>
        </div>
    </div>

    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acción</th>
            </tr>
            @foreach($estadoReservas as $estadoReserva)
                <tr>
                    <td class="fw-bold">{{ $estadoReserva->id }}</td>
                    <td>{{ $estadoReserva->nombre }}</td>
                    <td>{{ $estadoReserva->descripcion }}</td>
                    <td>
                        <a href="{{ route('estado_reservas.edit', $estadoReserva->id) }}" class="btn btn-warning">Editar</a>

                        <form action="{{ route('estado_reservas.destroy', $estadoReserva->id) }}" method="post" class="d-inline">
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

