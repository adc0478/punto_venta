<?php

namespace App\Http\Livewire;

use App\Models\productos;
use Livewire\Component;

class ProductosVenta extends Component
{
    public $filtro_name ="";
    public $filtro_categorias = [];
    public function render()
    {
        $lista_productos =[];
        $productos = new productos();
        $lista_productos = $productos->consulta("",$this->filtro_name,$this->filtro_categorias);
        return view('livewire.productos-venta',['lista_productos'=>$lista_productos]);
    }
}
