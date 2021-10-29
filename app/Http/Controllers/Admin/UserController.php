<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin');
    }

    public function getUsers()
    {
        $users = User::orderBy('id', 'Asc')->get();
        $data = ['users' => $users];
        return view('admin.users.home', $data);
    }

    public function getUserAdd()
    {
        return view('admin.users.add');
    }

    //solo se crean usuarios del tipo administrador
    public function postUserAdd(Request $request)
    {
        $rules = [
            'nombre' => 'required',
            'dni' => 'required|integer',
            'correo' => 'required|email|unique:App\User,correo',
            'password' => 'required'
        ];

        $messages = [
            'nombre.required' => 'Ingrese un nombre',
            'dni.required' => 'Ingrese DNI',
            'dni.integer' => 'DNI inválido',
            'correo.required' => 'Ingrese correo electrónico',
            'correo.email' => 'El formato del correo es inválido',
            'correo.unique' => 'Ya existe una cuenta con este correo',
            'password.required' => 'Ingrese una contraseña'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) :
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else :
            $user = new User;
            $user->nombre = e($request->input('nombre'));
            $user->dni = e($request->input('dni'));
            $user->correo = $request->input('correo');
            $user->password = Hash::make($request->input('password'));
            $user->rol_id = 1;

            if ($user->save()) :
                return redirect('/admin/users')->with('message', 'Administrador creado con éxito, inicie sesión')->with('typealert', 'success');
            endif;
        endif;
    }


    public function getUserEdit($id)
    {
        $u = User::find($id);
        $data = ['u' => $u];
        return view('admin.users.edit', $data);
    }

    public function postUserEdit($id, Request $request)
    {
        $rules = [
            'nombre' => 'required',
            'dni' => 'required',
            'correo' => 'required'
        ];

        $messages = [
            'nombre.required' => 'Ingrese un nombre',
            'dni.required' => 'Ingrese DNI',
            'correo.required' => 'Ingrese correo electrónico',
            'correo.email' => 'El formato del correo es inválido',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) :
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else :
            $user = User::find($id);
            $user->nombre = e($request->input('nombre'));
            $user->dni = e($request->input('dni'));
            $user->correo = $request->input('correo');
            $user->estado = e($request->input('estado'));
            if (!(empty($request->input('password')))) :
                $user->password = Hash::make($request->input('password'));
            endif;
            

            if ($user->save()) :
                return redirect('/admin/users')->with('message', 'Usuario modificado con éxito')->with('typealert', 'success');
            endif;
        endif;
    }

    public function getUserDelete($id)
    {
        $p = User::find($id);
        $p->estado = "0";
        if ($p->save()) :
            return redirect('/admin/users')->with('message', 'Usuario borrado con éxito')->with('typealert', 'success');
        endif;
    }
}
