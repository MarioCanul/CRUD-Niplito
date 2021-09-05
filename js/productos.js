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
        console.log(cargaUtil);
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
        //   try {
        //     const respuestaRaw = await fetch("/Crud-Productos-Clientes/db-productos/guardar_producto.php", {
        //         method: "POST",
        //         body: cargaUtilCodificada,
        //     });
        //     console.log(respuestaRaw.body);
        //      // El servidor nos responderá con JSON
        // const respuesta = await respuestaRaw.json();
        // console.log(respuestaRaw)
       
      
        //   } catch (error) {
        //       console.log(error);
        //   }
      }
}
ModificarProducto=(id)=>{
    console.log(id)
}

EliminarProducto=(id)=>{
    console.log(' Eliminar')
}