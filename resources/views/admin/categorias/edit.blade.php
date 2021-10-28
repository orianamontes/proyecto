@extends('admin.master')

@section('title', 'Categorias')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ url('/admin/categorias') }}"><i class="fas fa-folder-open"></i> Categorias</a>
</li>
<li class="breadcrumb-item">
    <a href="#"><i class="far fa-edit"></i> Editar Categorias</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title"><i class="far fa-edit"></i> Editar Categorias</h2>
                </div>
                <div class="inside">
                    {!! Form::open(['url' => '/admin/categorias/'.$cat->id.'/edit']) !!}

                    {!! Form::label('nombre', 'Nombre', ['class' => 'p5']) !!}
                    <div class="input-group">
                        {!! Form::text('nombre', $cat->nombre , ['class' => 'form-control']) !!}
                    </div>
                    {!! Form::label('estado', 'Estado', ['class' => 'mtop12 p5']) !!}
                    <div class="input-group">
                        {!! Form::select('estado', ['1'=> 'Activo', '0'=>'No activo'], $cat->estado , ['class' => 'form-select', 'required']) !!}
                    </div>
                    {!! Form::submit('Modificar', ['class' => 'btn btn-outline-success mtop12']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection