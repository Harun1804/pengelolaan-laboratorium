<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Edit Data Personil</div>
            </div>
            <div class="card-body">
                <form method="post" wire:submit.prevent="update">
                    @csrf
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama">Nama Pertugas</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukan Nama Petugas" wire:model="nama" value="{{ old('nama',$nama) }}">
                                @error('nama')
                                    <small id="nama" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" placeholder="Masukan Jabatan" wire:model="jabatan" value="{{ old('jabatan',$jabatan) }}">
                                @error('jabatan')
                                    <small id="jabatan" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" placeholder="Masukan NIP" wire:model="nip" value="{{ old('nip',$nip) }}">
                                @error('nip')
                                    <small id="nip" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button class="btn btn-sm btn-primary" type="submit">Ubah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>