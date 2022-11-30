<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\rol_usuario;
use App\Models\permiso_rol;
use App\Models\permisos;

class accesos
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $ruta)
    {
        //con usuario buscar permisos
        $user_id = Auth::id();
        if (!($user_id)) {
            return redirect()->route('home');
        }
        $roles = rol_usuario::where('usuario_id', $user_id)->get();
        $arreglo = array();
        foreach ($roles as $role) {
            array_push($arreglo, $role->rol_id);
        }
        $permiso = permisos::where('name', $ruta)->get();
        if (isset($permiso[0]->id)){
            $respuesta = permiso_rol::where('permiso_id', $permiso[0]->id)->whereIn('rol_id', $arreglo)->get();
        }
        if (isset($respuesta[0]->id)) {
            return $next($request);
        }
        //si no es igual retornar al home page
        return redirect()->route('home');
    }
}
