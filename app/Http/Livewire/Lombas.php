<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Lomba;
use App\Models\Peserta;
use Illuminate\Support\Facades\DB;
use PdfReport;

class Lombas extends Component
{
    public $lombas, $jenis, $nama, $lomba_id;
    public $isOpen = 0;
    public $id_aktif = -1;
    public function render()
    {
        $this->lombas = Lomba::all();
        return view('livewire.lombas');
    }

    public function create(){
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal(){
        $this->isOpen = true;
    }

    public function closeModal(){
        $this->isOpen = false;
    }

    public function resetInputFields(){
        $this->lomba_id = '';
        $this->jenis = 'Paduan Suara';
        $this->nama = '';
        $this->gambar = '';
    }

    public function store(){
        $this->validate([
            'nama' => 'required'
        ]);
        Lomba::updateOrCreate(['id'=> $this->lomba_id],[
            'id'=> $this->lomba_id,
            'jenis'=> $this->jenis,
            'nama'=> $this->nama
        ]);

        session()->flash('message',
            $this->lomba_id ? 'Lomba Diupdate.':'Lomba Dibuat.');
        
            $this->closeModal();
            $this->resetInputFields();
    }

    public function edit($id){
        $lomba = Lomba::findOrFail($id);
        $this->lomba_id= $id;
        $this->jenis = $lomba->jenis;
        $this->nama = $lomba->nama;

        $this->openModal();
    }

    public function delete($id){
        Lomba::find($id)->delete();
        Peserta::where('lomba_id','=',$id)->delete();
        session()->flash('message','Lomba & Pesertanya Dihapus.');
    }

    public function peserta($idx){
        return redirect()->to('pesertas/'.$idx);
    }

    public function aktivasi($id){
        if($this->id_aktif != -1){            
            $this->deaktivasi($this->id_aktif);            
        } else {
            $cek = Lomba::where('aktif','=', true);
            if($cek->exists()){
                $cek->update(['aktif'=>false]);
            }
        }

        $data_aktif = Lomba::where('id','=',$id);
        $data_aktif->update([
            'aktif' => true,
        ]);
        $this->id_aktif = $id;
    }
    public function deaktivasi($id){
        $data_aktif = Lomba::where('id','=',$id);
        $data_aktif->update([
            'aktif' => false,
        ]);
    }

    public function laporan($lombax){
        $meta = [
            'Laporan' => 'Lomba',
            'Urutan' => 'Juara'
        ];
        $title = DB::table('lombas')->where('aktif','=','1')->value('nama');
        $queryBuilder = DB::table('pesertas')
                            ->select(DB::raw("RANK() OVER (ORDER BY nilai DESC) AS juara, nama, nilai"))                            
                            ->where('lomba_id','=', $lombax)
                            ->orderBy('juara');


        $columns = [
            'Juara' => 'juara',
            'Nama Peserta' => 'nama',
            'Nilai' => 'nilai',
            'Medali' => function($result){
                if($result->nilai >= 80){
                    return $med = 'GOLD';
                } elseif($result->nilai >= 70){
                    return $med = 'SILVER';
                } elseif($result->nilai >= 0){
                    return $med = 'BRONZE';
                } else {
                    return 'TIDAK VALID';
                }
            }
        ];

        return PdfReport::of($title, $meta, $queryBuilder, $columns)->stream();
    }

    public function fmedali($angka){
        $med = '';
        if($angka >= 80){
            $med = 'GOLD';
        } elseif($angka >= 70){
            $med = 'SILVER';
        } elseif($angka >= 0){
            $med = 'BRONZE';
        } else {
            'TIDAK VALID';
        }
        return $med;
    }

}
