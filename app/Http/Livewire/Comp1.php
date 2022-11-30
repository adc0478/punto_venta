<?php

namespace App\Http\Livewire;

use Livewire\Component;
class Comp1 extends Component
{
    public $cont = 0;
    public function contar(){
        $this->cont++; 
    }
    public function render()
    {
        return view('livewire.comp1');
    }
}
