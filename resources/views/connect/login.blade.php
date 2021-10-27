@extends('connect.master')

@section('title', 'Login')

@section('content')
<div class="box shadow">
    <div class="header">
    </div>
    <div class="inside">
        {!! Form::open(['url' => '/login']) !!}

        <div class="form-section">
            <span>Inicie Sesión</span>
        </div>

        {!! Form::label('correo', 'Correo Electrónico', ['class' => 'p5']) !!}
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
            </div>
            {!! Form::email('correo', null, ['class' => 'form-control', 'required', 'placeholder'=>'ejemplo@ejemplo.com']) !!}
        </div>

        {!! Form::label('password', 'Contraseña', ['class' => 'mtop16 p5']) !!}
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-lock"></i></div>
            </div>
            {!! Form::password('password', ['class' => 'form-control', 'required']) !!}
        </div>

        {!! Form::submit('Ingresar', ['class' => 'btn btn-success mtop16']) !!}
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
        ¿Aún no tienes una cuenta?
        <a href="{{ url('/register') }}">Registrarse</a>
    </div>
</div>
@stop