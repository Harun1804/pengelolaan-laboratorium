<div class="row">
    @if (session('success'))
        <div class="col-md-12">
            <div class="alert alert-success">{{ session('success') }}</div>
        </div>
    @endif
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
                            <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Detail Alat
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
                                    </td>
                                    <td>{{ $alat->kegiatan->nama_kegiatan }}</td>
                                    <td>{{ $alat->kegiatan->kelompok_kegiatan }}</td>
                                    <td>{{ $alat->kegiatan->kategori }}</td>
                                    <td>{{ $alat->kegiatan->periode }}</td>
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