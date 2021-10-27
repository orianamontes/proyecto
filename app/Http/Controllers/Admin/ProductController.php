<?php

namespace App\Http\Controllers\Admin;

use App\Categoria;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Validator, Str, Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin');
    }

    public function getHome()
    {
        return view('admin.products.home');
    }
    public function getProductAdd()
    {
        $cat = Categoria::where('estado', '1')->pluck('nombre', 'id');
        $data = ['cat' => $cat];
        return view('admin.products.add', $data);
    }
    public function postProductAdd(Request $request)
    {
        $rules = [
            'nombre' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required',
            'precio' => 'required',
            'stock' => 'required|integer',
            'imagen' => 'required'
        ];

        $messages = [
            'nombre.required' => 'Ingrese un nombre para el producto.',
            'descripcion.required' => 'Ingrese una descripcion.',
            'categoria.required' => 'Seleccione una categoria.',
            'precio.required' => 'Ingrese el precio del producto',
            'stock.required' => 'Ingrese el stock del producto',
            'stock.integer' => 'Entrada inválida en el campo stock',
            'imagen.required' => 'Elija una imagen de referencia'
            
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) :
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else :

            $path = '/'.date('Y-m-d');
            $fileExt = trim($request->file('imagen')->getClientOriginalExtension());
            $upload_path = Config::get('filesystems.disks.uploads.root');
            $name = Str::slug(str_replace($fileExt,' ', $request->file('imagen')->getClientOriginalName()));
            $filename = rand(1, 999).'-'.$name.'.'.$fileExt;

            //creando miniaturas a partir de las imagenes guardadas
            $file_file = $upload_path.'/'.$path.'/'.$filename;

            $p = new Product;
            $p->nombre = e($request->input('nombre'));
            $p->descripcion = e($request->input('descripcion'));
            $p->categoria_id = $request->input('categoria');
            $p->precio = e($request->input('precio'));
            $p->stock = e($request->input('stock'));
            $p->imagen = $filename;
            if ($p->save()) :
                if($request->hasFile('imagen')): 
                    $fl = $request->imagen->storeAs($path, $filename, 'uploads');
                    $img = Image::make($file_file);
                    $img->resize(256,256, function($constrain){
                        $constrain->upsize();
                    });
                    $img->save($upload_path.'/'.$path.'/t_'.$filename);
                endif;
                return redirect('/admin/products')->with('message', 'Categoria agregada con éxito')->with('typealert', 'success');
            endif;
        endif;
    }
}
