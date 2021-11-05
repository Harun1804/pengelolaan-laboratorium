<!DOCTYPE html>
<html>

<head>
    <title>Logbook</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container my-3">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-9">
                            <h3>Monitoring dan Evaluasi Penanggung Jawab Alat</h3>
                        </div>
                        <div class="col-1">
                            <a href="{{ route('resume.'.$filter.'.monitoring.cetak',$id) }}" class="btn btn-sm btn-primary" target="_blank">Cetak</a>
                        </div>
                    </div>
                </div>
                <hr>
                <table>
                    <tr>
                        <td>Nama Penanggung Jawab</td>
                        <td> : </td>
                        <td>{{ ($petugas != null) ? $petugas->nama_petugas : '' }}</td>
                    </tr>
                    <tr>
                        <td>Nama Alat</td>
                        <td> : </td>
                        <td>{{ $tools[0]->alat->nama_alat }}</td>
                    </tr>
                    <tr>
                        <td>Bidang</td>
                        <td> : </td>
                        <td>{{ $tools[0]->alat->jenis }}</td>
                    </tr>
                    <tr>
                        <td>Bulan</td>
                        <td> : </td>
                        <td>{{ \Carbon\Carbon::now()->monthName }}</td>
                    </tr>
                </table>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <td rowspan="2">No</td>
                            <td rowspan="2">Uraian Tugas</td>
                            <td colspan="31" style="text-align: center">Tanggal</td>
                            <td rowspan="2">Keterangan</td>
                        </tr>
                        <tr>
                            @for ($i = 1; $i <= 31; $i++) 
                                <td>{{ $i }}</td>
                            @endfor
                        </tr>
                        @foreach ($tools as $alat)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $alat->kegiatan->nama_kegiatan }}</td>
                            @for ($i = 1; $i <= 31; $i++) 
                                <td>
                                    @foreach ($alat->kegiatan->alat as $ka)
                                        @if (\Carbon\Carbon::parse($ka->pivot->tanggal_cek)->day == $i)
                                        ✔
                                        @else

                                        @endif
                                    @endforeach
                                </td>
                            @endfor
                            <td>
                                @foreach ($alat->kegiatan->alat as $ka)
                                    {{ $ka->pivot->keterangan }}
                                @endforeach
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="2"><strong>PARAF PENANGUNG JAWAB</strong></td>
                            @for ($i = 1; $i <= 31; $i++) 
                                <td></td>
                            @endfor
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
