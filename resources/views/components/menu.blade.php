<link rel="stylesheet" href="{{asset('css/menu.css')}}">
    <button onclick="abrirMenu()" type="button" id="btn" value="1" id="btn"><></button>
<nav id="menu">
    <ul>
        @auth
            <span> {{Auth::user()->email}}</span>
            <div class="divicion"></div>
        @endauth
        @foreach ($valor as $key)
            <li><a href="{{route($key[1])}}">{{$key[0]}}</a></li>
        @endforeach
        <div class="rounded shadow-md hover:bg-blue-100 carrito"></div>
        @auth
            <form action="{{route('logout')}}" method="post" accept-charset="utf-8">     
                @csrf
                <input  type="submit" value="Cerrar" />
            </form>  
        @endauth
    </ul>
</nav>
<script type="text/javascript">
    function abrirMenu(){
            let btn = document.querySelector('#btn');
            let menu = document.querySelector('#menu');
            if(btn.value == 1){
                    menu.setAttribute("class", "menu"); 
                    btn.value=2;
                }else{
                        menu.setAttribute('class','');
                        btn.value=1;
                    }
        } 
</script>
