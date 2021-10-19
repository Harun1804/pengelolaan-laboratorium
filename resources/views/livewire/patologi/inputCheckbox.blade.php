<div class="form-check">
    <label>{{ $label }}</label>
    <hr>
    @foreach ($alat as $key => $value)
        @if ($value->kegiatan->periode == $periode && $value->kegiatan->kategori == $kategori)
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck{{ $key }}" wire:model="kegiatan_id.{{ $key }}" value="{{ $value->kegiatan_id }}" name="kegiatan_id.{{ $key }}">
                <label class="custom-control-label" for="customCheck{{ $key }}">{{ $value->kegiatan->nama_kegiatan }}</label>
            </div>
            <br>
        @endif
    @endforeach
</div>