<div>
 <form wire:submit.prevent="registrar" Method="post" class="p-4 bg-gray-100 shadow-md rounded-md">
    <input type="number" name="" value="" placeholder="ID" id="" wire:model.defer="idP"> 
    <input type="text" value="" name="" placeholder="Detalle" id="" wire:model.defer="name"/>
    <div>
    <input type="submit"  class="bg-blue-300 hover:bg-blue-400 hover:text-stone-100 btn" value="registrar"/>
    <input type="button" class="bg-yellow-300 hover:bg-yellow-400 hover:text-stone-100 btn" value="Cancelar" name=""  id="" wire:click="limpiar"/>
    <input type="button" class="bg-red-300 hover:bg-red-400 hover:text-stone-100 btn" value="Borrar" name=""  id="" wire:click="borrar"/>
    @error('name')
         <span>{{$message}}</span>
    @enderror    
    </div> 
    
 </form> 
<table class="justify-center p-2 mx-auto bg-gray-100 shadow-md w-min mt-9 grid rounded-md">
    <tr class="border-2 border-white">
      <th  >ID</th>
      <th>Name</th>
      <th>Accion</th>
    </tr>
    @foreach ($datos as $fila)
      <tr class="border-2 border-white" >
        <td class="p-2">{{$fila->id}}</td>
        <td>{{$fila->name}}</td>
        <td><input type="button" value="edit" class="h-6 mx-auto text-white cursor-pointer bg-emerald-100 hover:bg-emerald-300 hover:text-stone-100 w-9 grid " wire:click="editar({{$fila->id}},'{{$fila->name}}')">
      </tr>
    @endforeach
  </table>
</div>
