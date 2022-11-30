function inicio(){
    document.querySelector('#modal_user').style.display="none";
    document.querySelector('#modal_permiso').style.display="none";
    window.livewire.emit('estado_permiso',1);
    window.livewire.emit('estado_usuario',1);
}
function editar (id, name){
    document.querySelector('#id_rol_usuario').value = id;
    document.querySelector('#id_rol_permiso').value = id;
    document.querySelector('#id').value =id;
    document.querySelector('#name').value = name;
    
}
function ver (){
        window.livewire.emit('estado_permiso',1);
        window.livewire.emit('estado_usuario',1);
    }
function ver_form_carga_img(){
  document.querySelector('#form_carga_img').style.display="grid";      
}
function ocultar_form_carga_img(){
  document.querySelector('#form_carga_img').style.display="none";      
}
function open_permiso(){
    window.livewire.emit('estado_permiso',0);
}
function open_usuario(){
    window.livewire.emit('estado_usuario',0);
}
window.livewire.on('estado_salida_permiso',(post)=>{
    if (post == 1){
        document.querySelector('#modal_permiso').style.display="none";
    }else{
        document.querySelector('#modal_permiso').style.display="block";
    }
});
window.livewire.on('estado_salida_usuario',(post)=>{
    if (post == 1){
        document.querySelector('#modal_user').style.display="none";
    }else{
        document.querySelector('#modal_user').style.display="block";
    }
});
window.livewire.on('ver_btn',function (){
    document.querySelector("#btn_user").style.display ="block";
    document.querySelector("#btn_permiso").style.display ="block";
})
window.livewire.on('ocultar_btn',function () {
   document.querySelector("#btn_user").style.display ="none";
   document.querySelector("#btn_permiso").style.display ="none";
})

window.onload =inicio;
