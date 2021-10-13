<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Tambah Data Alat</div>
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" wire:submit.prevent="store">
                    @csrf
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="namaAlat">Nama Alat</label>
                                <input type="text" class="form-control @error('namaAlat') is-invalid @enderror" id="namaAlat" placeholder="Masukan Nama Alat" wire:model="namaAlat" value="{{ old('namaAlat') }}">
                                @error('namaAlat')
                                    <small id="namaAlat" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="gambar">Gambar Alat</label>
                                <input type="file" id="gambar" wire:model="gambar" name="gambar" accept="image/*">
                                @error('gambar')
                                    <small id="namaAlat" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-9">
                            @if ($gambar)
                                <img class="img-upload-preview" width="150" src="{{ $gambar->temporaryUrl() }}" alt="preview">
                            @endif
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="serialNumber">Serial Number</label>
                                <input type="text" class="form-control @error('serialNumber') is-invalid @enderror" id="serialNumber" placeholder="Masukan Serial Number" wire:model="serialNumber" value="{{ old('serialNumber') }}">
                                @error('serialNumber')
                                    <small id="serialNumber" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-check">
                                <label>Jenis</label>
                                <br>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" value="kimia klinik" wire:model="jenis">
                                    <label class="custom-control-label" for="customRadio1">Kimia Klinik</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input" value="hematologi" wire:model="jenis">
                                    <label class="custom-control-label" for="customRadio2">Hematologi</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input" value="urinalis" wire:model="jenis">
                                    <label class="custom-control-label" for="customRadio3">Urinalis</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>