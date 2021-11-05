<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Tambah Data Kegiatan</div>
            </div>
            <div class="card-body">
                <form method="post" wire:submit.prevent="store">
                    @csrf
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="namaKegiatan">Nama Kegiatan</label>
                                <input type="text" class="form-control @error('namaKegiatan') is-invalid @enderror" id="namaKegiatan" placeholder="Masukan Nama Kegiatan" wire:model="namaKegiatan" value="{{ old('namaKegiatan') }}">
                                @error('namaKegiatan')
                                    <small id="namaKegiatan" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-check">
                                <label>Kategori</label>
                                <br>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="kategori1" name="kategori" class="custom-control-input" value="maintenance" wire:model="kategori">
                                    <label class="custom-control-label" for="kategori1">Maintenance</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="kategori2" name="kategori" class="custom-control-input" value="monitoring dan evaluasi" wire:model="kategori">
                                    <label class="custom-control-label" for="kategori2">Monitoring dan Evaluasi</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="kategori3" name="kategori" class="custom-control-input" value="penggunaan alat" wire:model="kategori">
                                    <label class="custom-control-label" for="kategori3">Penggunaan Alat</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="kategori4" name="kategori" class="custom-control-input" value="pemeliharaan" wire:model="kategori">
                                    <label class="custom-control-label" for="kategori4">Pemeliharaan</label>
                                </div>
                                @error('kategori')
                                    <small id="kategori" class="form-text text-danger">{{ $message }}</small>
                                @enderror
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