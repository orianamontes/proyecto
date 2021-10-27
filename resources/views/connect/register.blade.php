@extends('connect.master')

@section('title', 'Registrarse')

@section('content')
<div class="box shadow">
    <div class="header">
    </div>
    <div class="inside">
        {!! Form::open(['url' => '/register']) !!}

        <div class="form-section">
            <span>Registro</span>
        </div>

        {!! Form::label('nombre', 'Nombre completo', ['class' => 'p5']) !!}
        <span class="red-require">✱</span>
        <div class="input-group">
            {!! Form::text('nombre', null , ['class' => 'form-control', 'required', 'placeholder'=>'Ana Maria Lopez']) !!}
        </div>

        {!! Form::label('dni', 'DNI', ['class' => 'mtop16 p5']) !!}
        <span class="red-require">✱</span>
        <div class="input-group">
            {!! Form::text('dni', null , ['class' => 'form-control', 'required', 'placeholder'=>'00012345']) !!}
        </div>

        {!! Form::label('correo', 'Correo Electrónico', ['class' => 'mtop16 p5']) !!}
        <span class="red-require">✱</span>
        <div class="input-group">
            {!! Form::email('correo', null, ['class' => 'form-control', 'required', 'placeholder'=>'ejemplo@ejemplo.com']) !!}
        </div>

        {!! Form::label('password', 'Contraseña', ['class' => 'mtop16 p5']) !!}
        <span class="red-require">✱</span>
        <div class="input-group">
            {!! Form::password('password', ['class' => 'form-control', 'required']) !!}
        </div>

        {!! Form::submit('Registrarse', ['class' => 'btn btn-success mtop16']) !!}
        {!! Form::close() !!}

        @if (Session::has('message'))
        <div class="container">
            <div class="mtop16 alert alert-{{ Session::get('typealert') }}" style="display: none">
                {{ Session::get('message') }}
                @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <script>
                    $('.alert').slideDown();
                setTimeout(function(){ $('.alert').slideUp(); }, 10000);
                </script>
            </div>
        </div>
        @endif

    </div>
    <div class="footer">
        ¿Ya tienes una cuenta?
        <a href="{{ url('/login') }}">Inicia Sesión</a>
    </div>
</div>
@stop