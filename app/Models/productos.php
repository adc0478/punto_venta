<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productos extends Model
{
    protected $fillable = ['name', 'description', 'precio', 'stock', 'id_categoria', 'id_unidad'];
    use HasFactory;

    /**
     *@param int $id ID utilizado para buscar un elemento puntual de productos
     *@param string $str Cadena de consulta con respecto al name del producto
     *@param array $cat Arreglo que contiene las categorias a filtrar ej. ['frio','lacteos']
     * @return string[] retorna lista de productos con todas sus propiedades
     */
    public function consulta_completa($id = "", $str = "", $cat = [])
    {
        $condicion = "<>";
        $condicion_name = "<>";
        if ($id != "") {
            $condicion = '=';
        }
        if ($str != "") {
            $condicion_name = 'like';
        }
        if (sizeof($cat) < 1){
            $cat = categorias::all(['name']);
        }
        $datos = productos::select(
            'productos.id',
            'productos.name',
            'productos.stock',
            'productos.precio',
            'productos.description',
            'categorias.name as categoria',
            'categorias.id as id_cat',
            'unidades.name as unidad',
            'unidades.id as id_unidad',
            'imagenes.url'
        )

        ->where('productos.id', $condicion, $id)
        ->where('productos.name', $condicion_name, '%' . $str . '%')
        ->whereIn('categorias.name',$cat)
        ->Join('categorias', 'categorias.id', 'productos.id_categoria')
        ->Join('unidades', 'unidades.id', 'productos.id_unidad')
        ->LeftJoin('portadas','portadas.producto_id','productos.id')
        ->LeftJoin('imagenes','portadas.imagen_id','imagenes.id')
        ->get();
        return $datos;
    }
    /**
     *@param int $id ID utilizado para buscar un elemento puntual de productos
     *@param string $str Cadena de consulta con respecto al name del producto
     *@param array $cat Arreglo que contiene las categorias a filtrar ej. ['frio','lacteos']
     * @return string[] retorna lista de productos con todas sus propiedades con paginacion
     */
    public function consulta($id = "", $str = "", $cat = [])
    {
        $condicion = "<>";
        $condicion_name = "<>";
        if ($id != "") {
            $condicion = '=';
        }
        if ($str != "") {
            $condicion_name = 'like';
        }
        if (sizeof($cat) < 1){
            $cat = categorias::all(['name']);
        }
        $datos = productos::select(
            'productos.id',
            'productos.name',
            'productos.stock',
            'productos.precio',
            'productos.description',
            'categorias.name as categoria',
            'categorias.id as id_cat',
            'unidades.name as unidad',
            'unidades.id as id_unidad',
            'imagenes.url'
        )

        ->where('productos.id', $condicion, $id)
        ->where('productos.name', $condicion_name, '%' . $str . '%')
        ->whereIn('categorias.name',$cat)
        ->Join('categorias', 'categorias.id', 'productos.id_categoria')
        ->Join('unidades', 'unidades.id', 'productos.id_unidad')
        ->LeftJoin('portadas','portadas.producto_id','productos.id')
        ->LeftJoin('imagenes','portadas.imagen_id','imagenes.id')
        ->paginate(10);
        return $datos;
    }
}
