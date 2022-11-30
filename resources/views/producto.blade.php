@extends('plantilla')
@section('titulo',$datos[0]->name)
@section('contenido')
    <div class="mx-auto shadow-md md:w-1/2 sm:w-3/4">
        <div class="w-full mt-10 grid md:grid-cols-4 sm:grid-cols-2 gap-3">
            @foreach ($imagenes as $url)
                <img class="w-3/4 h-auto mx-auto rounded hover:shadow-md" src="{{asset($url->url)}}" alt="">
            @endforeach
        </div>
        <div class="mt-3 ml-3 grid grid-cols-1 gap-3">
            <h3><strong>producto: </strong> {{$datos[0]->name}}</h3>
            <h3><strong>Descripcion: </strong> {{$datos[0]->description}}</h3>

            <div class="grid grid-cols-2">
                <h3><strong>precio: </strong> {{$datos[0]->precio}}</h3>
                <h3><strong>Unidad de venta: </strong> {{$datos[0]->unidad}}</h3>
            </div>
                <h3><strong>Stock actual: </strong> {{$datos[0]->stock}} {{$datos[0]->unidad}}</h3>
            <div class="mt-5 mb-5 grid grid-cols-3">
                <input type="button" value="Cargar" onclick="cargar_en_carrito({{$datos[0]->id}})" name="" id="" class="w-1/2 h-10 bg-gray-300 rounded shadow-md cursor-pointer hover:bg-green-300"/>
                <label class="grid grid-cols-2"><strong>Cantidad</strong><input type="number" value="" name="" id="cantidad" class="border-2 border-solid"/></label>
            </div>
        </div>
        <div class="mje"></div>
    <div>
@endsection

<script charset="utf-8">
    function inicio_p(){
      //ver si hay en localstorange ya cargado el producto y cargar en el campo cantidad la cantidad existente

    }
    function cargar_en_carrito(codigo){
      let cantidad = document.querySelector('#cantidad').value;
       //registrar o reemplazar cantidad en localstorange
            if(localStorage.getItem('punto_venta')){
                var valor = JSON.parse(localStorage.getItem('punto_venta'));
            }else{
                var valor = {};
            }
            console.log(valor);
            if(valor[codigo]){
                valor[codigo] = (parseInt(valor[codigo]) + parseInt(cantidad)).toString();
            }else{
                valor[codigo] = cantidad;
            }
            localStorage.setItem('punto_venta', JSON.stringify(valor));
       //Mostrar un cartel con la indicacion de que el producto fue añadido
        let mostrar_mensaje =`
        <div class="w-full bg-red-100 mb-20px">
            <h2>Se agrego el producto al carrito</h2>
            <p>Por favor ingrese al carrito para ver el detalle de su compra</p>
        </div>
        `;
        document.querySelector('.mje').innerHTML = mostrar_mensaje;
       //esperar 10segundo y dirigir a la pagina de productos
        let salida = setTimeout(function (){window.location.href = 'http://localhost/punto_venta/public/venta'},2000);
    }
    window.onload=inicio_p;
</script>
