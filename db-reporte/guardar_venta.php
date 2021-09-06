<?php
$cargaUtil = json_decode(file_get_contents("php://input"));

// Si no hay datos, salir inmediatamente indicando un error 500
if (!$cargaUtil) {
    http_response_code(500);
    exit;
}
// Extraer valores
$idUser= $cargaUtil->idUser;
$Compratotal=$cargaUtil->Compratotal;
 $iva=$Compratotal*.16;
$CompraTotalCliente=$iva+$Compratotal;


$descripcion = $cargaUtil->descripcion;
$id = $cargaUtil->id;
$medida = $cargaUtil->medida;
$cantidadProducto = $cargaUtil->cantidadProducto;
$precioTotal = $cargaUtil->precioTotal;

include "funciones-reporte.php";
$Cliente = obtenerClientePorId($idUser);

// $IDCLIENTE, $RAZON_SOCIAL, $RFC,$SUBTOTAL,$IVA,$TOTAL
$respuestaCliente = guardarReporteCliente($Cliente->IDCLIENTE,$Cliente->RAZON_SOCIAL,$Cliente->RFC,floatval($Compratotal), floatval($iva), floatval($CompraTotalCliente));

$respuestaVenta = guardarReporteVenta($id,$medida,floatval($cantidadProducto), floatval($precioTotal));
header('Content-Type: application/json; charset=utf-8');
$respuesta=['ok'=>true];
$badres=['ok'=>false];;
if ($respuestaCliente && $respuestaVenta) {
    echo json_encode($respuesta);
}else{
    echo json_encode($badres);
} 

// Devolver al cliente la respuesta de la función
//  echo json_encode($respuestaCliente);