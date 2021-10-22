<?php

namespace App\Http\Controllers\Patologi;

use App\Models\Alat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DetailAlat;
use Barryvdh\DomPDF\Facade as PDF;

class ResumeController extends Controller
{
    public function daftarAlat(Request $request)
    {
        $filter = $request->segment(2);
        $kategori = $request->segment(3);
        $tools = null;
        if ($filter == "kimia") {
            $tools = Alat::where('jenis',"kimia klinik")->get();
        }else{
            $tools = Alat::where('jenis',$filter)->get();
        }
        return view('laporan.daftar',compact(['tools','kategori','filter']));
    }

    public function review($kategori,$id,Request $request)
    {
        $filter = $request->segment(2);
        $tools = DetailAlat::with(['alat','kegiatan'])->where('alat_id',$id)->get();

        return view('laporan.review',compact(['filter','tools','kategori','id']));
    }

    public function cetak($kategori,$id,Request $request)
    {
        $filter = $request->segment(2);
        $tools = DetailAlat::with(['alat','kegiatan'])->where('alat_id',$id)->get();
        $alat = Alat::findOrFail($id);
        $pdf = PDF::loadview('laporan.cetak',compact(['filter','tools','kategori']));
        return $pdf->setPaper('a4', 'landscape')->download('Laporan '.$kategori.' alat '.$alat->nama_alat.'.pdf');
    }
}
