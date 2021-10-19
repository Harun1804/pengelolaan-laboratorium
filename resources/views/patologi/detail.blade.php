@extends('layouts.main')

@section('css-vendor')
    @livewireStyles
@endsection

@section('content')
<div class="page-inner">
    <div class="row">
        @switch($kategori)
            @case("maintenance")
                @livewire('input-maintenance', ['id' => $id,'kategori'=>$kategori])
                @break
            @case("penggunaan")
                @livewire('input-pengunaan', ['id' => $id,'kategori'=>$kategori])
                @break
            @case("pemeliharaan")
                @livewire('input-pemeliharaan', ['id' => $id,'kategori'=>$kategori])
                @break
            @case("monitoring")
                @livewire('input-monitoring', ['id' => $id,'kategori'=>$kategori])
                @break
            @default
                
        @endswitch
    </div>
</div>

@endsection

@section('js-vendor')
    @livewireScripts
@endsection