<div class="w-3/5 mx-auto grid grid-cols-2">
    <!--Select con las img -->
     
     <input type="button" class="w-full rounded shadow hover:shadow-md hover:cursor-pointer" value="ver imagen" name="" id="" onclick="view_image()"/> 
    <!--BTN para acceder a formulario carga -->
     <input type="button" class="w-full rounded shadow hover:shadow-md hover:cursor-pointer" value="cargar" name="" id="" onclick="ver_form_carga_img()"/> 
    <!--Formulario carga-->
    <input type="text" wire:model="prod_id" class="hidden prod_id"/>
    <div class="absolute bottom-0 left-0 items-center hidden w-screen h-screen bg-gray-300 bg-opacity-75 grid-cols-1 justify-items-center" id="form_carga_img">
        <div class="relative content-center w-2/5 bg-blue-300 rounded shadow-md h-1/4 justify-items-center grid-cols-2 grid">
            <span class="absolute top-0 right-0 w-5 h-5 text-center rounded hover:bg-red-600 hover:text-white hover:cursor-pointer hover:shadow-md" onclick="ocultar_form_carga_img()">X</span>
            <input type="file"  placeholder="subir imagen" class="items-center img"/> 
            <input type="button" onclick="subir_img()" class="w-2/5 bg-red-200 rounded hover:bg-red-400 hover:shadow hover:text-white h-3/5 hover:cursor-pointer" value="subir"/>      
             <label class="grid grid-cols-2"> <input type="checkbox" value="1" name="" id="portada" class="w-4 h-4"/>Set portada</label>
        </div>
    </div>
    <div class="absolute top-0 left-0 hidden w-full h-full carrusel">
       <x-slider_img :datos="$lista_img" /> 
    </div>
</div>

<script>

function view_image(){
    let compo = document.querySelector('.elementos').children;
    if (compo.length > 0){
         document.querySelector('.carrusel').style.display="block";
        compo[seleccion].setAttribute('class','visto');
    }
}
function subir_img(){
    let flag_portada = 0;
    if (document.querySelector('#portada').checked){
       flag_portada = 1; 
    }
    let archivo = new FormData();
    window.CSRF_TOKEN = '{{ csrf_token() }}';
    archivo.append('foto',document.querySelector('.img').files[0]);
    archivo.append('prod_id',document.querySelector('.prod_id').value);
    archivo.append('portada',flag_portada);
       fetch('ingresarImg', {
                headers: {'X-CSRF-TOKEN': window.CSRF_TOKEN},
                method: 'POST',
                body: archivo
            })
                .then(response => response.text())
                .then(datos => {
                  alert (datos);
                });
  } 
</script>
