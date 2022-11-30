 <div  id="modal_permiso" class="bg-gray-100 contenido">
    <div class="h-8">
    </div>
    <div class="bg-gray-300 rounded shadow-md pantalla">
        <span class="cursor-pointer hover:text-red-400" onclick="ver('#modal_permiso')">X</span>
        <h2 class="text-lg text-center text-white">{{$titulo}}</h2>
        <div class="mt-4 tablas grid md:grid-cols-2 sm:grid-cols-1 sm:grid-rows-2 gap-2">
           <div class="text-center box-border"><strong class="text-blue-600" >Permisos disponibles</strong>
           <table id="origen" class="justify-center p-2 mx-auto text-sm bg-gray-100 shadow-md w-min mt-9 grid rounded-md">
              <tr class="border-2 border-white">
                  <th>ID</th>
                  <th>Detalle</th>
                  <th>Action</th>
              </tr> 
              @foreach($lista_permisos as $fila)
                <tr class="border-2 border-white">
                    <td>{{$fila->id}}</td>
                    <td>{{$fila->name}}</td>
                    <td> <input type="button" class= "w-full bg-red-100 rounded cursor-pointer hover:bg-red-300" wire:click="agregar({{$fila->id}},'{{$fila->name}}')" value="agregar" name="" id=""/></td>
                </tr>
              @endforeach
           </table>

           </div>
           <div class="text-center box-border"><strong class="text-blue-600" >Permisos agregados</strong>
           <table id="destino" class="justify-center p-2 mx-auto text-sm bg-gray-100 shadow-md w-min mt-9 grid rounded-md" >
               <tr class="border-2 border-white">
               <th>ID</th>
               <th>Detalle</th>
               <th>Action</th>
               </tr>
                @foreach($lista_roles_permisos as $fila_asig)
                <tr class="border-2 border-white">
                    <td>{{$fila_asig->id}}</td>
                    <td>{{$fila_asig->name}}</td>
                    <td> <input type="button" class= "w-full bg-red-100 rounded cursor-pointer hover:bg-red-300" value="Quitar" wire:click="quitar({{$fila_asig->id}})" name="" id=""/></td>
                </tr>
                @endforeach
           </table>
           </div>
        </div>
    </div>
</div>
