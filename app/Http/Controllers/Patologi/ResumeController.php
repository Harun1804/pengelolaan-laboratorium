<?php

namespace App\Http\Controllers\Patologi;

use App\Models\Alat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DetailAlat;
use App\Models\Personil;
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
        switch ($kategori) {
            case 'penggunaan':
                $kategori = "penggunaan alat";
                break;
            case 'monitoring':
                $kategori = "monitoring dan evaluasi";
                break;
        }
        return view('laporan.daftar',compact(['tools','kategori','filter']));
    }

    public function reviewMaintenance($id,Request $request)
    {
        $filter = $request->segment(2);
        $tools = DetailAlat::with(['alat','kegiatan'])->where('alat_id',$id)->get();

        return view('laporan.maintenance.review',compact(['filter','tools','id']));
    }

    public function reviewPenggunaan($id,Request $request)
    {
        $filter = $request->segment(2);
        $tools = DetailAlat::with(['alat','kegiatan'])->where('alat_id',$id)->get();
        $personil = $tools[0]->alat->kegiatan[0]->pivot->personil_id;
        $petugas = Personil::findOrFail($personil);

        return view('laporan.penggunaan.review',compact(['filter','tools','id','petugas']));
    }

    public function reviewPemeliharaan($id,Request $request)
    {
        $filter = $request->segment(2);
        $tools = DetailAlat::with(['alat','kegiatan'])->where('alat_id',$id)->get();

        return view('laporan.pemeliharaan.review',compact(['filter','tools','id']));
    }

    public function reviewMonitor($id,Request $request)
    {
        $filter = $request->segment(2);
        $tools = DetailAlat::with(['alat','kegiatan'])->where('alat_id',$id)->get();
        $personil = $tools[0]->alat->kegiatan[0]->pivot->personil_id;
        $petugas = Personil::findOrFail($personil);
        return view('laporan.monitoring.review',compact(['filter','tools','id','petugas']));
    }

    public function cetakMaintenance($id,Request $request)
    {
        $filter = $request->segment(2);
        $tools = DetailAlat::with(['alat','kegiatan'])->where('alat_id',$id)->get();
        $alat = Alat::findOrFail($id);
        $pdf = PDF::loadview('laporan.maintenance.cetak',compact(['filter','tools']));
        return $pdf->setPaper('a4', 'landscape')->download('Laporan Maintenance Alat '.$alat->nama_alat.'.pdf');
    }

    public function cetakPenggunaan($id,Request $request)
    {
        $filter = $request->segment(2);
        $tools = DetailAlat::with(['alat','kegiatan'])->where('alat_id',$id)->get();
        $alat = Alat::findOrFail($id);
        $personil = $tools[0]->alat->kegiatan[0]->pivot->personil_id;
        $petugas = Personil::findOrFail($personil);
        $pdf = PDF::loadview('laporan.penggunaan.cetak',compact(['filter','tools','petugas']));
        return $pdf->setPaper('a4', 'landscape')->download('Laporan Penggunaan Alat '.$alat->nama_alat.'.pdf');
    }

    public function cetakPemeliharaan($id,Request $request)
    {
        $filter = $request->segment(2);
        $tools = DetailAlat::with(['alat','kegiatan'])->where('alat_id',$id)->get();
        $alat = Alat::findOrFail($id);
        $pdf = PDF::loadview('laporan.pemeliharaan.cetak',compact(['filter','tools']));
        return $pdf->setPaper('a4', 'landscape')->download('Laporan Pemeliharaan Alat '.$alat->nama_alat.'.pdf');
    }

    public function cetakMonitor($id,Request $request)
    {
        $filter = $request->segment(2);
        $tools = DetailAlat::with(['alat','kegiatan'])->where('alat_id',$id)->get();
        $alat = Alat::findOrFail($id);
        $personil = $tools[0]->alat->kegiatan[0]->pivot->personil_id;
        $petugas = Personil::findOrFail($personil);
        $pdf = PDF::loadview('laporan.monitoring.cetak',compact(['filter','tools','petugas']));
        return $pdf->setPaper('a4', 'landscape')->download('Laporan Monitoring dan Evaluasi Alat '.$alat->nama_alat.'.pdf');
    }
}
