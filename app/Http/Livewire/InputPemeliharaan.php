<?php namespace App\Http\Livewire;

use App\Models\Alat;
use Livewire\Component;
use App\Models\DetailAlat;

class InputPemeliharaan extends Component
{
    public $itemId,$alat,$kategori,$jadwal;
    public $kegiatan_id = [];

    public function render()
    {
        return view('livewire.patologi.pemeliharaan');
    }

    public function mount($id,$kategori)
    {
        $this->itemId = $id;
        $this->alat = DetailAlat::with(['kegiatan','alat'])->where('alat_id',$id)->get();
        if ($kategori == "pemeliharaan") {
            $this->kategori = "pemeliharaan";
        }
    }

    public function resetInput()
    {
        $this->jadwal = null;
        $this->kegiatan_id = [];
    }

    public function store()
    {
        $personilID = null;
        if(auth()->user()->personil != null){
            $personilID = auth()->user()->personil->id;
        }

        foreach($this->kegiatan_id as $kegiatan){
            $data = [
                [
                    'personil_id' => $personilID,
                    'kegiatan_id' => $kegiatan,
                    'tanggal_cek' => $this->jadwal
                ]
            ];

            $alat = Alat::findOrFail($this->itemId);
            $alat->kegiatan()->attach($data);
        }

        $this->resetInput();
        session()->flash('success','Data Berhasil Ditambahkan');
        return redirect()->back();
    }
}
