<div>
<!--Formulario carga nuevo productos -->
    <form action="" method="get" accept-charset="utf-8" class="p-4 bg-gray-100 shadow-md rounded-md">
        <input type="number" wire:model.defer="id_productos" placeholder="ID"/>
        <input type="text" wire:model.defer="name" placeholder="Name"/>
        <input type="text" wire:model.defer="detalle" placeholder="Detalle"/>
        <input type="number" wire:model.defer="precio" placeholder="precio"/>
        <input type="text" wire:model.defer="stock" placeholder="stock"/>
        <select wire:model="categoria" paceholder="Categoria" id="some_name" >
           @foreach($lista_categoria as $dato)
                <option value="{{$dato->id}}">{{$dato->name}}</option>
           @endforeach
        </select>

        <select wire:model="unidad" id="some_name" placeholder="Unidad medida" >
           @foreach($lista_unidad as $datoU)
                <option value="{{$datoU->id}}">{{$datoU->name}}</option>
           @endforeach
        </select>

        @livewire('image-create-component')
        
        <div class="grid md:grid-cols-2 sm:grid-cols-1">
        <input type="button" wire:click="registrar" class="bg-blue-300 hover:bg-blue-400 hover:text-stone-100 btn" value="registrar"/>
        <input type="button" wire:click="cancelar" class="bg-red-300 hover:bg-red-400 hover:text-stone-100 btn" value="Cancelar"/>
        </div>
        <div class="grid grid-cols-1">
            @error('name')
                <span class="text-red-500">{{$message}}</span>
            @enderror
            @error('detalle')
                <span class="text-red-500">{{$message}}</span>
            @enderror
            @error('categoria')
                <span class="text-red-500">{{$message}}</span>
            @enderror
            @error('unidad')
                <span class="text-red-500">{{$message}}</span>
            @enderror
        </div>
    </form> 
<!-- Filtro por name--> 
       <div class="mx-auto mt-4 md:w-9/12 sm:w-full"> <input type="text" value="" name="" id="" placeholder="Filtrar por producto" wire:model="filtro" class="w-full text-gray-500 bg-gray-100 rounded shadow"/></div>
<!-- tabla productos -->
    <table class="justify-center p-2 mx-auto bg-gray-100 shadow-md w-min mt-9 grid rounded-md">
        <tr class="border-2 border-white">
            <th>ID</th>
            <th>Producto</th>
            <th>stock</th>
            <th>precio</th>
            <th>categoria</th>
            <th>unidad</th>
            <th>Action</th>
        </tr>
        @foreach ($lista as $producto)
          <tr class="border-2 border-white">
              <td>{{$producto->id}}</td>
              <td>{{$producto->name}}</td>
              <td>{{$producto->stock}}</td>
              <td>{{$producto->precio}}</td>
              <td>{{$producto->categoria}}</td>
              <td>{{$producto->unidad}}</td>

              <td> <input type="button" value="Editar" name="" id="" class="w-12 h-6 mx-auto text-white cursor-pointer bg-emerald-100 hover:bg-emerald-300 hover:text-stone-100 grid" wire:click="editar({{$producto->id}})"/> </td>
              <td> <input type="button" value="Borrar" name=""  class="w-12 h-6 mx-auto text-white bg-red-100 cursor-pointer hover:bg-red-300 hover:text-stone-100 grid" id="" wire:click="borrar({{$producto->id}})" /> </td>
          </tr>
        @endforeach

    </table>
    <div class="justify-center w-9/12 mx-auto bg-white-100 mt-9">
        {{$lista->links()}} 
    </div>
</div>
