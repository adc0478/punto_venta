<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\roles;
use App\Http\Livewire\ModalUsuarioRol;

class GestionRoles extends Component
{
    public $lista_roles;
    public $id_rol;
    public $name;
    protected $rules = ['name' => 'required'];
    public function editar ($id, $name){
        $this->id_rol = $id;
        $this->name = $name;
        $this->emit('emit_id',$id);
        $this->emit('ver_btn');
    }
    
    public function registrar(){
        $this->validate();
        roles::updateOrCreate(['id' => $this->id_rol],['name_rol'=>$this->name]);
        $this->limpiar();
    }
    public function borrar($id){
        $id_adm = roles::select('id')->where('name_rol',"adm")->get();
        if ($id_adm[0]->id != $id){
          roles::destroy($id);
        }
    }
    public function limpiar(){
        $this->reset('name','id_rol');
        $this->emit('ocultar_btn');
    }
    public function render()
    {
        $this->lista_roles = roles::all();
        return view('livewire.gestion-roles');
    }
}
