<?php

namespace App\Http\Livewire;

use App\Models\productos;
use App\Models\unidades;
use App\Models\categorias;
use Livewire\Component;

class ProductosComponent extends Component
{
    public $name;
    public $detalle;
    public $precio;
    public $stock;
    public $categoria;
    public $unidad;
    public $filtro ="";
    public $lista_categoria = array();
    public $id_productos;
    public $lista_unidad =array();
    protected $rules = ['name' => 'required', 'detalle' => 'required', 'categoria' =>'required', 'unidad' =>'required'];
    public function registrar(){
        $this->validate();
        productos::updateOrCreate(['id'=>$this->id_productos],
            ['name'=>$this->name,
            'description'=>$this->detalle,
            'precio'=>$this->precio,
            'stock'=>$this->stock,
            'id_categoria'=>$this->categoria,
            'id_unidad'=>$this->unidad]);
        $this->cancelar();
    }
    public function borrar($id){
        productos::destroy($id);
    }
    public function cancelar(){
        $this->reset('id_productos','name','detalle','precio','stock');
        $this->emit('reset_img');
    }
    public function editar($id){
        $prod = new productos();
        $registro = $prod->consulta($id); 
        $this->id_productos = $registro[0]->id;
        $this->precio = $registro[0]->precio;
        $this->stock = $registro[0]->stock;
        $this->name = $registro[0]->name;
        $this->detalle = $registro[0]->description;
        $this->categoria = $registro[0]->id_cat;
        $this->unidad = $registro[0]->id_unidad;
        $this->emit('ver_imagenes',$id);
    }


    public function render()
    {
        $prod = new productos();
        $productos = $prod->consulta("",$this->filtro);
        $this->lista_unidad = unidades::all();
        $this->lista_categoria = categorias::all();
        return view('livewire.productos-component',['lista'=>$productos]);
    }
}
