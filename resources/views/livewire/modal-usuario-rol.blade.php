<div  id="modal_user" class="hidden bg-gray-100 contenido">
    <div class="h-8">
    </div>
    <div class="bg-gray-300 rounded shadow-md pantalla">
        <span class="cursor-pointer hover:text-red-400" onclick="ver('#modal_user')">X</span>
        <h2 class="text-lg text-center text-white">{{$titulo}}</h2>
        <div class="mt-4 tablas grid md:grid-cols-2 sm:grid-cols-1 sm:grid-rows-2 gap-2">
           <table id="origen" class="justify-center p-2 mx-auto text-sm bg-gray-100 shadow-md w-min mt-9 grid rounded-md">
              <tr class="border-2 border-white">
                  <th>ID</th>
                  <th>Mail</th>
                  <th>Action</th>
              </tr> 
              @foreach($usuarios as $fila)
                <tr>
                    <td>{{$fila->id}}</td>
                    <td>{{$fila->email}}</td>
                    <td> <input type="button" wire:click="agregar({{$fila->id}},'{{$fila->email}}')" class= "w-full bg-red-100 rounded cursor-pointer hover:bg-red-300" value="agregar" name="" id=""/></td>
                </tr>
              @endforeach
           </table>
           <table id="destino" class="justify-center p-2 mx-auto text-sm bg-gray-100 shadow-md w-min mt-9 grid rounded-md">
               <tr class="border-2 border-red-100">
               <th>ID</th>
               <th>Mail</th>
               <th>Action</th>
               </tr>
                @foreach($asignados as $fila_asig)
                <tr>
                    <td>{{$fila_asig->id}}</td>
                    <td>{{$fila_asig->name}}</td>
                    <td> <input type="button" wire:click="quitar({{$fila_asig->id}})" class= "w-full bg-red-100 rounded cursor-pointer hover:bg-red-300" value="Quitar" name="" id=""/></td>
                </tr>
                @endforeach
           </table>
        </div>
    </div>
</div>
