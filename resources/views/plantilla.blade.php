<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width" />
        <title>@yield('titulo')</title>
        <script src="https://cdn.tailwindcss.com"></script>
        @livewireStyles
    </head>
    <link rel="stylesheet" href="{{asset('build/assets/app.9fa9f508.css')}}" type="text/css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="{{asset('css/formulario.css')}}" type="text/css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="{{asset('css/modal.css')}}" type="text/css" media="screen" title="no title" charset="utf-8">
    <body>
       <x-menu_esp/>
       @yield('contenido')
    @livewireScripts
    <script src="{{asset('js/modales.js')}}" charset="utf-8"></script>
    </body>
</html>


<script charset="utf-8">
    function ver_cantidad_carrito(){
        let visor ="";
        let contenido = JSON.parse(localStorage.getItem('punto_venta'));
        if (contenido != null){
        let cantidad = Object.keys(contenido).length;
        visor = `
            <a href="{{route('carrito')}}" class="relative w-full" style="border-radius:50%;"><img class="z-10" src="{{asset('/icon/shopping_cart.png')}}"><span class="absolute top-0 w-1/2 font-semibold text-center text-red-500 left-2">${cantidad}</span></a>
        `;
        }
        document.querySelector('.carrito').innerHTML = visor;
    }
    window.onload = ver_cantidad_carrito;
</script>
