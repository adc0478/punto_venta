<div>
    <link rel="stylesheet" href="{{asset('css/formulario.css')}}">
    <form>
        @csrf
        <label for="">ID<input type="number" placeholder="ID"></label>
        <label for="">Detalle<input type="text" placeholder="Nombre/ referencia del permiso"></label>
        <input class="btn btn_generar_permiso" type="button" value="Registrar">
    </form>
</div>
