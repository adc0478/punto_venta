<div class="w-9/12 mx-auto mt-3 grid md:grid-cols-3 gap-2 sm:grid-cols-1">
    @foreach ($lista_productos as $producto)
        <x-targeta_producto_component>
            <x-slot:name>{{$producto->name}}</x-slot>
            <x-slot:descripcion>{{$producto->description}}</x-slot>
            <x-slot:url>{{$producto->url}}</x-slot>
            <x-slot:categoria>{{$producto->categoria}}</x-slot>
            <x-slot:precio>{{$producto->precio}}</x-slot>
            <x-slot:id>{{$producto->id}}</x-slot>
            <x-slot:unidad>{{$producto->unidad}}</x-slot>
        </x-targeta_producto_component>
    @endforeach
</div>
