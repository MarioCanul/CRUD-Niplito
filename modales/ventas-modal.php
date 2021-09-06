<?php
include_once "db-productos/funcionesProductos.php";
$respuestap = obtenerProductos();

?>
<div class="row mt-1">
<button type="button" id="ModalCompraCarrito" class="btn btn-primary btn-sm carritoBtn" data-bs-toggle="modal" data-bs-target="#modalAgregarProducto">Agregar&nbsp;<i class="fa fa-plus"></i></button>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalAgregarProducto" tabindex="-1" aria-labelledby="modalAgregarProducto" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-aling-center" id="modalAgregarProducto">Productos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Descripcion</th>
      <th scope="col">precio</th>
      <th scope="col">cantidad</th>
      <th scope="col">Agregar</th>
    </tr>
  </thead>
  <tbody>
  <?php
    foreach($respuestap as $elemento){
      ?>
 <tr>
      <th scope="col">
      <?php echo $elemento->IDMATERIAL ?>
      </th>
      <th scope="col"><?php echo $elemento->DESCRIPCION ?></th>
      <th scope="col"><?php echo $elemento->PRECIO1 ?></th>
      <th scope="col">
        <input class="cantidad " id="cantidad<?php echo $elemento->IDMATERIAL ?>" type="number" min="0" value=0 ></th>
      <th scope="col">
      <button type="button" 
      id=<?php echo $elemento->IDMATERIAL ?>
      class="btn btn-primary" 
      data-id="<?php echo $elemento->IDMATERIAL ?>"
     data-desc="<?php echo $elemento->DESCRIPCION ?>"
     data-precio="<?php echo $elemento->PRECIO1  ?>"
     data-medida="<?php echo $elemento->UNIDADMEDIDA ?>"
     onClick="AgregarCarrito(<?php echo $elemento->IDMATERIAL ?>);"
      >Agregar</button>
      </th>
    </tr>

<?php }?>
  </tbody>
</table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"   data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>