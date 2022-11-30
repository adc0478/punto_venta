<?php

namespace App\View\Components;
use Illuminate\support\Facades\Auth;
use App\Models\permiso_rol;
use Illuminate\View\Component;

class menu extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $valor;
    public $permisos;
    public function __construct(){
        $modelo = new permiso_rol();
        $this->permisos = $modelo->listar_permisos_del_usuario(Auth::id()); 
        $this->valor = array();
        $this->cargar_item_al_menu('permisos');
        $this->cargar_item_al_menu('roles');
        $this->cargar_item_al_menu('unidades');
        $this->cargar_item_al_menu('categorias');
        $this->cargar_item_al_menu('productos');
        array_push($this->valor,['venta','venta']);
        array_push($this->valor,['login','login']);
        array_push($this->valor,['registro','registro']);
        
    }
    public function cargar_item_al_menu($opcion){
        foreach($this->permisos as $dato){
            if ($dato->name == $opcion) {
                 array_push($this->valor,[$opcion,$opcion]);      
            }

        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.menu');
    }
}
