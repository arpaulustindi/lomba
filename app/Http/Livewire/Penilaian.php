<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Peserta;
use Illuminate\Support\Facades\DB;
class Penilaian extends Component
{
    public $pesertas, $lombas, $lomba_id, $urutan, $nama, $juri1, $nilai1, $juri2, $nilai2, $juri3, $nilai3, $nilai, $rangking, $medali, $aktif, $tahap, $peserta_id;
    public $px;
    public $id_aktif = -1;
    public function render()
    {
        $this->px = DB::table('pesertas')->where('aktif','=','1')->value('id');
        $this->pesertas = Peserta::find($this->px);
        return view('livewire.penilaian');
    }

    public function penilaian($jur){
        $data_aktif = Peserta::where('id','=',$this->px);
        if($jur ==1){
            $data_aktif->update([
                'nilai1' => $this->nilai1,
            ]);
        } elseif ($jur==2){
            $data_aktif->update([
                'nilai2' => $this->nilai2,
            ]);
        } elseif ($jur==3){
            $data_aktif->update([
                'nilai3' => $this->nilai3,
            ]);
        } 
    }
}
