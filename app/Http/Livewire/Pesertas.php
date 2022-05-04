<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Peserta;
use App\Models\Lomba;

class Pesertas extends Component
{
    public $pesertas, $lombas, $lomba_id, $urutan, $nama, $juri1, $nilai1, $juri2, $nilai2, $juri3, $nilai3, $nilai, $rangking, $medali, $aktif, $tahap,  $peserta_id;
    public $isOpen = 0;
    protected $lbx;

    public function mount($idx){
        $this->lombas = Lomba::findOrFail($idx);
        $this->lbx = $idx;               
    }
    public function render()
    {
        $this->pesertas = Peserta::where('lomba_id','=',$this->lombas->id)->get(); 
        return view('livewire.pesertas');
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
        $this->lomba_id = $this->lombas->lomba_id;
        $this->urutan = 0;
        $this->nama = '';
    }

    public function store(){
        $this->validate([
            'urutan' => 'required',
            'nama' => 'required'
        ]);
        Peserta::updateOrCreate(['id'=> $this->peserta_id],[
            'id' => $this->peserta_id,
            'lomba_id' => $this->lombas->id,
            'urutan' => $this->urutan,
            'nama' => $this->nama,
        ]);

        session()->flash('message',
            $this->peserta_id ? 'Peserta Diupdate.':'Peserta Didaftarkan.');
        
            $this->closeModal();
            $this->resetInputFields();
    }

    public function edit($id){
        $peserta = Peserta::findOrFail($id);
        $this->peserta_id = $id;
        $this->lomba_id = $peserta->lomba_id;
        $this->urutan = $peserta->urutan;
        $this->nama = $peserta->nama;

        $this->openModal();
    }

    public function delete($id){
        Peserta::find($id)->delete();
        session()->flash('message','Peserta Dihapus');
    }
}
