<?php

use App\Http\Controllers\carritoController;
use App\Http\Controllers\homeControler;
use App\Http\Controllers\permisosController;
use App\Http\Controllers\rolesController;
use App\Http\Controllers\unidadesController;
use App\Http\Controllers\categoriasController;
use App\Http\Controllers\productosController;
use App\Http\Livewire\ImageCreateComponent;
use App\Http\Controllers\ventaControler;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',homeControler::class)->name('home');
Route::get('/test',[homeControler::class,'test'])->name('test');
Route::get('/login',[homeControler::class,'logear'])->name('login');
Route::get('/registro',[homeControler::class,'registrar'])->name('registro');
Route::get('/permisos',[permisosController::class,'ver_formulario'])->name('permisos')->middleware('acceso:permisos');
Route::get('/roles',rolesController::class)->name('roles')->middleware('acceso:roles');
Route::get('/unidades',unidadesController::class)->name('unidades')->middleware('acceso:unidades');
Route::get('/categorias',categoriasController::class)->name('categorias')->middleware('acceso:categorias');
Route::get('/productos',productosController::class)->name('productos')->middleware('acceso:productos');
Route::get('/producto/{id?}',[productosController::class,'ver_producto'])->name('producto');
Route::post('/ingresarImg',[ImageCreateComponent::class,'subir_img'])->name('ingresarImg');
Route::get('/venta',[ventaControler::class,'venta'])->name('venta');
Route::get('/carrito',carritoController::class)->name('carrito');
Route::post('/lista_de_productos',[productosController::class,'lista_de_productos'])->name('lista_de_productos');
Route::post('/confirmacion_venta',[ventaControler::class,'confirmar_venta'])->name('confirmacion_venta');

