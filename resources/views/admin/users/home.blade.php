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
            <table class="table">
                <thead>
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
                        <td>{{ $user->estado }}</td>
                        <td>{{ $user->rol_id }}</td>
                        <td>
                            <div class="opts">
                                <a href="{{ url('/admin/users/'.$user->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar"><i class="far fa-edit"></i></a>
                                <a href="{{ url('/admin/users/'.$user->id.'/delete') }}"data-toggle="tooltip" data-placement="top" title="Eliminar"><i
                                        class="far fa-trash-alt"></i></a>
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