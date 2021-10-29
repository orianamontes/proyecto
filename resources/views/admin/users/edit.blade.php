@extends('admin.master')

@section('title', 'Usuarios')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ url('/admin/users') }}"><i class=" fas fa-users"></i> Usuarios</a>
</li>
<li class="breadcrumb-item">
    <a href="#"><i class="far fa-edit"></i> Modificar Usuarios</a>
</li>
@endsection

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-md-5">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title">Modificar Usuarios</h2>
                </div>

                <div class="inside">
                    {!! Form::open(['url' => '/admin/users/'.$u->id.'/edit']) !!}

                    {!! Form::label('nombre', 'Nombre completo', ['class' => 'p5']) !!}
                    <span class="red-require">✱</span>
                    <div class="input-group">
                        {!! Form::text('nombre', $u->nombre , ['class' => 'form-control', 'required',
                        'placeholder'=>'Ana Maria Lopez']) !!}
                    </div>

                    {!! Form::label('dni', 'DNI', ['class' => 'mtop12 p5']) !!}
                    <span class="red-require">✱</span>
                    <div class="input-group">
                        {!! Form::text('dni', $u->dni , ['class' => 'form-control', 'required',
                        'placeholder'=>'00012345']) !!}
                    </div>

                    {!! Form::label('correo', 'Correo Electrónico', ['class' => 'mtop12 p5']) !!}
                    <span class="red-require">✱</span>
                    <div class="input-group">
                        {!! Form::email('correo', $u->correo , ['class' => 'form-control', 'required',
                        'placeholder'=>'ejemplo@ejemplo.com']) !!}
                    </div>

                    {!! Form::label('password', 'Contraseña', ['class' => 'mtop12 p5']) !!}
                    <div class="input-group">
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>

                    {!! Form::label('estado', 'Estado', ['class' => 'mtop12 p5']) !!}
                    <div class="input-group">
                        {!! Form::select('estado', ['1'=> 'Activo', '0'=>'No activo'], $u->estado , ['class'
                        => 'form-select']) !!}
                    </div>

                    {!! Form::submit('Modificar', ['class' => 'btn btn-success mtop12']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    @endsection