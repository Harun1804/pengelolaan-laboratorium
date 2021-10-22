<!DOCTYPE html>
<html>
<head>
	<title>Logbook</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container my-3">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-7">
                            <h3>Logbook Maintenance {{ $tools[0]->alat->nama_alat }}</h3>
                        </div>
                    </div>
                </div>
                <hr>
                <table>
                    <tr>
                        <td>Nama Alat</td>
                        <td>:</td>
                        <td>{{ $tools[0]->alat->nama_alat }}</td>
                    </tr>
                    <tr>
                        <td>Bulan</td>
                        <td>:</td>
                        <td>{{ \Carbon\Carbon::now()->monthName }}</td>
                    </tr>
                </table>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <h5>Harian</h5>
                    <table class="table table-bordered">
                        <tr>
                            <td>Tanggal</td>
                            @for ($i = 1; $i <= 31; $i++)
                                <td>{{ $i }}</td>
                            @endfor
                        </tr>
                        @foreach ($tools as $alat)
                            @if ($alat->kegiatan->periode == "harian")                              
                                <tr>
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
                                </tr>
                            @endif
                        @endforeach
                    </table>
                    <br>
                    <h5>Mingguan</h5>
                    <table class="table table-bordered">
                        <tr>
                            <td>Tanggal</td>
                            @for ($i = 1; $i <= 31; $i++)
                                <td>{{ $i }}</td>
                            @endfor
                        </tr>
                        @foreach ($tools as $alat)
                            @if ($alat->kegiatan->periode == "mingguan")                                
                                <tr>
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
                                </tr>
                            @endif
                        @endforeach
                    </table>
                    <br>
                    <h5>Bulanan</h5>
                    <table class="table table-bordered">
                        <tr>
                            <td>Tanggal</td>
                            @for ($i = 1; $i <= 31; $i++)
                                <td>{{ $i }}</td>
                            @endfor
                        </tr>
                        @foreach ($tools as $alat)
                            @if ($alat->kegiatan->periode == "bulanan")                                
                                <tr>
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
                                </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
	</div>
</body>
</html>