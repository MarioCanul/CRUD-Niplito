<?php
include('config.php');
$conexion=mysqli_connect($servidor,$usuario,$pass,$bd);

?>
<div class="container">
<div class="row">

<div class="col">
    <h1  class="text-center">reporte ventas</h1>
    <table class="table">
            <thead>
                <tr>
                    <th>IDCODIGO</th>
                    <th>IDMATERIAL</th>
                    <th>UNIDAD MEDIDA</th>
                    <th>CANTIDAD</th>
                    <th>PRECIO</th>
                    
                </tr>
            </thead>
            <tbody id="cuerpoTabla">
            <?php
        $sql="SELECT * from documentorenglon";
        $result=mysqli_query($conexion,$sql);

        while ($mostrar=mysqli_fetch_array($result)) {
?>
                <tr>
                    <td> <?php echo $mostrar['IDCODIGO'] ?></td>
                    <td> <?php echo $mostrar['IDMATERIAL'] ?></td>
                    <td> <?php echo $mostrar['UNIDADMEDIDA'] ?></td>
                    <td> <?php echo $mostrar['CANTIDAD'] ?></td>
                    <td> <?php echo $mostrar['PRECIO1'] ?></td>
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
                    <th>IDCODIGO</th>
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
        $sql="SELECT * from documento";
        $result=mysqli_query($conexion,$sql);

        while ($mostrar=mysqli_fetch_array($result)) {
?>
                <tr>
                    <td> <?php echo $mostrar['IDCODIGO'] ?></td>
                    <td> <?php echo $mostrar['IDCLIENTE'] ?></td>
                    <td> <?php echo $mostrar['RAZON_SOCIAL'] ?></td>
                    <td> <?php echo $mostrar['RFC'] ?></td>
                    <td> <?php echo $mostrar['SUBTOTAL'] ?></td>
                    <td> <?php echo $mostrar['IVA'] ?></td>
                    <td> <?php echo $mostrar['TOTAL'] ?></td>
                </tr>
                <?php     
                }
                ?>
            </tbody>
        </table>
</div>
</div>

</div>