RegistrarCliente=async()=>{

    let descripcion=document.getElementById('InputRazon').value
    let medida=document.getElementById('InputRfc').value
    
    let AlertRazon=document.getElementById('Alert-Razon')
    let alertRFC=document.getElementById('Alert-Rfc')
   
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

StartModificarCliente=()=>{

}
EditarCliente=()=>{

}
EliminarCliente=()=>{

}