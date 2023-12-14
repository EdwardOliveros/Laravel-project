@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">Listado de Reservas</h2>
        </div>
        <div>
            <a href="{{ route('reservas.create') }}" class="btn btn-primary">Crear Reserva</a>
        </div>
    </div>

    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>ID</th>
                <th>Cliente</th>
                <th>Fecha de Reserva</th>
                <th>Cantidad de Habitaciones</th>
                <th>Adultos</th>
                <th>Niños</th>
                <th>Fecha de Inicio</th>
                <th>Fecha de Fin</th>
                <th>Valor</th>
                <th>Estado de Reserva</th>
               
                <th>Acción</th>
            </tr>
            @foreach($reservas as $reserva)
                <tr>
                    <td class="fw-bold">{{ $reserva->id }}</td>
                    <td>{{ $reserva->cliente->usuario->nombre_usuario }}</td>
                    <td>{{ $reserva->fecha_reserva }}</td>
                    <td>{{ $reserva->cant_habit }}</td>
                    <td>{{ $reserva->adultos }}</td>
                    <td>{{ $reserva->ninos }}</td>
                    <td>{{ $reserva->fecha_inicio }}</td>
                    <td>{{ $reserva->fecha_fin }}</td>
                    <td>{{ $reserva->valor }}</td>
                    <td>{{ $reserva->estadoReserva->nombre }}</td>
                    
                    <td>
                        <a href="{{ route('reservas.edit', $reserva->id) }}" class="btn btn-warning">Editar</a>

                        <form action="{{ route('reservas.destroy', $reserva->id) }}" method="post" class="d-inline">
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

