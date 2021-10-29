<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Product;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function getHome(){
        $cats = Categoria::where('estado', '1')->orderBy('nombre', 'Asc')->get();
        $prods = Product::where('estado', '1')->get();
        $data = ['cats'=>$cats, 'prods'=>$prods];
        return view('home', $data);

    }

    public function getUs(){
        return view('us');
    }
}
