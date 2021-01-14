<!-- Long Content Scroll Modal -->
<div wire:ignore.self class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalScrollableTitle">Form {{$isEdit ? 'Update' : 'Tambah'}} Siswa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form @if($isEdit)
                    wire:submit.prevent="update()"
                    @else
                    wire:submit.prevent="store()"
                    @endif
                >
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="">IND</label>
                                <input wire:model="ind" type="text" class="form-control">
                                @error($ind) <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input wire:model="nama" type="text" class="form-control">
                                @error($nama) <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Tempat Lahir</label>
                                <input wire:model="tempat_lahir" type="text" class="form-control">
                                @error($tempat_lahir) <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="">Tanggal Lahir</label>
                            <input wire:model="tanggal_lahir" type="date" class="form-control">
                            @error($tanggal_lahir) <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Agama</label>
                                <select wire:model="agama" class="form-control">
                                    <option value="">Pilih Agama</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                                @error($agama) <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="">Jenis Kelamin</label>
                            <select wire:model="jenis_kelamin" class="form-control">
                                <option value="">Jenis Kelamin</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            @error($jenis_kelamin) <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Orang Tua</label>
                        <input wire:model="orang_tua" type="text" class="form-control">
                        @error($orang_tua) <small class="text-danger">{{$message}}</small> @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input wire:model="alamat" type="text" class="form-control">
                        @error($alamat) <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button wire:click="cancel()" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">{{$isEdit ? 'Update' : 'Simpan'}}</button>
                </div>
            </form>
            </div>
        </div>
    </div>
