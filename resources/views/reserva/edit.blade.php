    @extends('layouts.app')

    @section('content')
    <div class="row">
        <div class="col-12">
            <div>
                <h2>Editar Reserva</h2>
            </div>
            <div>
                <a href="{{ route('reservas.index') }}" class="btn btn-primary">Volver</a>
            </div>
        </div>

        <form action="{{ route('reservas.update', $reserva->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 mt-2">
                    <div class="form-group">
                        <strong>Cliente:</strong>
                        <select name="id_cliente" class="form-select" required>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}" {{ $reserva->id_cliente == $cliente->id ? 'selected' : '' }}>
                                    {{ $cliente->usuario->nombre_usuario }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 mt-2">
                    <div class="form-group">
                        <strong>Fecha de Reserva:</strong>
                        <input type="date" name="fecha_reserva" class="form-control" value="{{ $reserva->fecha_reserva }}" required>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 mt-2">
                    <div class="form-group">
                        <strong>Cantidad de Habitaciones:</strong>
                        <input type="number" name="cant_habit" class="form-control" value="{{ $reserva->cant_habit }}" required>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 mt-2">
                    <div class="form-group">
                        <strong>Adultos:</strong>
                        <input type="number" name="adultos" class="form-control" value="{{ $reserva->adultos }}" required>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 mt-2">
                    <div class="form-group">
                        <strong>Niños:</strong>
                        <input type="number" name="ninos" class="form-control" value="{{ $reserva->ninos }}" required>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 mt-2">
                    <div class="form-group">
                        <strong>Fecha de Inicio:</strong>
                        <input type="date" name="fecha_inicio" class="form-control" value="{{ $reserva->fecha_inicio }}" required>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 mt-2">
                    <div class="form-group">
                        <strong>Fecha de Fin:</strong>
                        <input type="date" name="fecha_fin" class="form-control" value="{{ $reserva->fecha_fin }}" required>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 mt-2">
                    <div class="form-group">
                        <strong>Valor:</strong>
                        <input type="number" name="valor" class="form-control" value="{{ $reserva->valor }}" required>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 mt-2">
                    <div class="form-group">
                        <strong>Estado de Reserva:</strong>
                        <select name="id_estado" class="form-select" required>
                            @foreach($estadosReserva as $estadoReserva)
                                <option value="{{ $estadoReserva->id }}" {{ $reserva->id_estado == $estadoReserva->id ? 'selected' : '' }}>
                                    {{ $estadoReserva->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Otros campos que puedas tener -->

                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                    <button type="submit" class="btn btn-primary">Actualizar Reserva</button>
                </div>
            </div>
        </form>
    </div>
    @endsection
