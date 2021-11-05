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

        .ttd {
            width: 100%;
        }
        .kanan {
            text-align: right;
        }
        .tengah {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3 style="text-align: center">Monitoring dan Evaluasi Penanggung Jawab Alat</h3>
        <hr>
        <table>
            <tr>
                <td>Nama Penanggung Jawab</td>
                <td> : </td>
                <td>{{ $petugas->nama_petugas }}</td>
            </tr>
            <tr>
                <td>Nama Alat</td>
                <td>:</td>
                <td>{{ $tools[0]->alat->nama_alat }}</td>
            </tr>
            <tr>
                <td>Bidang</td>
                <td> : </td>
                <td>{{ $tools[0]->alat->jenis }}</td>
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
                <td rowspan="2" class="tdata">Uraian Tugas</td>
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
            <tr>
                <td colspan="2" class="tdata"><strong>PARAF PENANGUNG JAWAB</strong></td>
                @for ($i = 1; $i <= 31; $i++) 
                    <td class="tdata"></td>
                @endfor
                <td class="tdata"></td>
            </tr>
        </table>

        <h5>Kesimpulan : </h5>
        <table class="ttd">
            <tr>
                <td>KOORDINATOR MUTU</td>
                <td></td>
                <td class="kanan">Penanggung Jawab Patologi Klinik</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>SAIFUL HAKIM,S.Si, M.Kes</td>
                <td></td>
                <td class="kanan">dr.C.N.C Alamanda, Sp.PK</td>
            </tr>
            <tr>
                <td>NIP : 19670827 199003 1 008</td>
                <td></td>
                <td class="kanan">NIP : 19740906 201412 2 001</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td class="tengah">Mengetahui,</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td class="tengah">KEPALA LABORATORIUM KESEHATAN</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td class="tengah">PROV. JAWA BARAT</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td class="tengah">&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td class="tengah">&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td class="tengah">Drg. EMA RAHMAWATI, MKM</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td class="tengah">NIP : 19720202 200701 2 001</td>
                <td>&nbsp;</td>
            </tr>
        </table>
    </div>
</body>
</html>