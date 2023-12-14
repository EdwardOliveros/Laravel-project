@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>Lista de Roles</h2>
        </div>
        <div>
            <a href="{{ route('roles.create') }}" class="btn btn-primary">Crear Rol</a>
        </div>
    </div>

    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>ID</th>
                <th>Nombre del Rol</th>
                <th>Descripción</th>
                <th>Acción</th>
            </tr>
            @foreach($roles as $rol)
                <tr>
                    <td class="fw-bold">{{ $rol->id }}</td>
                    <td>{{ $rol->nombre_rol }}</td>
                    <td>{{ $rol->descripcion }}</td>
                    <td>
                        <a href="{{ route('roles.edit', $rol->id) }}" class="btn btn-warning">Editar</a>

                        <form action="{{ route('roles.destroy', $rol->id) }}" method="post" class="d-inline">
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
