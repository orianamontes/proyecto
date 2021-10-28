@extends('admin.master')

@section('title', 'Productos')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ url('/admin/products') }}"><i class="fas fa-birthday-cake"></i> Productos</a>
</li>
<li class="breadcrumb-item">
    <a href="#"><i class="far fa-edit"></i> Modificar productos</a>
</li>
@endsection

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-md-9">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title">Modificar producto</h2>
                </div>

                <div class="inside">
                    {!! Form::open(['url' => '/admin/products/'.$p->id.'/edit', 'files'=> true]) !!}

                    <div class="row">
                        <div class="col-md-4">
                            {!! Form::label('nombre', 'Nombre', ['class' => 'p5']) !!}
                            <span class="red-require">✱</span>
                            <div class="input-group">
                                {!! Form::text('nombre', $p->nombre , ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        <div class="col-md-5">
                            {!! Form::label('descripcion', 'Descripcion', ['class' => 'p5']) !!}
                            <div class="input-group">
                                {!! Form::text('descripcion', $p->descripcion , ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            {!! Form::label('categoria', 'Categoria', ['class' => 'p5']) !!}
                            <span class="red-require">✱</span>
                            <div class="input-group">
                                {!! Form::select('categoria', $cat, $p->categoria_id , ['class' => 'form-select',
                                'required'])
                                !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            {!! Form::label('precio', 'Precio', ['class' => 'mtop12 p5']) !!}
                            <span class="red-require">✱</span>
                            <div class="input-group">
                                {!! Form::number('precio', $p->precio , ['class' => 'form-control', 'required', 'min'=> '0.00','step'=> 'any']) !!}
                            </div>
                        </div>
                        <div class="col-md-2">
                            {!! Form::label('stock', 'Stock', ['class' => 'mtop12 p5']) !!}
                            <span class="red-require">✱</span>
                            <div class="input-group">
                                {!! Form::number('stock', $p->stock , ['class' => 'form-control', 'required', 'min'=>
                                '0']) !!}
                            </div>
                        </div>
                        <div class="col-md-5">
                            {!! Form::label('imagen', 'Imagen de referencia', ['class' => ' mtop12 p5']) !!}
                            <div class="input-group">
                                {!! Form::file('imagen', ['class' => 'form-control', 'accept' => 'image/*']) !!}
                            </div>
                        </div>
                        <div class="col-md-2">
                            {!! Form::label('estado', 'Estado', ['class' => 'mtop12 p5']) !!}
                            <div class="input-group">
                                {!! Form::select('estado', ['1'=> 'Activo', '0'=>'No activo'], $p->estado , ['class'
                                => 'form-select', 'required']) !!}
                            </div>
                        </div>
                    </div>
                    {!! Form::submit('Modificar', ['class' => 'btn btn-outline-success mtop12']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title">Imagen de referencia</h2>
                    <div class="inside">
                        <a data-fancybox="gallery" href="{{ url('/uploads/'.$p->imagen_ruta.'/'.$p->imagen) }}">
                            <img src="{{ url('/uploads/'.$p->imagen_ruta.'/'.$p->imagen) }}" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
</div>
</div>
@endsection