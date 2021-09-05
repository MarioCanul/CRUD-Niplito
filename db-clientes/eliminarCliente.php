<?php
if (!isset($_GET["id"])) {
    http_response_code(500);
    exit();
}
include "funcionesClientes.php";
$respuesta = eliminarCliente($_GET["id"]);
echo json_encode($respuesta);