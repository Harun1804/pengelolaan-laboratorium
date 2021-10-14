@extends('layouts.main')

@section('content')

<div class="page-inner">
    <div class="row">
        @if (session('success'))
            <div class="col-md-12">
                <div class="alert alert-success">{{ session('success') }}</div>
            </div>
        @endif
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-harian-tab-nobd" data-toggle="pill"
                                href="#pills-harian-nobd" role="tab" aria-controls="pills-harian-nobd"
                                aria-selected="true">Harian</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-mingguan-tab-nobd" data-toggle="pill"
                                href="#pills-mingguan-nobd" role="tab" aria-controls="pills-mingguan-nobd"
                                aria-selected="true">Mingguan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-bulanan-tab-nobd" data-toggle="pill"
                                href="#pills-bulanan-nobd" role="tab" aria-controls="pills-bulanan-nobd"
                                aria-selected="true">Bulanan</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="float-left">
                        <div class="tab-content mb-3" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-harian-nobd" role="tabpanel"
                                aria-labelledby="pills-harian-tab-nobd">
                                <form action="{{ route('patologi.'.$filter.'.inputData') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <div class="form-group">
                                        <label>Jadwal Cek</label>
                                        <div class="input-group">
                                            <input type="date" class="form-control" id="datepicker" name="jadwal" required>
                                        </div>
                                    </div>

                                    <div class="form-check">
                                        <label>Pre On</label>
                                        <hr>
                                        @foreach ($alat as $key => $value)
                                            @if ($value->kegiatan->periode == "harian" && $value->kegiatan->kelompok_kegiatan == "pre_on")
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck{{ $key }}" name="kegiatan_id[]" value="{{ $value->kegiatan_id }}">
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
                                            @if ($value->kegiatan->periode == "harian" && $value->kegiatan->kelompok_kegiatan == "pre_off")
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck{{ $key }}" name="kegiatan_id[]" value="{{ $value->kegiatan_id }}">
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
                                            @if ($value->kegiatan->periode == "harian" && $value->kegiatan->kelompok_kegiatan == "pre_run")
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck{{ $key }}" name="kegiatan_id[]" value="{{ $value->kegiatan_id }}">
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
                                            @if ($value->kegiatan->periode == "harian" && $value->kegiatan->kelompok_kegiatan == "post_run")
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck{{ $key }}" name="kegiatan_id[]" value="{{ $value->kegiatan_id }}">
                                                    <label class="custom-control-label" for="customCheck{{ $key }}">{{ $value->kegiatan->nama_kegiatan }}</label>
                                                </div>
                                                <br>
                                            @endif
                                        @endforeach
									</div>

                                    <button class="btn btn-sm btn-primary" type="submit">Tambah</button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="pills-mingguan-nobd" role="tabpanel"
                                aria-labelledby="pills-mingguan-tab-nobd">
                                <form action="{{ route('patologi.'.$filter.'.inputData') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <div class="form-group">
                                        <label>Jadwal Cek</label>
                                        <div class="input-group">
                                            <input type="date" class="form-control" id="datepicker" name="jadwal" required>
                                        </div>
                                    </div>

                                    <div class="form-check">
                                        <label>Jenis Perawatan</label>
                                        <hr>
                                        @foreach ($alat as $key => $value)
                                            @if ($value->kegiatan->periode == "mingguan")
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck{{ $key }}" name="kegiatan_id[]" value="{{ $value->kegiatan_id }}">
                                                    <label class="custom-control-label" for="customCheck{{ $key }}">{{ $value->kegiatan->nama_kegiatan }}</label>
                                                </div>
                                                <br>
                                            @endif
                                        @endforeach
									</div>

                                    <button class="btn btn-sm btn-primary" type="submit">Tambah</button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="pills-bulanan-nobd" role="tabpanel"
                                aria-labelledby="pills-bulanan-tab-nobd">
                                <form action="{{ route('patologi.'.$filter.'.inputData') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <div class="form-group">
                                        <label>Jadwal Cek</label>
                                        <div class="input-group">
                                            <input type="date" class="form-control" id="datepicker" name="jadwal" required>
                                        </div>
                                    </div>

                                    <div class="form-check">
                                        <label>Jenis Perawatan</label>
                                        <hr>
                                        @foreach ($alat as $key => $value)
                                            @if ($value->kegiatan->periode == "bulanan")
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck{{ $key }}" name="kegiatan_id[]" value="{{ $value->kegiatan_id }}">
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
    </div>
</div>

@endsection