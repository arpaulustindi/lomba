<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Peserta;
use App\Models\Lomba;
use Illuminate\Support\Facades\DB;

class Live extends Component
{
    public $peserta, $lombas, $pesertas;
    public $px;
    public function render()
    {
        $this->px = DB::table('pesertas')->where('aktif','=','1')->value('id');
        $this->peserta = Peserta::find($this->px);
        $this->pesertas = Peserta::where('nilai','<>','-1')->orderBy('nilai','DESC')->get();
        return view('livewire.live')->layout('layouts.live');
    }
}
