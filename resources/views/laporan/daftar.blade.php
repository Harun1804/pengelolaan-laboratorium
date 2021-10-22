@extends('layouts.main')

@section('content')

<div class="page-inner">
    <div class="row row-projects">
        @forelse ($tools as $alat)
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="p-2">
                        <a href="#">
                            <img class="card-img-top rounded" src="{{ asset($alat->gambar) }}" alt="Product 1">
                        </a>
                    </div>
                    <div class="card-body pt-2">
                        <h4 class="mb-1 fw-bold text-center">{{ $alat->nama_alat }}</h4>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('resume.'.$filter.'.review',[$kategori,$alat->id]) }}" class="btn btn-sm btn-secondary">Logbook</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-md-12">
                <div class="alert alert-info empty-data">Belum Ada Data</div>
            </div>
        @endforelse
    </div>
</div>

@endsection