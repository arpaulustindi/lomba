<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Peserta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class Penilaian extends Component
{
    public $pesertas, $lombas, $lomba_id, $urutan, $nama, $juri1, $nilai1, $juri2, $nilai2, $juri3, $nilai3, $nilai, $rangking, $medali, $aktif, $tahap, $peserta_id;
    public $px;
    public $id_aktif = -1;
    public $juri_aktif = 0;
    public $isOpen = 0;
    public function rules(){
        if($this->juri_aktif == 1){
            return [
                'nilai1' => 'numeric|min:0|max:100',
            ];
        }elseif($this->juri_aktif == 2){
            return [
                'nilai2' => 'numeric|min:0|max:100',
            ];
        }elseif($this->juri_aktif == 3){
            return [
                'nilai3' => 'numeric|min:0|max:100', 
            ];
        }
    }


    protected $messages = [
        'nilai1.min' => 'Nilai Minimal Adalah 0',
        'nilai1.max' => 'Nilai Maksimal Adalah 100',
        'nilai1.numeric' => 'Nilai Harus Numerik',
        'nilai2.min' => 'Nilai Minimal Adalah 0',
        'nilai2.max' => 'Nilai Maksimal Adalah 100',
        'nilai2.numeric' => 'Nilai Harus Numerik',
        'nilai3.min' => 'Nilai Minimal Adalah 0',
        'nilai3.max' => 'Nilai Maksimal Adalah 100',
        'nilai3.numeric' => 'Nilai Harus Numerik',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        $this->juri_aktif = Auth::user()->juri;
        $this->px = DB::table('pesertas')->where('aktif','=','1')->value('id');
        $this->pesertas = Peserta::find($this->px);
        return view('livewire.penilaian');
    }
    public function openModal(){
        $this->isOpen = true;
    }

    public function closeModal(){
        $this->isOpen = false;
    }
    public function prapenilaian(){
        $this->validate();
        $this->openModal();
    }
    public function penilaian($jur){
        $this->validate();
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

        $this->closeModal();
    }
}
