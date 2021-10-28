<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin');
    }

    public function getDashboard()
    {
        $user = User::count();
        $u_admin = User::where('rol_id', '1')->count();
        $u_user= User::where('rol_id', '2')->count();
        $prod = Product::count();
        $data = [
            'user' => $user,
            'prod' => $prod,
            'u_admin' => $u_admin,
            'u_user' => $u_user
        ];            
        return view('admin.dashboard', $data);
    }
}
