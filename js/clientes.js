let modificar=document.querySelectorAll('#ModificarCliente');



RegistrarCliente=async()=>{

    let Razon=document.getElementById('InputRazon').value
    let RFC=document.getElementById('InputRfc').value
    
    let AlertRazon=document.getElementById('Alert-Razon')
    let alertRFC=document.getElementById('Alert-Rfc')
   
    let modalClose=document.getElementById('closeModal')

    let form=true

    if (Razon.trim().length < 2) {
        AlertRazon.innerText='Falta la Razon social'
       return form=false
      }
      AlertRazon.innerText=''
      if (RFC.trim().length < 1) {
        alertRFC.innerText='Falta el RFC'
         return form=false
      }
      alertRFC.innerText=''
      if (form) {
         
        const cargaUtil = {
            Razon,
            RFC,
           
        };
        
        const cargaUtilCodificada = JSON.stringify(cargaUtil);
      
        fetch("/Crud-Productos-Clientes/db-clientes/guardar_cliente.php", {
                    method: "POST",
                    body: cargaUtilCodificada,
                })
  .then(function(response) {
    return response.json();
  }).then(function(data) {
      if (data) {
            Razon.value = RFC.value= "";
            modalClose.click();
            location.reload();
        } else {
            console.log('no envio una respuesta');
        } 
  })
  .catch((er)=>{
      console.log('fallo el fetch',er)
  })
      }

}

StartModificarCliente=(id)=>{
    modificar.forEach(item=>{
        if (item.dataset.id==id) {
            localStorage.setItem('id',item.dataset.id);
            localStorage.setItem('razon',item.dataset.razon)
            localStorage.setItem('rfc',item.dataset.rfc)
            
        }
    })
    
    
    
    idEditar.value=id;
    InputRazonEditar.value=localStorage.getItem('razon');
    InputRfcEditar.value=localStorage.getItem('rfc');
   


}
EditarCliente=()=>{

    let idEditar=document.getElementById('idEditar').value
    let InputRazonEditar=document.getElementById('InputRazonEditar').value;
    let InputRfcEditar=document.getElementById('InputRfcEditar').value;
    let modalClose=document.getElementById('closeModalEditar');
    let form=true
    if (InputRazonEditar.trim().length < 2) {
        AlertD.innerText='Falta la Razon'
       return form=false
      }
      
      if (InputRfcEditar.trim().length < 1) {
          alertMedida.innerText='Falta el RFC'
         return form=false
      }
    
      if (form) {
             
        const cargaUtil = {
            idEditar,
            InputRazonEditar,
            InputRfcEditar,
        };
        
        const cargaUtilCodificada = JSON.stringify(cargaUtil);
      
        fetch("/Crud-Productos-Clientes/db-clientes/actualizar_cliente.php", {
            method: "PUT",
            body: cargaUtilCodificada,
                })
    .then(function(response) {
     
    return response.text();
    }).then(function(data) {
        console.log(data)
      if (data) {
            localStorage.clear()
            modalClose.click();
            location.reload();
        } else {
            console.log('no envio una respuesta');
        } 
    })
    .catch((er)=>{
      console.log('fallo el fetch',er)
    })
      }
}
EliminarCliente=(id)=>{

    fetch(`/Crud-Productos-Clientes/db-clientes/eliminarCliente.php?id=${id}`, {
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