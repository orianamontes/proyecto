@extends('admin.master')

@section('title', 'Home')

@section('content')
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title">Estadísticas rapidas</h2>
        </div>
    </div>

    <div class="row mtop12">
        <div class="col-md-4">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title"><i class=" fas fa-users"></i> Usuarios registrados</h2>
                </div>
                <div class="inside">
                    <div class="count">
                        <h5>Total de usuarios</h5>
                        {{ $user }}

                        <table class="table">
                            <thead>
                                <tr>
                                    <td scope="col">Administrador</td>
                                    <td scope="col">Usuarios</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $u_admin }}</td>
                                    <td>{{ $u_user }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-4">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title"><i class="fas fa-birthday-cake"></i> Productos</h2>
                </div>
                <div class="inside">
                    <div class="count">
                        {{ $prod }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title"><i class="fas fa-chart-bar"></i> Órdenes hoy</h2>
                </div>
                <div class="inside">
                    <div class="count">
                        0
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection