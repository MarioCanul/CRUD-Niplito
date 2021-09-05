<?php
$cargaUtil = json_decode(file_get_contents("php://input"));

// Si no hay datos, salir inmediatamente indicando un error 500
if (!$cargaUtil) {
    http_response_code(500);
    exit;
}
// Extraer valores
$descripcion = $cargaUtil->descripcion;
$medida = $cargaUtil->medida;
$precio = $cargaUtil->precio;
include "funcionesProductos.php";
$respuesta = guardarProducto($descripcion, $medida, $precio);
// Devolver al cliente la respuesta de la función
 echo json_encode($respuesta);
  