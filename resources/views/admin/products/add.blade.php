@extends('admin.master')

@section('title', 'Productos')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ url('/admin/products') }}"><i class="fas fa-birthday-cake"></i> Productos</a>
</li>
<li class="breadcrumb-item">
    <a href="{{ url('/admin/product/add') }}"><i class="fas fa-plus"></i> Agregar productos</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title">Agregar producto</h2>
        </div>

        <div class="inside">
            {!! Form::open(['url' => '/admin/product/add']) !!}

            <div class="row">
                <div class="col-md-4">
                    {!! Form::label('nombre', 'Nombre', ['class' => 'p5']) !!}
                    <span class="red-require">✱</span>
                    <div class="input-group">
                        {!! Form::text('nombre', null , ['class' => 'form-control', 'required']) !!}
                    </div>
                </div>
                <div class="col-md-5">
                    {!! Form::label('descripcion', 'Descripcion', ['class' => 'p5']) !!}
                      <div class="input-group">
                        {!! Form::text('descripcion', null , ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-3">
                    {!! Form::label('categoria', 'Categoria', ['class' => 'p5']) !!}
                    <span class="red-require">✱</span>
                    <div class="input-group">
                        {{-- {!! Form::text('categoria', null , ['class' => 'form-control', 'required']) !!} --}}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    {!! Form::label('precio', 'Precio', ['class' => 'p5']) !!}
                    <span class="red-require">✱</span>
                    <div class="input-group">
                        {!! Form::number('precio', null , ['class' => 'form-control', 'required', 'min'=> '0.00', 'step'=> 'any']) !!}
                    </div>
                </div>
                <div class="col-md-2">
                    {!! Form::label('stock', 'Stock', ['class' => 'p5']) !!}
                    <span class="red-require">✱</span>
                    <div class="input-group">
                        {!! Form::number('stock', null , ['class' => 'form-control', 'required',  'min'=> '0']) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    {!! Form::label('imagen', 'Imagen de referencia', ['class' => 'p5']) !!}
                    <span class="red-require">✱</span>
                    <div class="input-group">
                        {!! Form::file('imagen',  ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            {!! Form::submit('Agregar', ['class' => 'btn btn-outline-success mtop12']) !!}
        </div>
    </div>

    {!! Form::close() !!}
</div>
</div>
</div>
@endsection