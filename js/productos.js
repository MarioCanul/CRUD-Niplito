let modificar=document.querySelectorAll('#ModificarProducto');
RegistrarProducto=async()=>{
    let descripcion=document.getElementById('InputDesc').value
    let medida=document.getElementById('InputMedida').value
    let precio=parseFloat(document.getElementById('InputPrecio').value);
    let AlertD=document.getElementById('Alert-Desc')
    let alertMedida=document.getElementById('Alert-Medida')
    let alertPrecio=document.getElementById('Alert-precio')
    let modalClose=document.getElementById('closeModal')
    let form=true
    if (descripcion.trim().length < 2) {
        AlertD.innerText='Falta la Descripcion'
       return form=false
      }
      AlertD.innerText=''
      if (medida.trim().length < 1) {
          alertMedida.innerText='Falta la medida'
         return form=false
      }
      alertMedida.innerText=''
      if (precio.length < 1) {
          alertPrecio.innerText='Falta el Precio'
         return form=false
      }
      alertPrecio.innerText=''

      if (form) {
         
        const cargaUtil = {
            descripcion,
            medida,
            precio
        };
        
        const cargaUtilCodificada = JSON.stringify(cargaUtil);
      
        fetch("/Crud-Productos-Clientes/db-productos/guardar_producto.php", {
                    method: "POST",
                    body: cargaUtilCodificada,
                })
  .then(function(response) {
      console.log(response)
    return response.json();
  }).then(function(data) {
      if (data) {
            descripcion.value = medida.value = precio.value = "";
            modalClose.click();
        } else {
            console.log('no envio una respuesta');
        } 
  })
  .catch((er)=>{
      console.log('fallo el fetch',er)
  })
      }
}
StartModificarProducto=(id)=>{
modificar.forEach(item=>{
    if (item.dataset.id==id) {
        localStorage.setItem('id',item.dataset.id);
        localStorage.setItem('desc',item.dataset.desc)
        localStorage.setItem('medida',item.dataset.medida)
        localStorage.setItem('precio',item.dataset.precio)
    }
})
let idEditar=document.getElementById('idEditar')
let InputDescEditar=document.getElementById('InputDescEditar');
let InputMedidaEditar=document.getElementById('InputMedidaEditar');
let InputPrecioEditar=document.getElementById('InputPrecioEditar')

idEditar.value=id;
InputDescEditar.value=localStorage.getItem('desc');
InputMedidaEditar.value=localStorage.getItem('medida');
InputPrecioEditar.value=localStorage.getItem('precio');

}
EditarProducto=()=>{
    let idEditar=parseInt(document.getElementById('idEditar').value)
let InputDescEditar=document.getElementById('InputDescEditar').value;
let InputMedidaEditar=document.getElementById('InputMedidaEditar').value;
let InputPrecioEditar=parseFloat(document.getElementById('InputPrecioEditar').value)
let modalClose=document.getElementById('closeModalEditar');
let form=true
if (InputDescEditar.trim().length < 2) {
    AlertD.innerText='Falta la Descripcion'
   return form=false
  }
  
  if (InputMedidaEditar.trim().length < 1) {
      alertMedida.innerText='Falta la medida'
     return form=false
  }
  
  if (InputPrecioEditar.length < 1) {
      alertPrecio.innerText='Falta el Precio'
     return form=false
  }

  if (form) {
         
    const cargaUtil = {
        idEditar,
        InputDescEditar,
        InputMedidaEditar,
        InputPrecioEditar
    };
    
    const cargaUtilCodificada = JSON.stringify(cargaUtil);
  
    fetch("/Crud-Productos-Clientes/db-productos/actualizar_producto.php", {
        method: "PUT",
        body: cargaUtilCodificada,
            })
.then(function(response) {
  console.log(response)
return response.text();
}).then(function(data) {
    console.log(data)
  if (data) {
        localStorage.clear()
        modalClose.click();
    } else {
        console.log('no envio una respuesta');
    } 
})
.catch((er)=>{
  console.log('fallo el fetch',er)
})
  }
 
}

EliminarProducto=(id)=>{

    fetch(`/Crud-Productos-Clientes/db-productos/eliminarProducto.php?id=${id}`, {
        method: "DELETE",
    })
.then(function(response) {

return response.text();
}).then(function(data) {
    console.log(data)
if (data) {
    location.reload();
} else {
console.log('no envio una respuesta');
} 
})
.catch((er)=>{
console.log('fallo el fetch',er)
})
}