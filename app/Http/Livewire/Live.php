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
    public $lbx;
    public function render()
    {
        $this->lbx = DB::table('lombas')->where('aktif','=','1')->value('id');
        $this->lombas = Lomba::findOrFail($this->lbx);
        $this->px = DB::table('pesertas')->where('lomba_id','=',$this->lbx)->where('aktif','=','1')->value('id');
        $this->peserta = Peserta::find($this->px);
        //$this->pesertas = Peserta::where('nilai','<>','-1')->orderBy('nilai','DESC')->get();
        $this->pesertas = Peserta::query()
                            ->selectRaw("nama, nilai, RANK() OVER (ORDER BY nilai) 'rank'")
                            ->where('nilai', '<>','-1')
                            ->orderBy('nilai')
                            ->get();
        return view('livewire.live')->layout('layouts.live');
    }
}
