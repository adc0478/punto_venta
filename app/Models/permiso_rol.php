<?php

namespace App\Models;

use App\Models\rol_usuario; 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permiso_rol extends Model
{
    protected $fillable =['name','rol_id','permiso_id'];
    use HasFactory;

    public function listar_permisos_del_usuario($id_user){
        $roles = rol_usuario::where('usuario_id', $id_user)->get();
        $arreglo = array();
        foreach ($roles as $role) {
            array_push($arreglo, $role->rol_id);
        }
        $respuesta = permiso_rol::whereIn('rol_id', $arreglo)->get();
        return $respuesta;
    }
}
