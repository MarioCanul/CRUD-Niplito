<?php
include('config.php');
// $conexion=mysqli_connect('localhost','root','sistemas','empresa');
$conexion=mysqli_connect($servidor,$usuario,$pass,$bd);
// require("conexion.php");
?>
<div class="columns">
    <div class="column">
        <h2 class="is-size-2">Productos existentes</h2>
        <a class="button is-success" href="agregar_producto.php">Nuevo&nbsp;<i class="fa fa-plus"></i></a>
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
<script src="js/productos.js"></script>