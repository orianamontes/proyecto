<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class ConnectController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except(['getLogout']);
    }

    public function getLogin()
    {
        return view('connect.login');
    }

    public function postLogin(Request $request)
    {
        $rules = [
            'correo' => 'required|email',
            'password' => 'required'
        ];

        $messages = [
            'correo.required' => 'Ingrese su correo electrónico',
            'correo.email' => 'El formato del correo es inválido',
            'password.required' => 'Ingrese una contraseña'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) :
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else :
            if (Auth::attempt(['correo' => $request->input('correo'), 'password' => $request->input('password')], true)) : // redirecciona segun rol 'rol_id' => 1 o 2, pero falta validar el estado inactivo (0)
                if (Auth::user()->rol_id == '1') :
                    return redirect('/admin');
                else :
                    return redirect('/');
                endif;
            else :
                return back()->with('message', 'Credenciales incorrectas o no existen.')->with('typealert', 'danger')->withInput();
            endif;
        endif;
    }

    public function getRegister()
    {
        return view('connect.register');
    }

    // solo se registraran usuarios de tipo usuario
    public function postRegister(Request $request)
    {
        $rules = [
            'nombre' => 'required',
            'dni' => 'required',
            'correo' => 'required|email|unique:App\User,correo',
            'password' => 'required'
        ];

        $messages = [
            'nombre.required' => 'Ingrese su nombre',
            'dni.required' => 'Ingrese su DNI',
            'correo.required' => 'Ingrese su correo electrónico',
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
            $user->rol_id = 2;

            if ($user->save()) :
                return redirect('/login')->with('message', 'Usuario creado con éxito, inicie sesión')->with('typealert', 'success');
            endif;
        endif;
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
