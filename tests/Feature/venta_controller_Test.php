<?php

namespace Tests\Feature;

use App\Http\Controllers\ventaControler;
use App\Models\categorias;
use App\Models\productos;
use App\Models\unidades;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

use function GuzzleHttp\json_decode;

class venta_controller_test extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    public $json = ['1'=>'2','2'=>'1'];
    public function crear_estructura(){
        //crear 2 categorias
        $cat = new categorias();
        $cat->name = "frio";
        $cat->description ="frio";
        $cat->save();
        $cat2 = new categorias();
        $cat2->name = "calido";
        $cat2->description ="calido";
        $cat2->save();
        //crear 2 unidades
        $unidad = new unidades();
        $unidad->name ="gramo";
        $unidad->description ="gramo";
        $unidad->save();
        $unidad2 = new unidades();
        $unidad2->name ="gramo";
        $unidad2->description ="gramo";
        $unidad2->save();
        //crear 2 productos
        $prod1 = new productos();
        $prod1->name = "papa";
        $prod1->description ="cruda";
        $prod1->precio = 23;
        $prod1->stock = 23;
        $prod1->id_categoria= $cat->id;
        $prod1->id_unidad = $unidad->id;
        $prod1->save(); 
        $prod2 = new productos();
        $prod2->name = "papa";
        $prod2->description ="cruda";
        $prod2->precio = 24;
        $prod2->stock = 24;
        $prod2->id_categoria= $cat2->id;
        $prod2->id_unidad = $unidad2->id;
        $prod2->save();
    }

    public function test_metodo_confirmar_venta()
    {
        $json_prueba = new Request(array('data'=>$this->json));
       //crear usuario
         $user = User::factory()->create();
        //cargar la estructura de datos
        $this->crear_estructura();
        //ejectuar la funcion confirmar_venta
        $venta = new ventaControler();
        $this->actingAs($user);
        $response = $venta->confirmar_venta($json_prueba);  
        //ver que retorne un entero (Numero de remito) 
        $this->assertIsInt($response);
    }
    public function test_metodo_confirmar_venta_sin_usuario()
    {
        $json_prueba = new Request(array('data'=>$this->json));
        //cargar la estructura de datos
        $this->crear_estructura();
        //ejectuar la funcion confirmar_venta
        $venta = new ventaControler();
        $response = $venta->confirmar_venta($json_prueba);  
        //ver que retorne un entero (Numero de remito) 
        $this->assertSame('error_usuario',$response);
    }
    public function test_metodo_confirmar_venta_sin_carrito()
    {
        $json_prueba = new Request(array('data'=>[]));
       //crear usuario
         $user = User::factory()->create();
        //cargar la estructura de datos
        $this->crear_estructura();
        //ejectuar la funcion confirmar_venta
        $venta = new ventaControler();
        $this->actingAs($user);
        $response = $venta->confirmar_venta($json_prueba);  
        //ver que retorne un entero (Numero de remito) 
        $this->assertSame('error_carro_vacio',$response);
    }
}
