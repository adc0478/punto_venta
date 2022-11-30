<?php

namespace App\Http\Livewire;

use App\Models\unidades;
use Livewire\Component;

class UnidadesComponent extends Component
{
    public $lista_unidades;
    public $id_unidades; 
    public $name;
    public $detalle;
    protected $rules = ['name' => 'required', 'detalle' => 'required'];
    public function editar ($id,$name,$descripcion){
        $this->id_unidades = $id;
        $this->name = $name;
        $this->detalle = $descripcion;
    }
    public function borrar($id){
      unidades::destroy($id);
    }
    public function cancelar(){
        $this->reset('id_unidades','name','detalle');
    }
    public function registrar(){
        $this->validate();
        unidades::updateOrCreate(['id'=>$this->id_unidades],['name'=>$this->name,'description'=>$this->detalle]);
        $this->cancelar();
    }
    public function render()
    {
        $this->lista_unidades = unidades::all();
        return view('livewire.unidades-component');
    }
}
