<div>
    <div class="row">
        <div class="col-sm-12">

            <div class="card-box">
                <h4 class="mt-0 mb-7">
                    Data Siswa
                </h4>
                {{-- <button wire:click="create()" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#exampleModalScrollable">Create New Post</button> --}}
                <button wire:click="create()" type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#exampleModalScrollable">Tambah Siswa</button>

                <table class="table table-sm table-bordered">
                    <thead class="bg-dark text-center text-white">
                        <tr>
                            <th>No</th>
                            <th>IND</th>
                            <th>Nama</th>
                            <th>Tempat/Tgl. Lahir</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa as $index => $siswa)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$siswa->ind}}</td>
                            <td>{{$siswa->nama}}</td>
                            <td>{{$siswa->tempat_lahir}}, {{$siswa->tanggal_lahir}}</td>
                            <td>{{$siswa->alamat}}</td>
                            <td>
                                <button wire:click="edit('{{$siswa->id}}')" type="button" class="btn btn-info btn-sm waves-effect waves-light" data-toggle="modal" data-target="#exampleModalScrollable">Edit</button>
                                <button wire:click="delete('{{$siswa->id}}')" type="button" class="btn btn-danger btn-sm waves-effect waves-light">Hapus</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $siswa->links() }} --}}
            </div>
        </div>
    </div>
    {{-- @if($isOpen) --}}
    @include('livewire.formsiswa')
    {{-- @endif --}}
</div>

@push('scripts')
<script>
    document.addEventListener('livewire:load',  ()  => {

        window.addEventListener('siswaAdded', (e) => {
            swal({
                title: "Berhasil!",
                text: "Data siswa berhasil disimpan.",
                type:"success",
                confirmButtonClass:"btn btn-confirm mt-2"
            });
        });

        window.addEventListener('siswaUpdated', (e) => {
            swal({
                title: "Berhasil!",
                text: "Data siswa berhasil diupdate.",
                type:"success",
                confirmButtonClass:"btn btn-confirm mt-2"
            });
        });

        window.addEventListener('siswaDeleted', (e) => {
            swal({
                title: "Berhasil!",
                text: "Data siswa berhasil dihapus.",
                icon: "success",
                button: "Ok",
            });
        });
    });
</script>
@endpush
