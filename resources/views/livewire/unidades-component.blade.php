<div>
    <!--Formulario carga nuevo unidad -->
    <form action="" method="get" accept-charset="utf-8" class="p-4 bg-gray-100 shadow-md rounded-md">
        <input type="number" wire:model.defer="id_unidades" placeholder="ID"/>
        <input type="text" wire:model.defer="name" placeholder="Name"/>
        <input type="text" wire:model.defer="detalle" placeholder="Detalle"/>
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
        </div>
    </form> 
     <!--Filtro unidades cargadas-->

    <!--Lista de unidades ya cargadas-->
<!-- tabla roles -->
    <table class="justify-center p-2 mx-auto bg-gray-100 shadow-md w-min mt-9 grid rounded-md">
        <tr class="border-2 border-white">
            <th>ID</th>
            <th>Name</th>
            <th>Detalle</th>
            <th>Action</th>
        </tr>
        @foreach ($lista_unidades as $unidades)
          <tr class="border-2 border-white">
              <td>{{$unidades->id}}</td>
              <td>{{$unidades->name}}</td>
              <td>{{$unidades->description}}</td>
              <td> <input type="button" value="Editar" name="" id="" class="w-12 h-6 mx-auto text-white cursor-pointer bg-emerald-100 hover:bg-emerald-300 hover:text-stone-100 grid" wire:click="editar({{$unidades->id}},'{{$unidades->name}}','{{$unidades->description}}')"/> </td>
              <td> <input type="button" value="Borrar" name=""  class="w-12 h-6 mx-auto text-white bg-red-100 cursor-pointer hover:bg-red-300 hover:text-stone-100 grid" id="" wire:click="borrar({{$unidades->id}})" /> </td>
          </tr>
        @endforeach
    </table>

</div>
