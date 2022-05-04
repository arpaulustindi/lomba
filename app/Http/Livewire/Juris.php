<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
class Juris extends Component
{
    public $juris, $name, $juri, $juri_id;
    public $isOpen = 0;
    public function render()
    {
        $this->juris = User::where('level','=','JURI')->get();
        return view('livewire.juris');
    }

    public function openModal(){
        $this->isOpen = true;
    }

    public function closeModal(){
        $this->isOpen = false;
    }

    public function resetInputFields(){
        $this->name = '';
    }

    public function store(){
        $this->validate([
            'name' => 'required'
        ]);
        User::updateOrCreate(['id'=> $this->juri_id],[
            'name'=> $this->name
        ]);

        session()->flash('message',
            $this->juri_id ? 'Juri Diupdate.':'Juri Dibuat.');
        
            $this->closeModal();
            $this->resetInputFields();
    }

    public function edit($id){
        $jurix = User::findOrFail($id);
        $this->juri_id = $id;
        $this->name = $jurix->name;

        $this->openModal();
    }
}
