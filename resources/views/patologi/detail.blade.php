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
            @case(2)
                
                @break
            @default
                
        @endswitch
    </div>
</div>

@endsection

@section('js-vendor')
    @livewireScripts
@endsection