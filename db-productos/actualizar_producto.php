<?php
$cargaUtil = json_decode(file_get_contents("php://input"));
// Si no hay datos, salir inmediatamente indicando un error 500
if (!$cargaUtil) {
    http_response_code(500);
    exit;
}
// Extraer valores
$id = $cargaUtil->idEditar;
$descripcion = $cargaUtil->InputDescEditar;
$medida = $cargaUtil->InputMedidaEditar;
$precio = $cargaUtil->InputPrecioEditar;
include_once "funcionesProductos.php";
$respuesta = actualizarProducto($descripcion, $medida, $precio, $id);
// Devolver al cliente la respuesta de la función
echo json_encode($respuesta);