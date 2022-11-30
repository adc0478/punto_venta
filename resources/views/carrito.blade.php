@extends('plantilla')
@section('titulo','Mi carrito')
@section('contenido')
    <div id="tabla" class="w-9/12 h-auto mx-auto mt-10">
       

    </div>
     <div id="controles" class="w-1/4 mx-10 my-10 grid grid-cols-2 gap-3"> 
       <input type="button" onclick="confirmar_compra()" value="Confirmar compra" class="p-2 bg-gray-100 rounded shadow-md hover:bg-green-300 hover:cursor-pointer hover:text-white" name="" id=""/>
       <input type="button" onclick="eliminar_carrito()" value="Eliminar compra" class="bg-gray-100 rounded shadow-md hover:bg-green-300 hover:cursor-pointer hover:text-white" name="" id=""/>
     </div>
     
<script type="text/javascript">
    window.CSRF_TOKEN = '{{ csrf_token() }}';
</script>
<script src="{{asset('/js/carrito.js')}}" charset="utf-8" ></script>
@endsection


