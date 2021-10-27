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
            <table class="table">
            </table>
        </div>
    </div>
</div>
@endsection