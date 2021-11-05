<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Kegiatan;
use App\Models\DetailAlat as ModelsDetailAlat;

class DetailAlat extends Component
{
    public $kegiatanID,$selectedID,$alatID,$events,$kelompokKegiatan,$periode;
    public $editMode = false;

    protected $rules = [
        'kegiatanID' => 'required',
        'kelompokKegiatan'  => 'required',
        'periode'           => 'required'
    ];

    protected $listeners = ['destroy'];

    public function render()
    {
        $toolDetails = ModelsDetailAlat::with(['alat','kegiatan'])->where('alat_id',$this->alatID)->get();
        return view('livewire.alat.show',compact('toolDetails'));
    }

    public function mount($id)
    {
        $this->alatID = $id;
        $this->events = Kegiatan::all();
    }

    public function alertConfirm($id)
    {
        $this->selectedID = $id;

        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',  
            'message' => 'Apakah Kamu Yakin ?', 
            'text' => 'Jika terhapus, Kamu tidak bisa mengembalikannya lagi'
        ]);
    }

    public function alert($status)
    {
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Data Berhasil '.$status
        ]);
    }

    public function resetInput()
    {
        $this->kegiatanID       = null;
        $this->kelompokKegiatan = null;
        $this->periode          = null;
    }

    public function create()
    {
        $this->resetInput();
        $this->editMode = false;
    }

    public function store()
    {
        ModelsDetailAlat::create([
            'alat_id'           => $this->alatID,
            'kegiatan_id'       => $this->kegiatanID,
            'kelompok_kegiatan' => $this->kelompokKegiatan,
            'periode'           => $this->periode,
        ]);

        $this->resetInput();
        $this->alert('Ditambahkan');
    }

    public function edit($id)
    {
        $event = ModelsDetailAlat::findOrFail($id);
        $this->selectedID = $event->id;
        $this->kegiatanID = $event->kegiatan_id;
        $this->kelompokKegiatan = $event->kelompok_kegiatan;
        $this->periode = $event->periode;
        $this->editMode = true;
    }

    public function update()
    {
        $event = ModelsDetailAlat::findOrFail($this->selectedID);
        $event->update([
            'kegiatan_id'       => $this->kegiatanID,
            'kelompok_kegiatan' => $this->kelompokKegiatan,
            'periode'           => $this->periode,
        ]);

        $this->editMode = false;
        $this->alert('Diubah');
    }

    public function destroy()
    {
        ModelsDetailAlat::destroy($this->selectedID);
        $this->alert('Dihapus');
    }
}
