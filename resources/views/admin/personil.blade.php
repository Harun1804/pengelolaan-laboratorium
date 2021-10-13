@extends('layouts.main')

@section('css-vendor')
    @livewireStyles
@endsection

@section('content')

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Personil</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-head-bg-black mt-4">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Petugas Lab</th>
                                    <th scope="col">ID User</th>
                                    <th scope="col">Jabatan</th>
                                    <th scope="col">Tanggal Penginputan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($personils as $personil)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $personil->nama_petugas }}</td>
                                        <td>{{ $personil->user_id }}</td>
                                        <td>{{ $personil->jabatan }}</td>
                                        <td></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="empty-data">Belum Ada Data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js-vendor')
    @livewireScripts
@endsection