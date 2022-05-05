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
        $this->pesertas = Peserta::where('lomba_id','=',$this->lbx)->orderBy('urutan','ASC')->get();
        return view('livewire.onboard');
    }

    public function tahapan($id, $thp){
        $data_aktif = Peserta::where('id','=',$id);
        

        if($thp == 3){
            $data_aktif_ = DB::table('pesertas')->where('id','=',$id)->first();
            $n1 = $data_aktif_->nilai1;
            $n2 = $data_aktif_->nilai2;
            $n3 = $data_aktif_->nilai3;
            $total = $n1+$n2+$n3;
            $nilai_ = $total / 3;

            if($data_aktif_->nilai1 == -1){
                session()->flash('message','Juri 1 Belum Menilai.');
                return false;
            }
            elseif($data_aktif_->nilai2 == -1){
                session()->flash('message','Juri 2 Belum Menilai.');
                return false;
            }
            elseif($data_aktif_->nilai3 == -1){
                session()->flash('message','Juri 3 Belum Menilai.');
                return false;
            } else {
                $data_aktif->update([
                    'tahap' => $thp,
                    'nilai' => $nilai_,
                ]);
            }
            /*$data_aktif->update([
                'tahap' => $thp,
                'nilai' => $total,
            ]);*/
            
        } else {
            $data_aktif->update([
                'tahap' => $thp,
            ]);
        }
        

    }
    private function hitung($id){
        $data_aktif = Peserta::find($id);
        $n1 = $data_aktif->nilai1;
        $n2 = $data_aktif->nilai2;
        $n3 = $data_aktif->nilai3;
        $total = $n1+$n2+$n3;
        $nilai = $total / 3;
        return $nilai;
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
