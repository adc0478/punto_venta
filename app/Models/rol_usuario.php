<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rol_usuario extends Model
{
    protected $fillable = ['name','usuario_id','rol_id'];
    use HasFactory;
}
