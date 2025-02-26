<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function AdminLogin(){
 
        return view('admin.admin_login');

    }
}
