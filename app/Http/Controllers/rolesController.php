<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class rolesController extends Controller
{

   public function __invoke()
   {
        return view ('roles');
   }
}
