<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function personil()
    {
        return view('admin.personil');
    }

    public function alat()
    {
        return view('admin.alat');
    }

    public function kegiatan()
    {
        return view('admin.kegiatan');
    }

    public function detailAlat($id)
    {
        return view('admin.detail-alat',compact('id'));
    }
}
