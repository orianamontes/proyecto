<?php

Route::prefix('/admin')->group(function(){
    Route::get('/', 'Admin\DashboardController@getDashboard');
    Route::get('/users', 'Admin\UserController@getUsers');
    
    //modulo Productos
    Route::get('/products', 'Admin\ProductController@getHome');
    Route::get('/product/add', 'Admin\ProductController@getProductAdd');
    Route::post('/product/add', 'Admin\ProductController@postProductAdd');

    //modulo categorias
    Route::get('/categorias', 'Admin\CategoriaController@getHome');
    Route::post('/categoria/add', 'Admin\CategoriaController@postCategoriaAdd');
    Route::get('/categorias/{id}/edit', 'Admin\CategoriaController@getCategoriaEdit');
    Route::post('/categorias/{id}/edit', 'Admin\CategoriaController@postCategoriaEdit');
    Route::get('/categorias/{id}/delete', 'Admin\CategoriaController@getCategoriaDelete');
});