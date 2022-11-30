<?php

namespace App\Http\Livewire;

use App\Models\categorias;
use Livewire\Component;

class CategoriasComponent extends Component
{
    public $lista_categorias;
    public $id_categorias;
    public $name;
    public $detalle;
    protected $rules = ['name' => 'required', 'detalle' => 'required'];
    public function registrar(){
        $this->validate();
        categorias::updateOrCreate(['id'=>$this->id_categorias],['name'=>$this->name, 'description'=>$this->detalle]);
        $this->cancelar();
    }
    public function borrar($id){
       categorias::destroy($id);
    }
    public function cancelar(){
        $this->reset('id_categorias','name','detalle');
    }
    public function editar($id,$name,$detalle){
        $this->id_categorias = $id;
        $this->name = $name;
        $this->detalle = $detalle;
    }
    public function render()
    {
        $this->lista_categorias = categorias::all();
        return view('livewire.categorias-component');
    }
}
