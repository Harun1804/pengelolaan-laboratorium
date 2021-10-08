<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        return view('homepage.home');
    }

    public function about()
    {
        return view('homepage.about');
    }

    public function auth()
    {
        return view('homepage.auth');
    }
}
