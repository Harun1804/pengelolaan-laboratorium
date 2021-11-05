<div class="col-md-12">
    @if (session('success'))
        <div class="alert alert-success mb-3">{{ session('success') }}</div>
    @endif
    <div class="card">
        <div class="card-header">
            <div class="card-title">Input Data Monitoring</div>
        </div>
        <div class="card-body">
            <div class="float-left">
                <form method="post" wire:submit.prevent="store">
                    @csrf
                    <input type="hidden" name="id" value="{{ $itemId }}">
                    <div class="form-group">
                        <label>Jadwal Cek</label>
                        <div class="input-group">
                            <input type="date" class="form-control" id="datepicker" name="jadwal" required wire:model="jadwal">
                        </div>
                    </div>

                    <div class="form-check">
                        <label>Jenis Perawatan</label>
                        <hr>
                        @foreach ($alat as $key => $value)
                                <div class="custom-control custom-checkbox" wire:key="{{ $key }}">
                                    <input type="checkbox" class="custom-control-input" id="customCheck{{ $key }}" wire:model="kegiatan_id" value="{{ $value->kegiatan_id }}">
                                    <label class="custom-control-label" for="customCheck{{ $key }}">{{ $value->kegiatan->nama_kegiatan }}</label>
                                </div>
                                <br>
                        @endforeach
                    </div>

                    <button class="btn btn-sm btn-primary" type="submit">Tambah</button>
                </form>
            </div>
            <div class="float-right">
                <img src="{{ asset($alat[0]->alat->gambar) }}" alt="Gambar Alat" width="250">
            </div>
        </div>
    </div>
</div>
