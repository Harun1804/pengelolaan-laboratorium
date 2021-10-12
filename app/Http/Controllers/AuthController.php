<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Personil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->route('petugas.dashboard');
            }
        }else{
            return redirect()->back()->with('failed','Gagal Login Cek Kembali Username dan Password Anda!!!');
        }
    }

    public function registrasi(RegisterRequest $request)
    {
        $user = User::create([
            'username' => $request->validated()['username'],
            'email' => $request->validated()['email'],
            'password' => Hash::make($request->validated()['password']),
            'role' => 'petugas',
        ]);

        Personil::create([
            'nama_petugas' => $request->validated()['fullname'],
            'user_id' => $user->id
        ]);

        return redirect()->route('login')->with('success','Pendaftaran Telah Berhasil, Silahkan Login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success','Berhasil Logout');
    }
}
