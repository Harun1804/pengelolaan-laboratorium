<!DOCTYPE html>
<html>
<head>
	<title>Logbook</title>

    <style>
        .container {
            margin: 10px 20px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table, .tdata {
            border: 1px solid black;
        }
        .trow {
            font-weight: bold;
        }
        .check-area {
            text-align: center
        }
    </style>
</head>
<body>
    <div class="container">
        <h3 style="text-align: center">Logbook {{ ucfirst($kategori) }} {{ $tools[0]->alat->nama_alat }}</h3>
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
        <hr>
        <h5>Harian</h5>
        <table class="table">
            <tr class="trow">
                <td class="tdata">Tanggal</td>
                @for ($i = 1; $i <= 31; $i++)
                    <td class="tdata">{{ $i }}</td>
                @endfor
            </tr>
            @foreach ($tools as $alat)
                @if ($alat->kegiatan->periode == "harian")                              
                    <tr>
                        <td class="tdata">{{ $alat->kegiatan->nama_kegiatan }}</td>
                        @for ($i = 1; $i <= 31; $i++)
                            <td class="tdata check-area">
                                @foreach ($alat->kegiatan->alat as $ka)
                                    @if (\Carbon\Carbon::parse($ka->pivot->tanggal_cek)->day == $i)
                                        V
                                    @else
                                        
                                    @endif
                                @endforeach
                            </td>
                        @endfor
                    </tr>
                @endif
            @endforeach
        </table>
        <h5>Mingguan</h5>
        <table class="table">
            <tr class="trow">
                <td class="tdata">Tanggal</td>
                @for ($i = 1; $i <= 31; $i++)
                    <td class="tdata">{{ $i }}</td>
                @endfor
            </tr>
            @foreach ($tools as $alat)
                @if ($alat->kegiatan->periode == "mingguan")                              
                    <tr>
                        <td class="tdata">{{ $alat->kegiatan->nama_kegiatan }}</td>
                        @for ($i = 1; $i <= 31; $i++)
                            <td class="tdata check-area">
                                @foreach ($alat->kegiatan->alat as $ka)
                                    @if (\Carbon\Carbon::parse($ka->pivot->tanggal_cek)->day == $i)
                                        V
                                    @else
                                        
                                    @endif
                                @endforeach
                            </td>
                        @endfor
                    </tr>
                @endif
            @endforeach
        </table>
        <h5>Bulanan</h5>
        <table class="table">
            <tr class="trow">
                <td class="tdata">Tanggal</td>
                @for ($i = 1; $i <= 31; $i++)
                    <td class="tdata">{{ $i }}</td>
                @endfor
            </tr>
            @foreach ($tools as $alat)
                @if ($alat->kegiatan->periode == "bulanan")                              
                    <tr>
                        <td class="tdata">{{ $alat->kegiatan->nama_kegiatan }}</td>
                        @for ($i = 1; $i <= 31; $i++)
                            <td class="tdata check-area">
                                @foreach ($alat->kegiatan->alat as $ka)
                                    @if (\Carbon\Carbon::parse($ka->pivot->tanggal_cek)->day == $i)
                                        V
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
</body>
</html>