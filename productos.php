<?php
include('config.php');
$conexion=mysqli_connect($servidor,$usuario,$pass,$bd);

?>
<div class="columns">
    <div class="column">
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
                    <button type="button" onClick="ModificarProducto( <?php echo $mostrar['IDMATERIAL'] ?>);" id="ModificarProducto" class="btn btn-primary">Modificar</button>
                    </td>
                    <td>
                    <button type="button" onClick="EliminarProducto( <?php echo $mostrar['IDMATERIAL'] ?>);" id="EliminarProducto" class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
                <?php     }?>
            </tbody>
        </table>
    </div>
</div>
  <!-- modal -->

          <!-- end modal -->


<!-- Modal -->
<div class="modal fade" id="modalRegistro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Registrar Producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form>
          <div class="modal-body">
          
  <div class="mb-3">
    <label for="InputDesc" class="form-label">DESCRIPCION</label>
    <input type="text" class="form-control" id="InputDesc" aria-describedby="emailHelp">
    <div id="Alert-Desc" class="form-text"></div>
  </div>

  <div class="mb-3">
    <label for="InputMedida" class="form-label">MEDIDA</label>
    <input type="text" class="form-control" id="InputMedida">
    <div id="Alert-Medida" class="form-text"></div>
  </div>

  <div class="mb-3 ">
  <label for="InputPrecio" class="form-label">PRECIO</label>
    <input type="number" step="0.01" class="form-control" id="InputPrecio">
    <div id="Alert-Medida" class="form-text"></div>
  </div>

</div>
<div class="modal-footer">
  <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
  <button type="button" class="btn btn-primary">Understood</button>
</div>
</form>
    </div>
  </div>
</div>



<script src="js/productos.js"></script>