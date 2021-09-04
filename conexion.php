<?php
include('config.php');
$conexion = mysql_connect($servidor, $usuario, $pass)
or die('Error: Database to host connection: '.mysql_error());

/* comprueba la conexión */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

/* devuelve el nombre de la base de datos actualmente seleccionada */
if ($result = mysqli_query($conexion, "SELECT DATABASE()")) {
    $row = mysqli_fetch_row($result);
    printf("Default database is %s.\n", $row[0]);
    mysqli_free_result($result);
}

// mysql_select_db($bbdd, $dbh)
// or die('Error: Select database: '.mysql_error());
?>