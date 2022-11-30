<?php

namespace App\Http\Controllers;

use App\Models\productos;
use App\Models\remitos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ventaControler extends Controller
{
    public function venta(){
        return view('lista_productos_venta');
    }
    public function confirmar_venta(request $res){
        if (Auth::check()){
            $salida =[];
            //response->data trae el listado de productos y cantidad
            $datos = $res->data;
            //consultar todos los productos al modelo productos 
            $productos = new productos();
            $lista = $productos->consulta_completa("","",[]);
            /* //crear un id de remito y registrar en tabla remitos */
            $remito = new remitos();
            $remito->facturacion = Now();
            $remito->users_id = Auth::id();
            $remito->save();
            //recorrer todos los productos usando data e insertar en la tabla ventas
            /* return $datos['4']; */
            foreach ($lista as $fila) {
                if (isset($datos[$fila['id']])){
                    array_push($salida,[
                        'cantidad' => $datos[$fila['id']],
                        'remitos_id' => $remito['id'],
                        'productos_id' => $fila['id'],
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                } 
            }
            if (sizeof($salida) > 0){
                DB::TABLE('ventas')->insert($salida);
                return $remito->id;
            }
            return "error_carro_vacio";
            //enviar al cliente el id de remito
        }
        return 'error_usuario';
    }
}
