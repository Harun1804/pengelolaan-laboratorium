<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('admin.dashboard');
    }

    public function registrasi(Request $request)
    {
        # code...
    }

    public function logout(Request $request)
    {
        # code...
    }
}
