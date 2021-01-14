<?php

namespace App\Http\Livewire;

use App\Models\Siswa;
use Livewire\Component;
use App\Models\Spp as ModelSpp;

class Spp extends Component
{
    public $siswa_ind, $bulan, $siswa_id, $jumlah_bayar, $tanggal_bayar;

    protected $queryString = ['siswa_ind'];

    public function render()
    {
        // $all = ModelSpp::with('siswa')->get();
        // dd($all);

        $spp = Siswa::where('ind', 'like', '%'.$this->siswa_ind.'%')->first();
        // $siswa = Siswa::findOrFail('ind', '=', $this->siswa_ind)->get();

        // $spp = ModelSpp::with('siswa')->where('siswa_id', $siswa)->get();
        return view('livewire.spp',[
            'spp' => $spp
        ]);

    }
}
