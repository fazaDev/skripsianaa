<div>
    <div class="row">
        <div class="col-sm-12">

            <div class="card-box">
                <div class="row mb-2">
                    <div class="col-sm-10">
                        <input wire:model="siswa_ind" type="number" class="form-control" placeholder="Nomor induk siswa">
                    </div>
                    <div class="col-sm-2">
                        <button class="btn btn-primary btn-block">Cari siswa</button>
                    </div>
                </div>
                @if($siswa_ind)
                <h4 class="mt-0 mb-7">
                    Data Pembayaran SPP
                </h4>
                <button wire:click="create()" type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#exampleModalScrollable">Tambah Data</button>

                <table class="table table-sm table-bordered">
                    <thead class="bg-dark text-center text-white">
                        <tr>
                            <th>No</th>
                            <th>IND</th>
                            <th>Nama</th>
                            <th>Bulan</th>
                            <th>Jumlah Bayar</th>
                            <th>Tanggal Bayar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($spp as $index => $spp)
                        <tr>
                            <td>{{$index}}</td>
                            <td>{{$spp->ind}}</td>
                            <td>{{$spp->nama}}</td>
                            <td>{{$spp->spp->bulan}}</td>
                            <td>{{$spp->jumlah_bayar}}</td>
                            <td>{{$spp->tanggal_bayar}}</td>
                            <td>
                                <button wire:click="edit('{{$spp->id}}')" type="button" class="btn btn-info btn-sm waves-effect waves-light" data-toggle="modal" data-target="#exampleModalScrollable">Edit</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
    {{-- @if($isOpen) --}}
    {{-- @include('livewire.formsiswa') --}}
    {{-- @endif --}}
</div>

@push('scripts')
<script>
    document.addEventListener('livewire:load',  ()  => {

        window.addEventListener('sppAdded', (e) => {
            swal({
                title: "Berhasil!",
                text: "Data spp berhasil disimpan.",
                icon: "success",
                button: "Ok",
            });
        });

        window.addEventListener('sppUpdated', (e) => {
            swal({
                title: "Berhasil!",
                text: "Data spp berhasil diupdate.",
                icon: "success",
                button: "Ok",
            });
        });

    });
</script>
@endpush
