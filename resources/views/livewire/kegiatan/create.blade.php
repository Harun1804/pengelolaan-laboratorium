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
                                <label>Kelompok Kegiatan</label>
                                <br>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="kelompokKegiatan1" name="kelompokKegiatan" class="custom-control-input" value="pre_on" wire:model="kelompokKegiatan">
                                    <label class="custom-control-label" for="kelompokKegiatan1">Pre On</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="kelompokKegiatan2" name="kelompokKegiatan" class="custom-control-input" value="pre_off" wire:model="kelompokKegiatan">
                                    <label class="custom-control-label" for="kelompokKegiatan2">Pre Off</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="kelompokKegiatan3" name="kelompokKegiatan" class="custom-control-input" value="pre_run" wire:model="kelompokKegiatan">
                                    <label class="custom-control-label" for="kelompokKegiatan3">Pre Run</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="kelompokKegiatan4" name="kelompokKegiatan" class="custom-control-input" value="post_run" wire:model="kelompokKegiatan">
                                    <label class="custom-control-label" for="kelompokKegiatan4">Pre Run</label>
                                </div>
                                @error('kelompokKegiatan')
                                    <small id="kelompokKegiatan" class="form-text text-danger">{{ $message }}</small>
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
                            <div class="form-check">
                                <label>Periode</label>
                                <br>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="periode1" name="periode" class="custom-control-input" value="harian" wire:model="periode">
                                    <label class="custom-control-label" for="periode1">Harian</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="periode2" name="periode" class="custom-control-input" value="mingguan" wire:model="periode">
                                    <label class="custom-control-label" for="periode2">Mingguan</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="periode3" name="periode" class="custom-control-input" value="bulanan" wire:model="periode">
                                    <label class="custom-control-label" for="periode3">Bulanan</label>
                                </div>
                                @error('periode')
                                    <small id="periode" class="form-text text-danger">{{ $message }}</small>
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