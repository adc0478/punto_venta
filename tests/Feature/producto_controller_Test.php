<?php

namespace Tests\Feature;

use App\Models\permiso_rol;
use App\Models\permisos;
use App\Models\productos;
use App\Models\rol_usuario;
use App\Models\roles;
use App\Models\User;
use Illuminate\Contracts\Auth\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class producto_controller_test extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function estructura_bd(){
        //crear usuario
        $user = User::factory()->create();
        //Crear role
        $role = new roles();
        $role->name_rol = 'adm';
        $role->save();
        //Crear permiso
        $permisos = new permisos();
        $permisos->name ='productos';
        $permisos->save();
        //crear relacion rol usuario
        $relacion_rol_user = new rol_usuario();
        $relacion_rol_user->name ='productos';
        $relacion_rol_user->usuario_id = $user->id;
        $relacion_rol_user->rol_id = $role->id;
        $relacion_rol_user->save();
        //crear relacion permiso rol
        $relacion_permiso_rol = new permiso_rol();
        $relacion_permiso_rol->name = 'productos';
        $relacion_permiso_rol->rol_id = $role->id;
        $relacion_permiso_rol->permiso_id = $permisos->id;
        $relacion_permiso_rol->save();
        return $user;
    }
    public function test_middleware_productos_redireccion()
    {
        $response = $this->get('http://localhost/productos');
        $response->assertStatus(302)->assertRedirect('/');
    }
    public function test_middleware_productos_ingreso()
    {
        $user = $this->estructura_bd();
        $response = $this->actingAs($user)->get('http://localhost/productos');
        //cerrar secion

        $response->assertStatus(200);
    }
    public function test_consulta_productos(){
        $prod = new productos();
        $data = $prod->consulta_completa("","", []);
        $this->assertIsObject($data);
    }
    public function test_consulta_productos_con_paginacion(){
        $prod = new productos();
        $data = $prod->consulta("","", []);
        $this->assertIsObject($data);
    }
    public function test_consulta_por_id(){

    }
    
}
