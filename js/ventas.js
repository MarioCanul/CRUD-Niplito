let Carrito = [];
let Compratotal=0;
let user=null;
let select=document.getElementById('inputCliente');
document.getElementById('ModalCompraCarrito').disabled = true;
document.getElementById('PagarCarritoCompleto').disabled=true

select.addEventListener('change', (event) => {
    user= event.target.value;

    console.log(user)
    if (user==="Choose...") {
        document.getElementById('ModalCompraCarrito').disabled = true;
    }else{

        document.getElementById('ModalCompraCarrito').disabled = false;
    }
});
AgregarCarrito = (id) => {
  const boton = document.getElementById(id);



  cantidadProducto = document.getElementById("cantidad" + id).value;
  cantidadProductoreset = document.getElementById("cantidad" + id);

  let descripcion = boton.dataset.desc;
  let precio = boton.dataset.precio;
let medida=boton.dataset.medida;
  let precioTotal = precio * cantidadProducto;
  Compratotal+=precioTotal;
 
  let compra = {
     idUser:user,
     
    id,
    descripcion,
    cantidadProducto,
    medida,
    precio,
    precioTotal,
    Compratotal,
  };

  ContieneCompra = Carrito.filter((i) => i.id === id);
  if (ContieneCompra.length > 0) {
    Carrito = Carrito.filter((i) => i.id !== id);
  }
  Carrito = [...Carrito, compra];
  console.log(Carrito);
  renderizarProductos();
  cantidadProductoreset.value=0;
  document.getElementById('PagarCarritoCompleto').disabled=false
};


renderizarProductos = () => {
  const $cuerpoTabla = document.querySelector("#cuerpoTabla");
  $cuerpoTabla.innerHTML = "";

  for (const producto of Carrito) {
    const $fila = document.createElement("tr");

    const $celdaId = document.createElement("td");
    $celdaId.innerText = producto.id;
    $fila.appendChild($celdaId);

    const $celdaDes = document.createElement("td");
    $celdaDes.innerText = producto.descripcion;
    $fila.appendChild($celdaDes);

    const $celdaPrecio = document.createElement("td");
    $celdaPrecio.innerText = producto.precio;
    $fila.appendChild($celdaPrecio);

    const $celdaCantidad = document.createElement("td");
    $celdaCantidad.innerText = producto.cantidadProducto;
    $fila.appendChild($celdaCantidad);

    const $botonEliminar = document.createElement("button");
    $botonEliminar.classList.add("button", "is-danger");
    $botonEliminar.innerHTML = `<i class="fa fa-trash"></i>`;
    $botonEliminar.onclick = async () => {
        Carrito = Carrito.filter((i) => i.id !==  producto.id);
        Compratotal-=producto.precioTotal;
       console.log(Carrito);
        if (Carrito.length===0) {
            console.log('entro if')
            document.getElementById('PagarCarritoCompleto').disabled = true;
        }
        renderizarProductos();
    };

    const $celdaEliminar = document.createElement("td");
    $celdaEliminar.appendChild($botonEliminar)
    $fila.appendChild($celdaEliminar);

    const $celdaPrecioTotal = document.createElement("td");
    $celdaPrecioTotal.innerText = producto.precioTotal;
    $fila.appendChild($celdaPrecioTotal);

    $cuerpoTabla.appendChild($fila);
  }
  document.getElementById('TotalComprasCarrito').innerText=Compratotal;
};

PagarCompra=()=>{
let Peticiones=[]
console.log(user);

for (let index = 0; index < Carrito.length; index++) {
    const element = Carrito[index];
    console.log(element)
    const cargaUtilCodificada = JSON.stringify(element);
    Peticiones.push(  fetch("/Crud-Productos-Clientes/db-reporte/guardar_venta.php", {
        method: "POST",
        body: cargaUtilCodificada,
    })
    )
}
Promise
.all(Peticiones)
.then(function(response) {
    console.log(response[0])
    return response[0].json();
})
.then(function(data) {

   if (data.ok) {
    location.reload();
   }
})
.catch((er)=>{
    console.log('fallo el fetch',er)
})
   


}
