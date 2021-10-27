<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['nombre'];

    public $timestamps = false;

    public function Products()
    {
        return $this->hasMany('App\Product');
    }
}
