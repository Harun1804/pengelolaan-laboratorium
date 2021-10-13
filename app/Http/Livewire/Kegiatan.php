<?php

namespace App\Http\Livewire;

use App\Models\Kegiatan as ModelsKegiatan;
use Livewire\Component;

class Kegiatan extends Component
{
    public $namaKegiatan,$kelompokKegiatan,$kategori,$periode,$selectedID;
    public $formMode = false;
    public $editMode = false;

    protected $rules = [
        'namaKegiatan'      => 'required',
        'kelompokKegiatan'  => 'required',
        'kategori'          => 'required',
        'periode'           => 'required'
    ];

    protected $listeners = ['destroy'];

    public function render()
    {
        $events = ModelsKegiatan::all();
        return view('livewire.kegiatan.index',compact('events'));
    }

    public function resetInput()
    {
        $this->namaKegiatan     = null;
        $this->kelompokKegiatan = null;
        $this->kategori         = null;
        $this->periode          = null;
    }

    public function create()
    {
        $this->formMode = true;
    }

    public function store()
    {
        ModelsKegiatan::create([
            'nama_kegiatan'     => $this->namaKegiatan,
            'kelompok_kegiatan' => $this->kelompokKegiatan,
            'kategori'          => $this->kategori,
            'periode'           => $this->periode,
        ]);

        $this->resetInput();
        $this->formMode = false;
        $this->alert('Ditambahkan');
    }

    public function edit($id)
    {
        $kegiatan = ModelsKegiatan::findOrFail($id);
        $this->selectedID       = $kegiatan->id;
        $this->namaKegiatan     = $kegiatan->nama_kegiatan;
        $this->kelompokKegiatan = $kegiatan->kelompok_kegiatan;
        $this->kategori         = $kegiatan->kategori;
        $this->periode          = $kegiatan->periode;
        $this->editMode = true;
        $this->formMode = true;
    }

    public function update()
    {
        $kegiatan = ModelsKegiatan::findOrFail($this->selectedID);
        $kegiatan->update([
            'nama_kegiatan'     => $this->namaKegiatan,
            'kelompok_kegiatan' => $this->kelompokKegiatan,
            'kategori'          => $this->kategori,
            'periode'           => $this->periode,
        ]);
        $this->resetInput();
        $this->editMode = false;
        $this->formMode = false;
        $this->alert('Diperbaharui');
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

    public function destroy()
    {
        ModelsKegiatan::destroy($this->selectedID);
        $this->alert('Dihapus');
    }

    public function alert($status)
    {
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Data Berhasil '.$status
        ]);
    }
}
