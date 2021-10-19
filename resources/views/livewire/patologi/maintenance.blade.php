<div class="col-md-12">
    @if (session('success'))
        <div class="alert alert-success mb-3">{{ session('success') }}</div>
    @endif
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" wire:ignore id="pills-harian-tab-nobd" data-toggle="pill"
                        href="#pills-harian-nobd" role="tab" aria-controls="pills-harian-nobd"
                        aria-selected="true">Harian</a>
                </li>
                <li class="nav-item" wire:ignore>
                    <a class="nav-link" id="pills-mingguan-tab-nobd" data-toggle="pill"
                        href="#pills-mingguan-nobd" role="tab" aria-controls="pills-mingguan-nobd"
                        aria-selected="true">Mingguan</a>
                </li>
                <li class="nav-item" wire:ignore>
                    <a class="nav-link" id="pills-bulanan-tab-nobd" data-toggle="pill"
                        href="#pills-bulanan-nobd" role="tab" aria-controls="pills-bulanan-nobd"
                        aria-selected="true">Bulanan</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="float-left">
                <div class="tab-content mb-3" id="pills-tabContent">
                    <div class="tab-pane fade" wire:ignore id="pills-harian-nobd" role="tabpanel"
                        aria-labelledby="pills-harian-tab-nobd">
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
                                <label>Pre On</label>
                                <hr>
                                @foreach ($alat as $key => $value)
                                    @if ($value->kegiatan->periode == "harian" && $value->kegiatan->kelompok_kegiatan == "pre_on" && $value->kegiatan->kategori == $kategori)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck{{ $key }}" wire:model="kegiatan_id.{{ $key }}" value="{{ $value->kegiatan_id }}" name="kegiatan_id.{{ $key }}" wire:key="check-{{ time() }}">
                                            <label class="custom-control-label" for="customCheck{{ $key }}">{{ $value->kegiatan->nama_kegiatan }}</label>
                                        </div>
                                        <br>
                                    @endif
                                @endforeach
                            </div>

                            <div class="form-check">
                                <label>Pre Off</label>
                                <hr>
                                @foreach ($alat as $key => $value)
                                    @if ($value->kegiatan->periode == "harian" && $value->kegiatan->kelompok_kegiatan == "pre_off" && $value->kegiatan->kategori == $kategori)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck{{ $key }}" wire:model="kegiatan_id.{{ $key }}" value="{{ $value->kegiatan_id }}" name="kegiatan_id.{{ $key }}">
                                            <label class="custom-control-label" for="customCheck{{ $key }}">{{ $value->kegiatan->nama_kegiatan }}</label>
                                        </div>
                                        <br>
                                    @endif
                                @endforeach
                            </div>

                            <div class="form-check">
                                <label>Pre Run</label>
                                <hr>
                                @foreach ($alat as $key => $value)
                                    @if ($value->kegiatan->periode == "harian" && $value->kegiatan->kelompok_kegiatan == "pre_run" && $value->kegiatan->kategori == $kategori)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck{{ $key }}" wire:model="kegiatan_id.{{ $key }}" value="{{ $value->kegiatan_id }}" name="kegiatan_id.{{ $key }}">
                                            <label class="custom-control-label" for="customCheck{{ $key }}">{{ $value->kegiatan->nama_kegiatan }}</label>                                      
                                        </div>
                                        <br>
                                    @endif
                                @endforeach
                            </div>

                            <div class="form-check">
                                <label>Post Run</label>
                                <hr>
                                @foreach ($alat as $key => $value)
                                    @if ($value->kegiatan->periode == "harian" && $value->kegiatan->kelompok_kegiatan == "post_run" && $value->kegiatan->kategori == $kategori)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck{{ $key }}" wire:model="kegiatan_id.{{ $key }}" value="{{ $value->kegiatan_id }}" name="kegiatan_id.{{ $key }}">
                                            <label class="custom-control-label" for="customCheck{{ $key }}">{{ $value->kegiatan->nama_kegiatan }}</label>                                        
                                        </div>
                                        <br>
                                    @endif
                                @endforeach
                            </div>

                            <button class="btn btn-sm btn-primary" type="submit">Tambah</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" wire:ignore id="pills-mingguan-nobd" role="tabpanel"
                        aria-labelledby="pills-mingguan-tab-nobd">
                        <form method="post" wire:submit.prevent="store">
                            @csrf
                            <input type="hidden" name="id" value="{{ $itemId }}">
                            <div class="form-group" >
                                <label>Jadwal Cek</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" id="datepicker" name="jadwal" required wire:model="jadwal">
                                </div>
                            </div>

                            <div class="form-check">
                                <label>Jenis Perawatan</label>
                                <hr>
                                @foreach ($alat as $key => $value)
                                    @if ($value->kegiatan->periode == "mingguan" && $value->kegiatan->kategori == $kategori)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck{{ $key }}" wire:model="kegiatan_id.{{ $key }}" value="{{ $value->kegiatan_id }}" name="kegiatan_id.{{ $key }}">
                                            <label class="custom-control-label" for="customCheck{{ $key }}">{{ $value->kegiatan->nama_kegiatan }}</label>                                        
                                        </div>
                                        <br>
                                    @endif
                                @endforeach
                            </div>

                            <button class="btn btn-sm btn-primary" type="submit">Tambah</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" wire:ignore id="pills-bulanan-nobd" role="tabpanel"
                        aria-labelledby="pills-bulanan-tab-nobd">
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
                                    @if ($value->kegiatan->periode == "bulanan" && $value->kegiatan->kategori == $kategori)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck{{ $key }}" wire:model="kegiatan_id.{{ $key }}" value="{{ $value->kegiatan_id }}" name="kegiatan_id.{{ $key }}">
                                            <label class="custom-control-label" for="customCheck{{ $key }}">{{ $value->kegiatan->nama_kegiatan }}</label>
                                        </div>
                                        <br>
                                    @endif
                                @endforeach
                            </div>

                            <button class="btn btn-sm btn-primary" type="submit">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="float-right">
                <img src="{{ asset($alat[0]->alat->gambar) }}" alt="Gambar Alat" width="250">
            </div>
        </div>
    </div>
</div>