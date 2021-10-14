<?php

namespace App\Http\Controllers\Patologi;

use App\Models\Alat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AlatKegiatan;
use App\Models\DetailAlat;
use App\Models\Kegiatan;

class ResumeController extends Controller
{
    public function maintenance(Request $request)
    {
        $filter = $request->segment(2);
        $kategori = $request->segment(3);
        $tools = null;
        if ($filter == "kimia") {
            $tools = Alat::where('jenis',"kimia klinik")->get();
        }else{
            $tools = Alat::where('jenis',$filter)->get();
        }
        return view('laporan.maintenance',compact(['tools','kategori','filter']));
    }

    public function review($kategori,$id,Request $request)
    {
        $filter = $request->segment(2);
        $tools = DetailAlat::with(['alat','kegiatan'])->where('alat_id',$id)->get();

        return view('laporan.review.maintenance',compact(['filter','tools']));
    }
}
