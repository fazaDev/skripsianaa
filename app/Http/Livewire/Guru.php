<?php

namespace App\Http\Livewire;

use App\Models\Guru as ModelGuru;
use Livewire\Component;

class Guru extends Component
{
    public $nuptk, $nama, $tanggal_lahir, $tempat_lahir, $agama, $jenis_kelamin, $alamat, $guruId;

    public $isEdit = false;

    public function render()
    {
        $guru = ModelGuru::orderBy('nama','asc')->get();
        return view('livewire.guru',[
            'guru' => $guru
        ]);
    }

    private function resetInputFields(){
        $this->nuptk = '';
        $this->nama = '';
        $this->tanggal_lahir = '';
        $this->tempat_lahir = '';
        $this->agama = '';
        $this->jenis_kelamin = '';
        $this->alamat = '';
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
            'nuptk' => 'required',
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'agama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
        ]);

        ModelGuru::create([
            'nuptk' => $this->nuptk,
            'nama' => $this->nama,
            'tanggal_lahir' => $this->tanggal_lahir,
            'tempat_lahir' => $this->tempat_lahir,
            'agama' => $this->agama,
            'jenis_kelamin' => $this->jenis_kelamin,
            'alamat' => $this->alamat,
        ]);

        $this->resetInputFields();
        $this->dispatchBrowserEvent('guruAdded');
        $this->emit('userStore');
    }

    public function edit($id)
    {
        $this->isEdit = true;

        $guru = ModelGuru::findOrFail($id);

        $this->guruId = $id;
        $this->nuptk = $guru->nuptk;
        $this->nama = $guru->nama;
        $this->tanggal_lahir = $guru->tanggal_lahir;
        $this->tempat_lahir = $guru->tempat_lahir;
        $this->agama = $guru->agama;
        $this->jenis_kelamin = $guru->jenis_kelamin;
        $this->alamat = $guru->alamat;
    }

    public function update()
    {
        $this->validate([
            'nuptk' => 'required',
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'agama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
        ]);

        $guru = ModelGuru::findOrFail($this->guruId);

        $updateData = [
            'nuptk' => $this->nuptk,
            'nama' => $this->nama,
            'tanggal_lahir' => $this->tanggal_lahir,
            'tempat_lahir' => $this->tempat_lahir,
            'agama' => $this->agama,
            'jenis_kelamin' => $this->jenis_kelamin,
            'alamat' => $this->alamat,
        ];

        $guru->update($updateData);

        $this->resetInputFields();

        $this->dispatchBrowserEvent('guruUpdated');

        $this->emit('userStore');
    }

    public function delete($id)
    {
        $guru = ModelGuru::findOrFail($id);
        $guru->delete();
        $this->dispatchBrowserEvent('guruDeleted');
    }
}
