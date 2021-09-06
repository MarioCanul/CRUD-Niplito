<?php
include_once "db-reporte/funciones-reporte.php";
$ReporteVenta = obtenerReporteVenta();
$ReporteCliente = obtenerReporteCliente();

?>
<div class="container">
<div class="row">

<div class="col">
    <h1  class="text-center">reporte ventas</h1>
    <table class="table">
            <thead>
                <tr>
                    <th>IDMATERIAL</th>
                    <th>DESCRIPCION</th>
                    <th>TOTAL DE PIEZAS VENDIDAS</th>
                    <th>SUBTOTAL</th>
                    <!-- <th>PRECIO</th> -->
                    
                </tr>
            </thead>
            <tbody id="cuerpoTabla">
  

<?php
    foreach($ReporteVenta as $elemento){
      ?>
                <tr>
                    <td> <?php echo $elemento->IDMATERIAL ?></td>
                    <td> <?php echo $elemento->DESCRIPCION ?></td>
                    <td> <?php echo $elemento->TOTALPIEZAS ?></td>
                    <td> <?php echo $elemento->TOTAL ?></td>
                    
                </tr>


                <?php     
                }
                ?>


            </tbody>
        </table>

</div>
<div class="col">
    <h1  class="text-center">reporte clientes</h1>
    <table class="table">
            <thead>
                <tr>
                    
                    <th>IDCLIENTE</th>
                    <th>RAZON SOCIAL</th>
                    <th>RFC</th>
                    <th>SUBTOTAL</th>
                    <th>IVA</th>
                    <th>TOTAL</th>
                    
                </tr>
            </thead>
            <tbody id="cuerpoTabla">
            <?php
    foreach($ReporteCliente as $elemento){
      ?>
                <tr>
                    
                    <td> <?php echo $elemento->IDCLIENTE ?></td>
                    <td> <?php echo $elemento->RFC ?></td>
                    <td> <?php echo $elemento->RAZON_SOCIAL ?></td>
                    <td> <?php echo $elemento->SUBTOTAL ?></td>
                    <td> <?php echo $elemento->IVA ?></td>
                    <td> <?php echo $elemento->TOTAL ?></td>
                </tr>
                <?php     
                }
                ?>
            </tbody>
        </table>
</div>
</div>

</div>