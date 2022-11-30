<div class="w-full bg-blue-100 rounded shadow-md h-72 hover:bg-blue-200">
    <a href="{{route('producto').'/'.$id}}" class="w-full h-full">
        <div class="w-3/4 mx-auto bg-center bg-no-repeat bg-contain h-3/5" style="background-image: url('{{asset($url)}}');"></div>
        <div class="mx-1 my-1 mt-2 grid md:grid-cols-2">
            <span><strong>Nombre:</strong> {{$name}}</span>
            <span class="h-min">{{$descripcion}}</span>
        </div>
        <div class="mx-1 grid grid-cols-2">
            <span><strong>Precio:</strong> {{$precio}}</span>
            <span><strong>Por:</strong> {{$unidad}}</span>
        </div>
    </a>
</div>
