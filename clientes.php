<?php
include('config.php');
$conexion=mysqli_connect($servidor,$usuario,$pass,$bd);

?>

    <div class="container">
        <h2 class="text-center">Clientes</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalClienteRegistro">Nuevo&nbsp;<i class="fa fa-plus"></i></button>
        <table class="table">
            <thead>
                <tr>
                    <th>IDCLIENTE</th>
                    <th>RAZON SOCIAL</th>
                    <th>RFC</th>
                   
                    <th>modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody id="cuerpoTabla">
            <?php
        $sql="SELECT * from clientes";
        $result=mysqli_query($conexion,$sql);

        while ($mostrar=mysqli_fetch_array($result)) {
?>
                <tr>
                    <td> <?php echo $mostrar['IDCLIENTE'] ?></td>
                    <td> <?php echo $mostrar['RAZON_SOCIAL'] ?></td>
                    <td> <?php echo $mostrar['RFC'] ?></td>
                    
                    <td>
                    <button type="button"
                     onClick="StartModificarCliente(<?php echo $mostrar['IDCLIENTE'] ?>);" 
                      id="ModificarCliente" 
                      class="btn btn-primary"
                    data-bs-toggle="modal" 
                    data-bs-target="#modalEditarCliente"
                    data-id="<?php echo $mostrar['IDCLIENTE'] ?>"
                    data-razon="<?php echo $mostrar['RAZON_SOCIAL'] ?>"
                    data-rfc="<?php echo $mostrar['RFC'] ?>"
                   
                    >Modificar</button>
                    </td>
                    <td>
                    <button type="button" onClick="EliminarCliente( <?php echo $mostrar['IDCLIENTE'] ?>);" id="EliminarCliente" class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
                <?php     
                }
                ?>
            </tbody>
        </table>
    </div>

<!-- Modal-Agregar -->
<div class="modal fade" id="modalClienteRegistro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Registrar Cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form >
          <div class="modal-body">
          
  <div class="mb-3">
    <label for="InputRazon" class="form-label">RAZON SOCIAL</label>
    <input type="text" class="form-control" id="InputRazon" aria-describedby="descripcion" required>
    <div id="Alert-Desc" class="form-text"></div>
  </div>

  <div class="mb-3">
    <label for="InputRfc" class="form-label">RFC</label>
    <input type="text" class="form-control" id="InputRfc" required>
    <div id="Alert-Medida" class="form-text"></div>
  </div>

</div>
<div class="modal-footer">
  <button type="submit" id='closeModal' class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
  <button type="button" onClick="RegistrarCliente();"class="btn btn-primary">Continuar</button>
</div>
</form>
    </div>
  </div>
</div>
<!-- END MODAL AGREGAR -->


<!-- Modal-Modificar -->
<div class="modal fade" id="modalEditarCliente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Editar Cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form >
          <div class="modal-body">
          <input type="hidden" id="idEditar">
  <div class="mb-3">
    <label for="InputDesc" class="form-label">RAZON SOCIAL</label>
    <input type="text" class="form-control" id="InputDescEditar"  aria-describedby="descripcion" required>
    <div id="Alert-Desc" class="form-text"></div>
  </div>

  <div class="mb-3">
    <label for="InputMedida" class="form-label">RFC</label>
    <input type="text" class="form-control" id="InputMedidaEditar" required>
    <div id="Alert-Medida" class="form-text"></div>
  </div>

</div>
<div class="modal-footer">
  <button type="submit" id='closeModalEditar' class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
  <button type="button" onClick="EditarCliente();"class="btn btn-primary">Continuar</button>
</div>
</form>
    </div>
  </div>
</div>
<!-- END MODAL Modificar -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
<script src="js/productos.js"></script>