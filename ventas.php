<?php
// include "db-clientes/funcionesClientes.php";
// $respuesta = obtenerCliente();
include('config.php');
$conexion=mysqli_connect($servidor,$usuario,$pass,$bd);

?>
<div class="container">
<select name="select">
<?php
$sql="SELECT * from clientes";
$result=mysqli_query($conexion,$sql);
while ($mostrar=mysqli_fetch_array($result)) {
?>
  <option value=<?php echo $mostrar['IDCLIENTE']  ?>><?php echo 'CLIENTE :'. $mostrar['RAZON_SOCIAL']. '-  RFC: '.$mostrar['RFC']  ?></option>

  <?php }?>
</select>

</div>