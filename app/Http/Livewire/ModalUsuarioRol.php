<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\rol_usuario;
class ModalUsuarioRol extends Component
{
    public $titulo ="Gestion usuario rol";
    public $usuarios;
    public $dato_id;
    public $lista;
    public $estado;
    protected $listeners =['emit_id'=>'recibir','estado_usuario'=>'recibir_estado'];
    public function recibir_estado($post){
        $this->estado=$post;
    }
    public function recibir($post){
        $this->dato_id = $post;
    }
    public function quitar($id){
        rol_usuario::destroy($id);
    }
    public function agregar($id_usuario,$mail){
        rol_usuario::updateOrCreate(['usuario_id'=>$id_usuario,'rol_id'=>$this->dato_id],['name'=>$mail]);
    }
    public function render()
    {
        $arreglo = array();
        $this->lista = rol_usuario::select(['usuario_id'])
                ->where('rol_id',$this->dato_id)->get();
        foreach($this->lista as $valor){
            array_push($arreglo,$valor->usuario_id);
        }
        $this->usuarios = User::all()->except($arreglo);
                    
        $this->asignados =rol_usuario::where('rol_id',$this->dato_id)->get(); 

        $this->emit('estado_salida_usuario',$this->estado);
        return view('livewire.modal-usuario-rol');
    }
}
