<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class categoriasController extends Controller
{
  public function __invoke()
  {
     return view('categorias'); 
  }
}
