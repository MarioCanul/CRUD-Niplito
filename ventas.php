<?php
include_once "db-clientes/funcionesClientes.php";
$respuesta = obtenerCliente();
?>
<div class="container mt-3">


<div class="row">
<div class="col ">
<div class="input-group mb-3 text-aling-center">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputCliente">Cliente</label>
  </div>
  <select class="custom-select" id="inputCliente" onChange>
    <option selected>Choose...</option>
    <?php
    foreach($respuesta as $elemento){
      ?>
    <option value="<?php echo $elemento->IDCLIENTE ?>">
       <?php echo "Razon Social:".$elemento->RAZON_SOCIAL . "   RFC:". $elemento->RFC  ?>
      </option>
    
    <?php }?>
  </select>
</div>
</div>
</div>
<div class="row m-3">
  <div class="col-4"></div>
  <div class="col-4">
  <?php
include_once "modales/ventas-modal.php";
?>

  </div>
  <div class="col-4"></div>

</div>


<div class="row mt-1">

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Descripcion</th>
      <th scope="col">precio/Unidad</th>
      <th scope="col">cantidad</th>
      <th scope="col">Eliminar</th>
      <th scope="col">total</th>
    </tr>
  </thead>
  <tbody id="cuerpoTabla">
    
   </tbody>
   <tfoot id="tableFooter" style="vertical-align:bottom">
   <tr style="height:100px">
      <td></td>
      <td></td>
      <td></td>
      <td>TOTAL</td>
      <td >
        <h3 id="TotalComprasCarrito"></h3>
      </td>
      <td>
        <button class='btn btn-primary' id="PagarCarritoCompleto" onClick="PagarCompra();">pagar</button>
      </td>

    </tr>
   </tfoot>
</table>



</div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
<script src="js/ventas.js"></script>