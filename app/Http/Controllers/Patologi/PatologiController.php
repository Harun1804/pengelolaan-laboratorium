<?php

namespace App\Http\Controllers\Patologi;

use App\Http\Controllers\Controller;
use App\Models\Alat;
use App\Models\DetailAlat;
use Illuminate\Http\Request;

class PatologiController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->segment(2);
        $kategori = $request->segment(3);
        $tools = null;
        if ($filter == "kimia") {
            $tools = Alat::where('jenis',"kimia klinik")->get();
        }else{
            $tools = Alat::where('jenis',$filter)->get();
        }

        if ($kategori == "maintenance") {
            return view('patologi.maintenance',compact(['tools','kategori','filter']));
        } elseif($kategori == "penggunaan") {
            return view('patologi.penggunaan',compact(['tools','kategori','filter']));
        }
    }

    public function detail($kategori,$id)
    {
        return view('patologi.detail',compact(['id','kategori']));
    }
}
