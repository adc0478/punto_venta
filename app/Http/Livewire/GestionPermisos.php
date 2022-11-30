<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\permisos;

class GestionPermisos extends Component
{
    public $datos;
    public $idP;
    public $name;
    public $registro;
    protected $rules = [
       'name' =>'required'
    ];
    public function editar ($id, $name){
                $this->name = $name;
                $this->idP= $id;
    }
    public function limpiar(){
        $this->reset(['idP','name']);
    }
    public function registrar(){
        $this->validate();
        $this->registro = permisos::updateOrCreate(
            ['id' => $this->idP],
            ['name' => $this->name]);
        //registrar en admi
        $cargar_permiso_rol = new ModalPermisoRol();
        $cargar_permiso_rol->ingresar_permisos_en_adm($this->registro->id,$this->name);
        $this->limpiar();      
    }
    public function borrar(){
        if($this->idP != NULL){
           permisos::destroy($this->idP); 
        }
        $this->limpiar();
    }
    public function render()
    {
        $this->datos = permisos::all();
        return view('livewire.gestion-permisos');
    }
}
