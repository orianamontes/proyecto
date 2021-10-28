<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['nombre', 'Descripcion', 'precio', 'stock', 'imagen', 'imagen_ruta', 'estado'];
    
    public $timestamps = false;

    public function Orden_productos()
    {
        return $this->hasMany('App\Orden_producto');
    }
    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }
}
