<div class="row">
    @if (session('success'))
        <div class="col-md-12">
            <div class="alert alert-success">{{ session('success') }}</div>
        </div>
    @endif
    @if ($formMode)
    <div class="col-md-12">
        @if ($editMode)
            @include('livewire.kegiatan.edit')
        @else
            @include('livewire.kegiatan.create')
        @endif
    </div>
    @endif
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Kegiatan
                    <div class="float-right">
                        <button class="btn btn-sm btn-primary" type="button" wire:click="create">Tambah Data Kegiatan</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-head-bg-black mt-4">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Action</th>
                                <th scope="col">Nama Kegiatan</th>
                                <th scope="col">Kategori</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($events as $kegiatan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning" type="button" wire:click="edit({{ $kegiatan->id }})">Edit</button>
                                        @if ($kegiatan->detailAlat == null || $kegiatan->detailAlat->count() == 0)
                                        <button class="btn btn-sm btn-danger" type="button" wire:click="alertConfirm({{ $kegiatan->id }})">Delete</button>
                                        @endif
                                    </td>
                                    <td>{{ $kegiatan->nama_kegiatan }}</td>
                                    <td>{{ $kegiatan->kategori }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="empty-data">Belum Ada Data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>