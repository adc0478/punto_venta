<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\permiso_rol;
use App\Models\permisos;
use App\Models\roles;

class ModalPermisoRol extends Component
{
    public $datos_rol;
    public $render;
    public $lista_roles_permisos;
    public $lista_permisos; 
    public $estado;
    public $titulo="Gestion permoso y roles";
    protected $listeners =['emit_id' =>'recibir','estado_permiso'=>'recibir_estado'];
    public function recibir_estado($post){
        $this->estado = $post;
    }
    public function recibir($post){
        $this->datos_rol = $post;
    } 
    public function quitar($id){
        permiso_rol::destroy($id);
    }
    public function ingresar_permisos_en_adm($id_permiso,$name_permiso){
        $dato = roles::select('id')->where('name_rol','adm')->get(); 
        $this->agregar($id_permiso,$name_permiso,$dato[0]->id);
    }
    public function agregar($id,$name,$rol=false){
      if (!$rol){
        $rol = $this->datos_rol;
      } 
      permiso_rol::updateOrCreate(['rol_id'=>$rol,'permiso_id'=>$id],['name'=>$name]);     
    }
    public function render()
    { 
        $arreglo =array();
        $lista = permiso_rol::select(['permiso_id'])
                ->where('rol_id',$this->datos_rol)->get();
        foreach($lista as $valor){
            array_push($arreglo,$valor->permiso_id);
        }
        $this->lista_permisos = permisos::all()->except($arreglo);
        $this->lista_roles_permisos =permiso_rol::where('rol_id',$this->datos_rol)->get(); 
        $this->emit('estado_salida_permiso',$this->estado);
        return view('livewire.modal-permiso-rol');
    }
}
