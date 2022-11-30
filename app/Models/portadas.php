<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class portadas extends Model
{
    use HasFactory;
    protected $fillable = ['imagen_id','producto_id'];
}
