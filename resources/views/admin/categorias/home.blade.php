@extends('admin.master')

@section('title', 'Categorias')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ url('/admin/categorias') }}"><i class="fas fa-folder-open"></i> Categorias</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title"><i class="fas fa-plus"></i> Agregar Categorias</h2>
                </div>
                <div class="inside">
                    {!! Form::open(['url' => '/admin/categoria/add']) !!}

                    {!! Form::label('nombre', 'Nombre', ['class' => 'p5']) !!}
                    <div class="input-group">
                        {!! Form::text('nombre', null , ['class' => 'form-control']) !!}
                    </div>
                    {!! Form::submit('Agregar', ['class' => 'btn btn-outline-success mtop12']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title"><i class="fas fa-plus"></i> Listado de Categorias</h2>
                </div>
                <div class="inside">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <td>ID</td>
                                <td>NOMBRE</td>
                                <td width="150"></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorias as $categoria)
                            <tr>
                                <td>{{ $categoria->id }}</td>
                                <td>{{ $categoria->nombre }}</td>
                                <td>
                                    <div class="opts">
                                        <a href="{{ url('/admin/categorias/'.$categoria->id.'/edit') }}"
                                            data-toggle="tooltip" data-placement="top" title="Editar"><i
                                                class="far fa-edit"></i></a>
                                        <a href="{{ url('/admin/categorias/'.$categoria->id.'/delete') }}"
                                            data-toggle="tooltip" data-placement="top" title="Eliminar"><i
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

    </div>
</div>
@endsection