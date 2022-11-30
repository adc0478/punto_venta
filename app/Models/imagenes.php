<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class imagenes extends Model
{
    use HasFactory;
    protected $fillable = ['url','producto_id'];

    static function listar_imagemes($id_prod){
        return imagenes::select()->where('producto_id',$id_prod)->get();
    }
}
