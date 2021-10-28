<div class="sidebar shadow">
    <div class="section-top">
        <div class="logo">
            <img src="{{ url('/static/images/logo3.png') }}" alt="" class="img-fluid">
        </div>

        <div class="user">
            <span class="subtitle">Hola </span>
            <div class="name">
                {{ Auth::user()->nombre }}
                <a href="{{ url('/logout') }}" data-toggle="tooltip" data-placement="top" title="Salir"><i
                        class="fas fa-sign-out-alt"></i></a>
            </div>
            <div class="email">
                {{ Auth::user()->correo }}
            </div>
        </div>
    </div>

    <div class="main">
        <ul>
            <li>
                <a href="{{ url('/admin') }}" class="lk-dashboard"><i class="fas fa-home"></i> Home</a>
            </li>
            <li>
                <a href="{{ url('/admin/products') }}" class="lk-products lk-prod_add lk-prod_edit lk-prod_delete"><i
                        class="fas fa-birthday-cake"></i> Productos</a>
            </li>
            <li>
                <a href="{{ url('/admin/categorias') }}" class="lk-cat k-cat_edit lk-cat_delete"><i
                        class="fas fa-folder-open"></i> Categorias</a>
            </li>
            <li>
                <a href="{{ url('/admin/users') }}" class="lk-user_list"><i class=" fas fa-users"></i> Usuarios</a>
            </li>
        </ul>
    </div>

</div>