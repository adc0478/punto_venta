<?php

namespace App\Http\Controllers;
use App\Models\roles;
use Illuminate\Http\Request;

class homeControler extends Controller
{
    public function __invoke(){
        return view('home');
    }
    public function logear(){
       return view('auth.login'); 
    }
    public function registrar(){
      return view('auth.register');
    }
    public function dashboard(){
      return view('dashboard');
    }
    public function test(){
        $dato = roles::select('id')->where('name_rol','adm')->get(); 
        return $dato[0]->id;
}
    
}
