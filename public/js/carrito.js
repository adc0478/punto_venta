function ver_carrito(){
    let tabla = "";
    let subtotal;
    let total = 0;
    //Leer el localstorange
    let mi_carrito = JSON.parse(localStorage.getItem('punto_venta'));
    //Consultar todos los productos al server
    let url = "lista_de_productos";
    let opt ={
        method:"post",
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': window.CSRF_TOKEN
        },
    }
    fetch(url,opt)
        .then((response) => response.json())
        .then((data) =>{
    //recorrer los productos y con el localstorange crear la fila para cada producto en el carrito
            if (mi_carrito != null){
                for (fila in data) {
                    if (mi_carrito[data[fila]['id']]){
                        subtotal = parseInt(mi_carrito[data[fila]['id']]) * parseFloat(data[fila]['precio']);
                        total = total + subtotal;
                        tabla = tabla + `<tr>
                                        <td>${data[fila]['id']}</td> 
                                        <td>${data[fila]['name']}</td> 
                                        <td>${data[fila]['precio']}</td> 
                                        <td>${mi_carrito[data[fila]['id']]}</td> 
                                        <td>${subtotal.toFixed(2)}</td> 
                                        <td><input type="button" class="rounded shadow bg-gray-100 hover:bg-red-400 hover:cursor-pointer hover:text-white w-full p-1" value="Borrar" onclick="eliminar_producto_carrito(${data[fila]['id']})"></td> 
                                        </tr>`;
                    } 
                }
            }
            //cabecera
            let cabecera =`
                    <tr class="p-5 bg-gray-200 border border-black rounded">
                        <th class="font-light  p-2">Codigo</th>
                        <th class="font-light p-2">Nombre</th>
                        <th class="font-light p-2" >Precio unit</th>
                        <th class="font-light p-2">Cantidad</th>
                        <th class="font-light p-2">Subtotal</th>
                        <th class="font-light p-2">Action</th>
                    </tr>
                        
                    `;
            document.querySelector("#tabla").innerHTML = '<table class="mx-auto shadow-md rounded p-3">' + cabecera + tabla + '</table>' + `<strong>Total: </strong> ${total.toFixed(2)}`;
        });



}

function eliminar_producto_carrito(id){
    if (id != " "){
        //borrar del localstorange
        let obj = JSON.parse(localStorage.getItem('punto_venta'));
        delete obj[id];
        localStorage.setItem('punto_venta',JSON.stringify(obj)); 
        //recargar pagina
        ver_carrito();
        ver_cantidad_carrito();
    }
}
function eliminar_carrito(){
    //borrar la variable del localstorange "punto_venta"
     localStorage.removeItem('punto_venta');
    //ejecutar recargar pagina
     ver_carrito();
     ver_cantidad_carrito();
}

function confirmar_compra(){
    let mi_carro = JSON.parse(localStorage.getItem('punto_venta'));
    if (mi_carro != null){
    //Enviar a un endpoint la lista de productos con la cantidad a comprar
    //
    let url = "confirmacion_venta";
        let opt ={
            body:JSON.stringify({'data':mi_carro}),
            method:"POST",
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': window.CSRF_TOKEN
            },
        };
        fetch(url,opt)
            .then((response) => {
                if(response.ok){
                    return response.text();
                }else{
                    throw new Error(response.status);
                }
            })
            .then((data) =>{
                alert (procesar(data));
            })
            .catch(err => {
                alert ('Up el servidort experimento un error, ' + err);
            });
        //recibir del servidor el id del remito generado en la compra
    
    //Cargar una pagina con los datos del remito y el formulario de pago
    }
}
function procesar (info){
   if (info =='error_usuario'){
        window.location.href = 'login';
        return "Falta ingresar como usuario";
    }
    if (info == 'error_carro_vacio'){
        return "El carrito esta vacio";      
    }
    eliminar_carrito();
    return "Se cargo su pedido en el remito " + info;
}

window.onload = ver_carrito();
