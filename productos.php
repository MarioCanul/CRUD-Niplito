<?php
include('config.php');
$conexion=mysqli_connect($servidor,$usuario,$pass,$bd);

?>

    <div class="container">
        <h2 class="text-center">Productos existentes</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalRegistro">Nuevo&nbsp;<i class="fa fa-plus"></i></button>
        <table class="table">
            <thead>
                <tr>
                    <th>IDMATERIAL</th>
                    <th>DESCRIPCION</th>
                    <th>UNIDAD MEDIDA</th>
                    <th>PRECIO</th>
                    <th>modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody id="cuerpoTabla">
            <?php
        $sql="SELECT * from productos";
        $result=mysqli_query($conexion,$sql);

        while ($mostrar=mysqli_fetch_array($result)) {
?>
                <tr>
                    <td> <?php echo $mostrar['IDMATERIAL'] ?></td>
                    <td> <?php echo $mostrar['DESCRIPCION'] ?></td>
                    <td> <?php echo $mostrar['UNIDADMEDIDA'] ?></td>
                    <td> <?php echo $mostrar['PRECIO1'] ?></td>
                    <td>
                    <button type="button"
                     onClick="StartModificarProducto(<?php echo $mostrar['IDMATERIAL'] ?>);" 
                      id="ModificarProducto" 
                      class="btn btn-primary"
                    data-bs-toggle="modal" 
                    data-bs-target="#modalEditar"
                    data-id="<?php echo $mostrar['IDMATERIAL'] ?>"
                    data-desc="<?php echo $mostrar['DESCRIPCION'] ?>"
                    data-medida="<?php echo $mostrar['UNIDADMEDIDA'] ?>"
                    data-precio="<?php echo $mostrar['PRECIO1'] ?>"
                    >Modificar</button>
                    </td>
                    <td>
                    <button type="button" onClick="EliminarProducto( <?php echo $mostrar['IDMATERIAL'] ?>);" id="EliminarProducto" class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
                <?php     
                }
                ?>
            </tbody>
        </table>
    </div>

<!-- Modal-Agregar -->
<div class="modal fade" id="modalRegistro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Registrar Producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form >
          <div class="modal-body">
          
  <div class="mb-3">
    <label for="InputDesc" class="form-label">DESCRIPCION</label>
    <input type="text" class="form-control" id="InputDesc" aria-describedby="descripcion" required>
    <div id="Alert-Desc" class="form-text"></div>
  </div>

  <div class="mb-3">
    <label for="InputMedida" class="form-label">MEDIDA</label>
    <input type="text" class="form-control" id="InputMedida" required>
    <div id="Alert-Medida" class="form-text"></div>
  </div>

  <div class="mb-3 ">
  <label for="InputPrecio" class="form-label">PRECIO</label>
    <input type="number" step="0.01" class="form-control" id="InputPrecio" required>
    <div id="Alert-precio" class="form-text"></div>
  </div>

</div>
<div class="modal-footer">
  <button type="submit" id='closeModal' class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
  <button type="button" onClick="RegistrarProducto();"class="btn btn-primary">Understood</button>
</div>
</form>
    </div>
  </div>
</div>
<!-- END MODAL AGREGAR -->


<!-- Modal-Modificar -->
<div class="modal fade" id="modalEditar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Editar Producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form >
          <div class="modal-body">
          <input type="hidden" id="idEditar">
  <div class="mb-3">
    <label for="InputDesc" class="form-label">DESCRIPCION</label>
    <input type="text" class="form-control" id="InputDescEditar"  aria-describedby="descripcion" required>
    <div id="Alert-Desc" class="form-text"></div>
  </div>

  <div class="mb-3">
    <label for="InputMedida" class="form-label">MEDIDA</label>
    <input type="text" class="form-control" id="InputMedidaEditar" required>
    <div id="Alert-Medida" class="form-text"></div>
  </div>

  <div class="mb-3 ">
  <label for="InputPrecio" class="form-label">PRECIO</label>
    <input type="number" step="0.01" class="form-control" id="InputPrecioEditar" required>
    <div id="Alert-precio" class="form-text"></div>
  </div>

</div>
<div class="modal-footer">
  <button type="submit" id='closeModalEditar' class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
  <button type="button" onClick="EditarProducto();"class="btn btn-primary">Understood</button>
</div>
</form>
    </div>
  </div>
</div>
<!-- END MODAL Modificar -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
<script src="js/productos.js"></script>