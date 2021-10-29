@extends('admin.master')

@section('title', 'Usuarios')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ url('/admin/users') }}"><i class=" fas fa-users"></i> Usuarios</a>
</li>
<li class="breadcrumb-item">
    <a href="{{ url('/admin/user/add') }}"><i class="fas fa-plus"></i> Agregar administrador</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-5">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title">Agregar administrador</h2>
                </div>
        
                <div class="inside">
                    {!! Form::open(['url' => '/admin/user/add']) !!}
        
                    {!! Form::label('nombre', 'Nombre completo', ['class' => 'p5']) !!}
                    <span class="red-require">✱</span>
                    <div class="input-group">
                        {!! Form::text('nombre', null , ['class' => 'form-control', 'required', 'placeholder'=>'Ana Maria Lopez']) !!}
                    </div>
        
                    {!! Form::label('dni', 'DNI', ['class' => 'mtop12 p5']) !!}
                    <span class="red-require">✱</span>
                    <div class="input-group">
                        {!! Form::text('dni', null , ['class' => 'form-control', 'required', 'placeholder'=>'00012345']) !!}
                    </div>
        
                    {!! Form::label('correo', 'Correo Electrónico', ['class' => 'mtop12 p5']) !!}
                    <span class="red-require">✱</span>
                    <div class="input-group">
                        {!! Form::email('correo', null, ['class' => 'form-control', 'required',
                        'placeholder'=>'ejemplo@ejemplo.com']) !!}
                    </div>
        
                    {!! Form::label('password', 'Contraseña', ['class' => 'mtop12 p5']) !!}
                    <span class="red-require">✱</span>
                    <div class="input-group">
                        {!! Form::password('password', ['class' => 'form-control', 'required']) !!}
                    </div>
        
                    {!! Form::submit('Agregar', ['class' => 'btn btn-success mtop12']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-7"></div>
    </div>
</div>
@endsection