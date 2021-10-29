@extends('master')

@section('title', 'Inicio')

@section('content')
<div class="row">
    <div class="col-md-2">
        <div class="home_action_bar">
            <div class="row">
                <div class="">
                    <div class="categorias">
                        <a class="link" href=""><i class="fas fa-list-ul"></i> Categorias</a>
                        <ul>
                            @foreach ($cats as $cat)
                            <li>
                                <a href="{{ url('#') }}">{{ $cat->nombre }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col md-10">
        <div>
            <div class="row">
                @foreach ($prods as $prod)
                <div class="col-md-4">
                    <div class="card shadow">
                        <img src="{{ url('/uploads/'.$prod->imagen_ruta.'/t_'.$prod->imagen) }}"
                            class="img-fluid card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $prod->nombre }}</h5>
                            <p class="card-text">{{ $prod->descripcion }}</p>
                            <a href="#" class="btn btn-danger">Go somewhere</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>

    @endsection