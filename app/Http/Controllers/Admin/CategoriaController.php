<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categoria;
use Validator;

class CategoriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin');
    }
    public function getHome()
    {
        $categorias = Categoria::orderBy('id', 'Asc')->get();
        $data = ['categorias' => $categorias];
        return view('admin.categorias.home', $data);
    }

    public function postCategoriaAdd(Request $request)
    {
        $rules = [
            'nombre' => 'required'
        ];

        $messages = [
            'nombre.required' => 'Ingrese un nombre para la categoria.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) :
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger');
        else :
            $c = new Categoria;
            $c->nombre = e($request->input('nombre'));
            if ($c->save()) :
                return back()->with('message', 'Categoria agregada con éxito')->with('typealert', 'success');
            endif;
        endif;
    }

    public function getCategoriaEdit($id)
    {
        $cat = Categoria::find($id);
        $data = ['cat' => $cat];
        return view('admin.categorias.edit', $data);
    }

    public function postCategoriaEdit(Request $request, $id)
    {
        $rules = [
            'nombre' => 'required'
        ];

        $messages = [
            'nombre.required' => 'Ingrese un nombre para la categoria.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) :
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger');
        else :
            $c = Categoria::find($id);
            $c->nombre = e($request->input('nombre'));
            if ($c->save()) :
                return redirect('/admin/categorias')->with('message', 'Categoria modificada con éxito')->with('typealert', 'success');
            endif;
        endif;
    }

    public function getCategoriaDelete($id)
    {
        $c = Categoria::find($id);
        if ($c->delete()) :
            return redirect('/admin/categorias')->with('message', 'Categoria borrada con éxito')->with('typealert', 'success');
        endif;
    }
}
