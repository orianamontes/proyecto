@extends('admin.master')

@section('title', 'Productos')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ url('/admin/products') }}"><i class="fas fa-birthday-cake"></i> Productos</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title">Productos</h2>
        </div>

        <div class="inside">
            <div class="botones">
                <a href="{{ url('/admin/product/add') }}" class="btn btn-outline-danger"><i class="fas fa-plus"></i> Agregar Productos</a>
            </div>
            <table class="table mtop12">
                <thead class="table-light">
                    <tr>
                        <td >ID</td>
                        <td >IMAGEN</td>
                        <td >NOMBRE</td>
                        <td >DESCRIPCION</td>
                        <td >PRECIO</td>
                        <td >STOCK</td>
                        <td >CATEGORIA</td>
                        <td >ESTADO</td>
                        <td ></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td >{{ $product->id }}</td>
                        <td width="60">
                            <a data-fancybox="gallery" href="{{ url('/uploads/'.$product->imagen_ruta.'/'.$product->imagen) }}">
                                <img src="{{ url('/uploads/'.$product->imagen_ruta.'/t_'.$product->imagen) }}" width="64" alt="">
                            </a>
                        </td>
                        <td >{{ $product->nombre }}</td>
                        <td width="200">{{ $product->descripcion }}</td>
                        <td>{{ $product->precio }}</td>
                        <td>{{ $product->stock }}</td>
                        <td><span class="badge bg-light text-dark">{{ $product->categoria->nombre }}</span></td>
                        <td>
                            @if($product->estado == "1")
                                <span class="badge bg-success">Activo</span>
                            @else 
                                <span class="badge bg-danger">No activo</span>
                            @endif
                        </td>
                        <td>
                            <div class="opts">
                                <a href="{{ url('/admin/products/'.$product->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar"><i class="far fa-edit"></i></a>
                                <a href="{{ url('/admin/products/'.$product->id.'/delete') }}"data-toggle="tooltip" data-placement="top" title="Eliminar"><i
                                        class="far fa-trash-alt"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="9"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection