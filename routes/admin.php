<?php

Route::prefix('/admin')->group(function(){
    Route::get('/', 'Admin\DashboardController@getDashboard')->name('dashboard');
    Route::get('/users', 'Admin\UserController@getUsers')->name('user_list');
    
    //modulo Productos
    Route::get('/products', 'Admin\ProductController@getHome')->name('products');
    Route::get('/product/add', 'Admin\ProductController@getProductAdd')->name('prod_add');
    Route::post('/product/add', 'Admin\ProductController@postProductAdd')->name('prod_add');
    Route::get('/products/{id}/edit', 'Admin\ProductController@getProductEdit')->name('prod_edit');
    Route::post('/products/{id}/edit', 'Admin\ProductController@postProductEdit')->name('prod_edit');
    Route::get('/products/{id}/delete', 'Admin\ProductController@getProductDelete')->name('prod_delete');

    //modulo categorias
    Route::get('/categorias', 'Admin\CategoriaController@getHome')->name('cat');
    Route::post('/categoria/add', 'Admin\CategoriaController@postCategoriaAdd')->name('cat_add');
    Route::get('/categorias/{id}/edit', 'Admin\CategoriaController@getCategoriaEdit')->name('cat_edit');
    Route::post('/categorias/{id}/edit', 'Admin\CategoriaController@postCategoriaEdit')->name('cat_edit');
    Route::get('/categorias/{id}/delete', 'Admin\CategoriaController@getCategoriaDelete')->name('cat_delete');
});