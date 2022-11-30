<div>
    <!-- ingreso rol -->
    <h1>Gestion roles</h1>
    <form wire:submit.prevent="registrar" Method="post" class="p-4 bg-gray-100 shadow-md rounded-md">
    <input type="number" name="" value="" placeholder="ID" id="id" wire:model.defer="id_rol"> 
    <input type="text" value="" name="" placeholder="Detalle" id="name" wire:model.defer="name"/>
    <div class="grid md:grid-cols-4 sm:grid-cols-1">
    <input type="submit"  class="bg-blue-300 hover:bg-blue-400 hover:text-stone-100 btn" value="registrar"/>
    <input type="button" class="bg-yellow-300 hover:bg-yellow-400 hover:text-stone-100 btn" value="Cancelar" name=""  id="" wire:click="limpiar"/>
    <input type="button" class="hidden bg-rose-400 hover:bg-rose-500 hover:text-stone-100 btn" value="Usuarios-rol" name=""  id="btn_user" onclick="open_usuario()"/>
    <input type="button" class="hidden bg-indigo-300 hover:bg-indigo-400 hover:text-stone-100 btn" value="Permiso-rol" name=""  id="btn_permiso" onclick="open_permiso()"/>
       
    </div> <div></div>
    @error('name')
         <span>{{$message}}</span>
    @enderror 
 </form>
    <!-- tabla roles -->
    <table class="justify-center p-2 mx-auto bg-gray-100 shadow-md w-min mt-9 grid rounded-md">
        <tr class="border-2 border-white">
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        @foreach ($lista_roles as $role)
          <tr class="border-2 border-white">
              <td>{{$role->id}}</td>
              <td>{{$role->name_rol}}</td>
              <td> <input type="button" value="Editar" name="" id="" class="w-12 h-6 mx-auto text-white cursor-pointer bg-emerald-100 hover:bg-emerald-300 hover:text-stone-100 grid" wire:click="editar({{$role->id}},'{{$role->name_rol}}')"/> </td>
              <td> <input type="button" value="Borrar" name=""  class="w-12 h-6 mx-auto text-white bg-red-100 cursor-pointer hover:bg-red-300 hover:text-stone-100 grid" id="" wire:click="borrar({{$role->id}})" /> </td>
          </tr>
        @endforeach
    </table>
    <!-- modal asociacion usuario-rol -->

    <!-- Modal toggle -->

    <!-- Modal toggle -->
    @livewire('modal-usuario-rol')
    <!-- modal asociacion rol-permisos -->
    @livewire('modal-permiso-rol')
<script charset="utf-8">
    var ver_modal = 1; 
</script>
</div>
