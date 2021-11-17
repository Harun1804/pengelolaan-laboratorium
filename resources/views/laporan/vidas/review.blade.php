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
                        <div class="col-4"></div>
                        <div class="col-7">
                            @if ($tools != null)
                            <h3>Logbook Maintenance {{ $tools[0]->alat->nama_alat }}</h3>
                            @endif
                        </div>
                        <div class="col-1">
                            <a href="{{ route('resume.'.$filter.'.maintenance.cetak',$id) }}"
                                class="btn btn-sm btn-primary" target="_blank">Cetak</a>
                        </div>
                    </div>
                </div>
                <hr>
                <table>
                    <tr>
                        <td>Tahun</td>
                        <td> : </td>
                        <td>{{ \Carbon\Carbon::now()->year }}</td>
                    </tr>
                </table>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <td rowspan="2">No</td>
                            <td rowspan="2" style="text-align: center">Perawatan</td>
                            <td colspan="12" style="text-align: center">Bulan</td>
                        </tr>
                        <tr>
                            @for ($i = 1; $i <= 12; $i++) <td>{{ $i }}</td>
                                @endfor
                        </tr>
                        @foreach ($tools as $alat)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $alat->kegiatan->nama_kegiatan }}</td>
                            @for ($i = 1; $i <= 12; $i++) 
                            <td>
                                @foreach ($alat->kegiatan->alat as $ka)
                                    @if (\Carbon\Carbon::parse($ka->pivot->tanggal_cek)->month == $i)
                                    ✔
                                    @else

                                    @endif
                                @endforeach
                            </td>
                            @endfor
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
