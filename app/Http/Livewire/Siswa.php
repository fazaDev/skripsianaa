<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Siswa as ModelSiswa;

class Siswa extends Component
{
    use WithPagination;

    public $ind, $nama, $tanggal_lahir, $tempat_lahir, $agama, $jenis_kelamin, $alamat, $orang_tua, $siswaId;

    public $isEdit = false;

    public function render()
    {
        $siswa = ModelSiswa::orderBy('nama', 'asc')->get();
        return view('livewire.siswa', [
            'siswa' => $siswa
        ]);
    }

    private function resetInputFields(){
        $this->ind = '';
        $this->nama = '';
        $this->tanggal_lahir = '';
        $this->tempat_lahir = '';
        $this->agama = '';
        $this->jenis_kelamin = '';
        $this->alamat = '';
        $this->orang_tua = '';
    }

    public function create()
    {
        $this->isEdit = false;
        $this->resetInputFields();
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function store()
    {
        $this->validate([
            'ind' => 'required',
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'agama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'orang_tua' => 'required',
        ]);

        ModelSiswa::create([
            'ind' => $this->ind,
            'nama' => $this->nama,
            'tanggal_lahir' => $this->tanggal_lahir,
            'tempat_lahir' => $this->tempat_lahir,
            'agama' => $this->agama,
            'jenis_kelamin' => $this->jenis_kelamin,
            'alamat' => $this->alamat,
            'orang_tua' => $this->orang_tua,
        ]);

        session()->flash('info', 'Data siswa berhasil disimpan.');

        $this->resetInputFields();
        $this->dispatchBrowserEvent('siswaAdded');
        $this->emit('userStore');
    }

    public function edit($id)
    {
        $this->isEdit = true;

        $siswa = ModelSiswa::findOrFail($id);

        $this->siswaId = $id;
        $this->ind = $siswa->ind;
        $this->nama = $siswa->nama;
        $this->tanggal_lahir = $siswa->tanggal_lahir;
        $this->tempat_lahir = $siswa->tempat_lahir;
        $this->agama = $siswa->agama;
        $this->jenis_kelamin = $siswa->jenis_kelamin;
        $this->alamat = $siswa->alamat;
        $this->orang_tua = $siswa->orang_tua;
    }

    public function update()
    {
        $this->validate([
            'ind' => 'required',
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'agama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'orang_tua' => 'required',
        ]);

        $siswa = ModelSiswa::findOrFail($this->siswaId);

        $updateData = [
            'ind' => $this->ind,
            'nama' => $this->nama,
            'tanggal_lahir' => $this->tanggal_lahir,
            'tempat_lahir' => $this->tempat_lahir,
            'agama' => $this->agama,
            'jenis_kelamin' => $this->jenis_kelamin,
            'alamat' => $this->alamat,
            'orang_tua' => $this->orang_tua,
        ];

        $siswa->update($updateData);

        $this->resetInputFields();

        $this->dispatchBrowserEvent('siswaUpdated');

        $this->emit('userStore');
    }

    public function delete($id)
    {
        $siswa = ModelSiswa::findOrFail($id);
        $siswa->delete();
        $this->dispatchBrowserEvent('siswaDeleted');
    }


}
