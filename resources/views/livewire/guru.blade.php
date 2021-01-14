<div>
    <div class="row">
        <div class="col-sm-12">

            <div class="card-box">
                <h4 class="mt-0 mb-7">
                    Data Guru
                </h4>
                {{-- <button wire:click="create()" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#exampleModalScrollable">Create New Post</button> --}}
                <button wire:click="create()" type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#exampleModalScrollable">Tambah Guru</button>

                <table class="table table-sm table-bordered">
                    <thead class="bg-dark text-center text-white">
                        <tr>
                            <th>No</th>
                            <th>NUPTK</th>
                            <th>Nama</th>
                            <th>Tempat/Tgl. Lahir</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($guru as $index => $guru)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$guru->nuptk}}</td>
                            <td>{{$guru->nama}}</td>
                            <td>{{$guru->tempat_lahir}}, {{$guru->tanggal_lahir}}</td>
                            <td>{{$guru->alamat}}</td>
                            <td>
                                <button wire:click="edit('{{$guru->id}}')" type="button" class="btn btn-info btn-sm waves-effect waves-light" data-toggle="modal" data-target="#exampleModalScrollable">Edit</button>
                                <button wire:click="delete('{{$guru->id}}')" type="button" class="btn btn-danger btn-sm waves-effect waves-light">Hapus</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('livewire.formguru')
    {{-- @endif --}}
</div>

@push('scripts')
<script>
    document.addEventListener('livewire:load',  ()  => {

        window.addEventListener('guruAdded', (e) => {
            swal({
                title: "Berhasil!",
                text: "Data guru berhasil disimpan.",
                type:"success",
                confirmButtonClass:"btn btn-confirm mt-2"
            });
        });

        window.addEventListener('guruUpdated', (e) => {
            swal({
                title: "Berhasil!",
                text: "Data guru berhasil diupdate.",
                type:"success",
                confirmButtonClass:"btn btn-confirm mt-2"
            });
        });

        window.addEventListener('guruDeleted', (e) => {
            swal({
                title: "Berhasil!",
                text: "Data guru berhasil dihapus.",
                icon: "danger",
                button: "Ok",
            });
        });
    });
</script>
@endpush
