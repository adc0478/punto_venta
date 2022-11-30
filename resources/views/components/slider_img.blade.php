<div class="componente ">
   <div class="elementos">
    @foreach ($datos as $fila)
        <div class="oculto">
            <img src="{{asset($fila->url)}}" class="object-contain w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg " alt=""/>
            <span class="span1" onclick="quitar_modal()">x</span>
            <span class="span2" onclick="borrar_img({{$fila->id}},'/punto_venta/public/{{$fila->url}}')">z</span>
        </div>
    @endforeach
   </div>
</div>
<span class="atras mov" onclick="nextI(0)">-</span>
<span class="delante mov" onclick="nextI(1)">+</span>

<style>
  .componente{
     width:100vw;
     height: 100vh;
     display:flex;
     justify-content: center;
     align-items: center;
  }
  .elementos{
      width: 50%;
      height: 70%;
      grid-template-columns: 1fr;
  }
  .elementos div{
      position: relative;
      background-color: rgba(178, 178, 178, .5) ;
      border-radius: 10px;
      overflow: hidden;
  }
  .elementos div img{
      width: auto;
      margin: 0 auto;
      object-fit: cover;
  }
  .elementos div .span1{
      position:absolute;
      right: 1%;
      top:1%;
      font-size: 1.5em;
      display: grid;
      justify-items: center;
      align-content: center;
      color: white;
  }
  .elementos div .span2{
      position:absolute;
      right: 1%;
      top:6%;
      font-size: 1.5em;
      display: grid;
      justify-items: center;
      align-content: center;
      color: white;
  }
  .elementos div span:hover{
      cursor: pointer;
      width:20px;
      height:20px;
      background-color: white;
      color: black;
      border-radius: 50%;
  }
  .visto{
      display: flex;
      justify-content: center;
      align-items: center;
  }

  .oculto{
      display: none;
  }
  .atras{
      position: absolute;
      left:10%;
      top:50%;
  }
  .delante{
      position: absolute;
      right: 10%;
      top:50%;
  }
  .mov{
      width:30px;
      height:30px;
      background-color: white;
      border-radius: 50%;
      color: black;
      display: grid;
      justify-content: center;
      align-items: center;
      border: 1px solid black;
  }
  .mov:hover{
      box-shadow: 1px 1px 5px 1px rgba(1,1,1,.5);
      cursor: pointer;
  }
  @media screen and (max-width:678px){
    .elementos{
      width: 90%;
      height: 90%;
      }
    .visto{
        margin:0 auto;
        height: 50%;
    }
  }
</style>
<script charset="utf-8">
    var seleccion = 0;
    function nextI(paso){
        if(paso ==1){
            seleccion = calcular_mas(seleccion);
        }else{
            seleccion = calcular_menos(seleccion);
        }
            document.querySelector('.visto').setAttribute('class','oculto');
            document.querySelector('.elementos').children[seleccion].setAttribute('class','visto');
    }
    function calcular_mas(valor){
        if (valor >= 0 && valor < document.querySelector('.elementos').children.length-1){
            return valor + 1;
        }
        return 0;
    }
    function calcular_menos(valor){
        if (valor <= 0){
            return document.querySelector('.elementos').children.length-1;
        }
        return valor-1;
    }
    function quitar_modal(){
       document.querySelector('.carrusel').style.display ="none"; 
    }
    function borrar_img(id, url){
        window.livewire.emit('borrar_img',id,url);
    }

</script>
