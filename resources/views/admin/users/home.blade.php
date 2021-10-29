@extends('admin.master')

@section('title', 'Usuarios')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ url('/admin/users') }}"><i class="fas fa-users"></i> Usuarios</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title">Usuarios</h2>
        </div>

        <div class="inside">
            <div class="botones">
                <a href="{{ url('/admin/user/add') }}" class="btn btn-outline-danger"><i class="fas fa-plus"></i>
                    Agregar Administrador</a>
            </div>
            <table class="table mtop12">
                <thead class="table-light">
                    <tr>
                        <td>ID</td>
                        <td>DNI</td>
                        <td>NOMBRE</td>
                        <td>CORREO</td>
                        <td>ESTADO</td>
                        <td>ROL</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->dni }}</td>
                        <td>{{ $user->nombre }}</td>
                        <td>{{ $user->correo }}</td>
                        <td>
                            @if($user->estado == "1")
                            <span class="badge bg-success">Activo</span>
                            @else
                            <span class="badge bg-danger">No activo</span>
                            @endif
                        </td>
                        <td>
                            @if($user->rol_id == "1")
                            <span class="badge bg-light text-dark">Administrador</span>
                            @else
                            <span class="badge bg-light text-dark">Usuario</span>
                            @endif
                        </td>
                        <td>
                            <div class="opts">
                                <a href="{{ url('/admin/users/'.$user->id.'/edit') }}" data-toggle="tooltip"
                                    data-placement="top" title="Editar"><i class="far fa-edit"></i></a>
                                <a href="{{ url('/admin/users/'.$user->id.'/delete') }}" data-toggle="tooltip"
                                    data-placement="top" title="Eliminar"><i class="far fa-trash-alt"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection