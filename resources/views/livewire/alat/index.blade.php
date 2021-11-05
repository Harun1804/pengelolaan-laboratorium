<div class="row">
    @if (session('success'))
        <div class="col-md-12">
            <div class="alert alert-success">{{ session('success') }}</div>
        </div>
    @endif
    @if ($formMode)
    <div class="col-md-12">
        @if ($editMode)
            @include('livewire.alat.edit')
        @else
            @include('livewire.alat.create')
        @endif
    </div>
    @endif
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Alat
                    <div class="float-right">
                        <button class="btn btn-sm btn-primary" type="button" wire:click="create">Tambah Data Alat</button>
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
                                <th scope="col">Gambar</th>
                                <th scope="col">Nama Alat</th>
                                <th scope="col">Serial Number</th>
                                <th scope="col">Jenis</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tools as $alat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-info" type="button" wire:click="show({{ $alat->id }})">Detail</button>
                                        <button class="btn btn-sm btn-warning" type="button" wire:click="edit({{ $alat->id }})">Edit</button>
                                        @if ($alat->detailAlat->count() == 0)
                                        <button class="btn btn-sm btn-danger" type="button" wire:click="alertConfirm({{ $alat->id }})">Delete</button>
                                        @endif
                                    </td>
                                    <td>{{ $alat->nama_alat }}</td>
                                    <td>
                                        <img src="{{ asset($alat->gambar) }}" alt="Alat" width="100px">
                                    </td>
                                    <td>{{ $alat->serial_number }}</td>
                                    <td>{{ $alat->jenis }}</td>
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