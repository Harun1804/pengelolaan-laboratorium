<div class="row">
    @if (session('success'))
        <div class="col-md-12">
            <div class="alert alert-success">{{ session('success') }}</div>
        </div>
    @endif
    @if ($editMode)
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Ubah Kegiatan Alat</div>
                </div>
                <div class="card-body">
                    <form method="post" wire:submit.prevent="update">
                        @csrf
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="kegiatan">Kegiatan</label>
                                    <select class="form-control" id="kegiatan" wire:model="kegiatanID">
                                        <option>Pilih Kegiatan</option>
                                        @foreach ($events as $kegiatan)
                                            <option value="{{ $kegiatan->id }}" @if($kegiatanID == $kegiatan->id) selected @endif>{{ $kegiatan->nama_kegiatan }}</option>
                                        @endforeach
                                    </select>
                                    @error('kegiatanID')
                                        <small id="kegiatanID" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-check">
                                    <label>Kelompok Kegiatan</label>
                                    <br>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="kelompokKegiatan1" name="kelompokKegiatan" class="custom-control-input" value="pre_on" wire:model="kelompokKegiatan" @if($kelompokKegiatan == "pre_on") checked @endif>
                                        <label class="custom-control-label" for="kelompokKegiatan1">Pre On</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="kelompokKegiatan2" name="kelompokKegiatan" class="custom-control-input" value="pre_off" wire:model="kelompokKegiatan" @if($kelompokKegiatan == "pre_off") checked @endif>
                                        <label class="custom-control-label" for="kelompokKegiatan2">Pre Off</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="kelompokKegiatan3" name="kelompokKegiatan" class="custom-control-input" value="pre_run" wire:model="kelompokKegiatan" @if($kelompokKegiatan == "pre_run") checked @endif>
                                        <label class="custom-control-label" for="kelompokKegiatan3">Pre Run</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="kelompokKegiatan4" name="kelompokKegiatan" class="custom-control-input" value="post_run" wire:model="kelompokKegiatan" @if($kelompokKegiatan == "post_run") checked @endif>
                                        <label class="custom-control-label" for="kelompokKegiatan4">Pre Run</label>
                                    </div>
                                    @error('kelompokKegiatan')
                                        <small id="kelompokKegiatan" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-check">
                                    <label>Periode</label>
                                    <br>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="periode1" name="periode" class="custom-control-input" value="harian" wire:model="periode" @if($periode == "harian") checked @endif>
                                        <label class="custom-control-label" for="periode1">Harian</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="periode2" name="periode" class="custom-control-input" value="mingguan" wire:model="periode" @if($periode == "mingguan") checked @endif>
                                        <label class="custom-control-label" for="periode2">Mingguan</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="periode3" name="periode" class="custom-control-input" value="bulanan" wire:model="periode" @if($periode == "bulanan") checked @endif>
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
    @else
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Tambah Kegiatan Alat</div>
                </div>
                <div class="card-body">
                    <form method="post" wire:submit.prevent="store">
                        @csrf
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="kegiatan">Kegiatan</label>
                                    <select class="form-control" id="kegiatan" wire:model="kegiatanID">
                                        <option>Pilih Kegiatan</option>
                                        @foreach ($events as $kegiatan)
                                            <option value="{{ $kegiatan->id }}">{{ $kegiatan->nama_kegiatan }}</option>
                                        @endforeach
                                    </select>
                                    @error('kegiatanID')
                                        <small id="kegiatanID" class="form-text text-danger">{{ $message }}</small>
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
    @endif

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Detail Alat
                    <div class="float-right">
                        <button class="btn btn-sm btn-primary" type="button" wire:click="create()">Tambah</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-head-bg-black mt-4">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Action</th>
                                <th scope="col">Nama Kegiatan</th>
                                <th scope="col">Kelompok Kegiatan</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Periode</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($toolDetails as $alat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-danger" type="button" wire:click="alertConfirm({{ $alat->id }})">Delete</button>
                                        <button class="btn btn-sm btn-warning" type="button" wire:click="edit({{ $alat->id }})">Ubah</button>
                                    </td>
                                    <td>{{ $alat->kegiatan->nama_kegiatan }}</td>
                                    <td>{{ $alat->kelompok_kegiatan }}</td>
                                    <td>{{ $alat->kegiatan->kategori }}</td>
                                    <td>{{ $alat->periode }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="empty-data">Belum Ada Data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>