@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>Lista de Usuarios</h2>
        </div>
        <div>
            <a href="{{ route('usuarios.create') }}" class="btn btn-primary">Crear Usuario</a>
        </div>
    </div>

    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>ID</th>
                <th>Rol</th>
                <th>Tipo de Documento</th>
                <th>Número de Documento</th>
                <th>Nombres</th>
                <th>Correo</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>Nombre de Usuario</th>
                <th>Acción</th>
            </tr>
            @foreach($usuarios as $usuario)
                <tr>
                    <td class="fw-bold">{{ $usuario->id }}</td>
                    <td>{{ $usuario->rol->nombre_rol }}</td>
                    <td>{{ $usuario->tipo_doc }}</td>
                    <td>{{ $usuario->num_doc }}</td>
                    <td>{{ $usuario->nombres }}</td>
                    <td>{{ $usuario->correo }}</td>
                    <td>{{ $usuario->apellido }}</td>
                    <td>{{ $usuario->telefono }}</td>
                    <td>{{ $usuario->nombre_usuario }}</td>
                    <td>
                        <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning">Editar</a>

                        <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="post" class="d-inline">
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
