<?php
if (!isset($_GET["id"])) {
    http_response_code(500);
    exit();
}
include "funcionesProductos.php";
$respuesta = eliminarProducto($_GET["id"]);
echo json_encode($respuesta);