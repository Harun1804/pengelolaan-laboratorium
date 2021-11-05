<?php namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Personil as ModelPersonil;

class Personil extends Component
{
    public $jabatan, $nip, $nama, $selectedID;
    public $editMode = false;

    protected $rules = [
        'jabatan'   => 'required',
        'nip'       => 'required',
        'nama'      => 'required'
    ];

    public function render()
    {
        $personils = ModelPersonil::get();
        return view('livewire.personil.index',compact('personils'));
    }

    public function resetInput()
    {
        $this->jabatan  = null;
        $this->nip      = null;
    }

    public function edit($id)
    {
        $personil = ModelPersonil::findOrFail($id);
        $this->selectedID   = $personil->id;
        $this->nama         = $personil->nama_petugas;
        $this->jabatan      = $personil->jabatan;
        $this->nip          = $personil->nip;
        $this->editMode     = true;
    }

    public function update()
    {
        $this-> validate();
        $personil = ModelPersonil::updateOrCreate([
            'id' => $this->selectedID
        ],[
            'nama_petugas'  => $this->nama,
            'jabatan'       => $this->jabatan,
            'nip'           => $this->nip,
        ]);

        $this->resetInput();
        $this->editMode = false;
        session()->flash('success','Data Berhasil Ditambahkan');
    }
}
