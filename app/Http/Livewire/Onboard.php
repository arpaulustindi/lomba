<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Lomba;
use App\Models\Peserta;
use Illuminate\Support\Facades\DB;

class Onboard extends Component
{
    public $pesertas, $lombas, $lomba_id, $urutan, $nama, $juri1, $nilai1, $juri2, $nilai2, $juri3, $nilai3, $nilai, $rangking, $medali, $aktif, $tahap, $peserta_id;
    public $lbx;
    public $id_aktif = -1;
    public function render()
    {      
        $this->lbx = DB::table('lombas')->where('aktif','=','1')->value('id');
        $this->lombas = Lomba::findOrFail($this->lbx);
        $this->pesertas = Peserta::where('lomba_id','=',$this->lbx)->get();
        return view('livewire.onboard');
    }

    public function tahapan($id, $thp){
        $data_aktif = Peserta::where('id','=',$id);
        $data_aktif->update([
            'tahap' => $thp,
        ]);
    }

    public function aktivasi($id){
        if($this->id_aktif != -1){            
            $this->deaktivasi($this->id_aktif);            
        } else {
            $cek = Peserta::where('aktif','=', true);
            if($cek->exists()){
                $cek->update(['aktif'=>false]);
            }
        }

        $data_aktif = Peserta::where('id','=',$id);
        $data_aktif->update([
            'aktif' => true,
            'tahap' => 1,
        ]);
        $this->id_aktif = $id;
    }
    public function deaktivasi($id){
        $data_aktif = Peserta::where('id','=',$id);
        $data_aktif->update([
            'aktif' => false,
        ]);
    }
}
