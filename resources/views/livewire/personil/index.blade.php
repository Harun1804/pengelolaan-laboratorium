<div class="row">
    <div class="col-md-12">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($editMode)
            @include('livewire.personil.edit')
        @endif
    </div>
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
                                <th scope="col">Action</th>
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
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning" wire:click="edit({{ $personil->id }})">Edit</button>
                                    </td>
                                    <td>{{ $personil->nama_petugas }}</td>
                                    <td>{{ $personil->user_id }}</td>
                                    <td>{{ $personil->jabatan }}</td>
                                    <td>{{ $personil->tanggal_cek }}</td>
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