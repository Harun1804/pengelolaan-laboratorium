<?php

namespace App\Http\Controllers\Patologi;

use App\Http\Controllers\Controller;
use App\Models\Alat;
use App\Models\DetailAlat;
use Illuminate\Http\Request;

class PatologiController extends Controller
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
        return view('patologi.maintenance',compact(['tools','kategori','filter']));
    }

    public function detail($kategori,$id,Request $request)
    {
        $filter = $request->segment(2);
        $alat = DetailAlat::with(['alat','kegiatan'])->where('alat_id',$id)->get();
        return view('patologi.detail',compact(['alat','id','filter']));
    }

    public function inputData(Request $request)
    {
        $personilID = null;
        if(auth()->user()->personil != null){
            $personilID = auth()->user()->personil->id;
        }
        
        foreach($request->kegiatan_id as $kegiatan){
            $data = [
                [
                    'personil_id' => $personilID,
                    'kegiatan_id' => $kegiatan,
                    'tanggal_cek' => $request->jadwal
                ]
            ];

            $alat = Alat::findOrFail($request->id);
            $alat->kegiatan()->attach($data);
        }

        return redirect()->back()->with('success','Data Berhasil Ditambahkan');
    }
}
