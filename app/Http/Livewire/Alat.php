<?php namespace App\Http\Livewire;

use App\Models\Alat as ModelsAlat;
use Livewire\Component;
use Livewire\WithFileUploads;

class Alat extends Component
{
    use WithFileUploads;

    public $namaAlat,$gambar,$oldImage,$serialNumber,$jenis,$selectedID;
    public $formMode = false;
    public $editMode = false;

    protected $rules = [
        'namaAlat'      => 'required',
        'gambar'        => 'required|image|max:2048',
        'serialNumber'  => 'required',
        'jenis'         => 'required'
    ];

    protected $listeners = ['destroy'];

    public function render()
    {
        $tools = ModelsAlat::all();
        return view('livewire.alat.index',compact('tools'));
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
        $this->namaAlat = null;
        $this->gambar = null;
        $this->serialNumber = null;
        $this->jenis = null;
    }

    public function create()
    {
        $this->formMode = true;
    }

    public function store()
    {
        $gambarFile = $this->gambar->store('img/alat','public');

        ModelsAlat::create([
            'nama_alat' => $this->namaAlat,
            'gambar' => $gambarFile,
            'serial_number' => $this->serialNumber,
            'jenis' => $this->jenis,
        ]);

        $this->formMode = false;
        $this->resetInput();
        $this->alert('Ditambahkan');
    }

    public function show($id)
    {
        return redirect()->route('admin.detail.alat',$id);
    }

    public function edit($id)
    {
        $alat = ModelsAlat::findOrFail($id);
        $this->selectedID = $alat->id;
        $this->namaAlat = $alat->nama_alat;
        $this->oldImage = $alat->gambar;
        $this->serialNumber = $alat->serial_number;
        $this->jenis = $alat->jenis;

        $this->formMode = true;
        $this->editMode = true;
    }

    public function update()
    {
        $alat = ModelsAlat::findOrFail($this->selectedID);
        if ($this->gambar == null) {
            $alat->update([
                'nama_alat' => $this->namaAlat,
                'serial_number' => $this->serialNumber,
                'jenis' => $this->jenis,
            ]);
        } else {
            $text = explode("/",$alat->gambar);
            $path = public_path('storage/img/alat/'.$text[6]);
            unlink($path);
            $gambarFile = $this->gambar->store('img/alat','public');
            $alat->update([
                'nama_alat' => $this->namaAlat,
                'gambar' => $gambarFile,
                'serial_number' => $this->serialNumber,
                'jenis' => $this->jenis,
            ]);
        }

        $this->formMode = false;
        $this->editMode = false;
        $this->resetInput();
        $this->alert('Diperbaharui');
    }

    public function destroy()
    {
        $alat = ModelsAlat::findOrFail($this->selectedID);
        $text = explode("/",$alat->gambar);
        $path = public_path('storage/img/alat/'.$text[6]);
        unlink($path);
        $alat->delete($this->id);
        $this->alert('Dihapus');
    }
}
