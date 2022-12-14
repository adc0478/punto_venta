<?php

namespace App\Http\Controllers;

use App\Models\imagenes;
use App\Models\productos;
use Illuminate\Http\Request;

class productosController extends Controller
{
    public function __invoke()
    {
        return view('productos');
    }
    /**
    @param No llevar
    @return JSON retorna todos los productos 
    */
    public function lista_de_productos(){
        $prod = new productos();
        $lista = $prod->consulta_completa("","",[]);
        return json_encode($lista);
    }
    /**
    * @param integer $id id del producto a ver
    * @return view retorna una pagina 'producto' con los datos del producto y su lista de imagenes 
    */
    public function ver_producto($id){
        $prod = new productos();
        $dato = $prod->consulta($id);
        $imagenes = imagenes::listar_imagemes($id); 
        return view ('producto',['datos'=>$dato,'imagenes'=>$imagenes]);
    }
    
}
