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
        .ujung-kanan {
            position: relative;
            left: 80%;
            width: 200px;
        }
        #namaPetugas {
            border-bottom: 1px solid black;
            padding-bottom: 15px;
        }
        #nip {
            border-top: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3 style="text-align: center">Penggunaan {{ $tools[0]->alat->nama_alat }}</h3>
        <hr>
        <table>
            <tr>
                <td>Nama Petugas</td>
                <td> : </td>
                <td>{{ ($petugas != null) ? $petugas->nama_petugas : '' }}</td>
            </tr>
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
        <table class="table">
            <tr class="trow">
                <td rowspan="2" class="tdata">No</td>
                <td rowspan="2" class="tdata">Uraian</td>
                <td colspan="31" style="text-align: center" class="tdata">Tanggal</td>
                <td rowspan="2" class="tdata">Keterangan</td>
            </tr>
            <tr>
                @for ($i = 1; $i <= 31; $i++) 
                    <td class="tdata">{{ $i }}</td>
                @endfor
            </tr>
            @foreach ($tools as $alat)
            <tr>
                <td class="tdata">{{ $loop->iteration }}</td>
                <td class="tdata">{{ $alat->kegiatan->nama_kegiatan }}</td>
                @for ($i = 1; $i <= 31; $i++) 
                    <td class="tdata">
                        @foreach ($alat->kegiatan->alat as $ka)
                            @if (\Carbon\Carbon::parse($ka->pivot->tanggal_cek)->day == $i)
                            V
                            @else

                            @endif
                        @endforeach
                    </td>
                @endfor
                <td class="tdata">
                    @foreach ($alat->kegiatan->alat as $ka)
                        {{ $ka->pivot->keterangan }}
                    @endforeach
                </td>
            </tr>
            @endforeach
        </table>

        <div class="ujung-kanan">
            <br>
            <br>
            <h6>Penanggung Jawab Patologi Klinik</h6>
            <br>
            <br>
            <h6 id="namaPetugas">dr.C.N.C Alamanda, Sp.PK</h6>
            <h6 id="nip">NIP.19740906 201412 2 001</h6>
        </div>
    </div>
</body>
</html>