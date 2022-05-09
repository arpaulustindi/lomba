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
    public $sqlx;
    public function render()
    {
        $this->lbx = DB::table('lombas')->where('aktif','=','1')->value('id');
        $this->lombas = Lomba::findOrFail($this->lbx);
        $this->px = DB::table('pesertas')->where('aktif','=','1')->value('id');
        $this->peserta = Peserta::find($this->px);
        //$this->pesertas = Peserta::where('nilai','<>','-1')->orderBy('nilai','DESC')->get();

        $this->pesertas = DB::table('pesertas')
                            ->select(DB::raw("nama, nilai, RANK() OVER (ORDER BY nilai DESC) AS juara"))                            
                            ->where('nilai', '<>','-1')
                            ->where('lomba_id','=', $this->lbx)
                            ->orderBy('juara')
                            ->get(); 
      
        return view('livewire.live')->layout('layouts.live');
    }
}
