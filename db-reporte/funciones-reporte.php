<?php

function actualizarProducto($descripcion, $medida, $precio, $id)
{
    $bd = obtenerConexionVenta();
    $sentencia = $bd->prepare("UPDATE productos SET DESCRIPCION = ?, UNIDADMEDIDA = ?, PRECIO1 = ? WHERE IDMATERIAL = ?");
    return $sentencia->execute([$descripcion, $medida, $precio, $id]);
}

function obtenerClientePorId($id)
{
    $bd = obtenerConexionVenta();
    $sentencia = $bd->prepare("SELECT IDCLIENTE, RAZON_SOCIAL, RFC FROM clientes WHERE IDCLIENTE = ?");
    $sentencia->execute([$id]);
    return $sentencia->fetchObject();
}

function obtenerReporteVenta()
{
    $bd = obtenerConexionVenta();
    $sentencia = $bd->query(" SELECT b.IDMATERIAL, b.DESCRIPCION, a.UNIDAD_MEDIDA ,SUM(a.CANTIDAD) AS TOTALPIEZAS,SUM(a.PRECIO1)AS TOTAL
    FROM documentorenglon a  JOIN productos b
    ON a.IDMATERIAL=b.IDMATERIAL
    GROUP BY a.IDMATERIAL ");
    return $sentencia->fetchAll();
}

function obtenerReporteCliente()
{
    $bd = obtenerConexionVenta();
    $sentencia = $bd->query("SELECT a.IDCLIENTE, a.RFC, a.RAZON_SOCIAL ,SUM(a.SUBTOTAL) AS SUBTOTAL,SUM(a.IVA)AS IVA,SUM(a.TOTAL)AS TOTAL
    FROM documento a  JOIN clientes b
    ON a.IDCLIENTE=b.IDCLIENTE
    GROUP BY a.IDCLIENTE");
    return $sentencia->fetchAll();
}


function guardarReporteVenta($idmaterial, $unidadmedida, $cantidad ,$precio)
{
    $bd = obtenerConexionVenta();
    $sentencia = $bd->prepare("INSERT INTO documentorenglon(IDMATERIAL, UNIDAD_MEDIDA,CANTIDAD , PRECIO1) VALUES(?, ?, ?,?)");
    return $sentencia->execute([$idmaterial, $unidadmedida, $cantidad ,$precio]);
}

function guardarReporteCliente($IDCLIENTE, $RAZON_SOCIAL, $RFC,$SUBTOTAL,$IVA,$TOTAL)
{
    $bd = obtenerConexionVenta();

    $sentencia = $bd->prepare("INSERT INTO documento(IDCLIENTE, RAZON_SOCIAL, RFC,SUBTOTAL,IVA,TOTAL) VALUES(?, ?, ?,?,?,?)");
    return $sentencia->execute([$IDCLIENTE, $RAZON_SOCIAL, $RFC,$SUBTOTAL,$IVA,$TOTAL]);
}


function obtenerVariableDelEntornoVenta($key)
{
    if (defined("_ENV_CACHE")) {
        $vars = _ENV_CACHE;
    } else {
      
        $file = "../env.php";
        (!file_exists($file))? $file = "env.php":$file = "../env.php";
        if (!file_exists($file)) {
            throw new Exception("El archivo de las variables de entorno ($file) no existe. Favor de crearlo");
        }
        $vars = parse_ini_file($file);
        define("_ENV_CACHE", $vars);
    }
    if (isset($vars[$key])) {
        return $vars[$key];
    } else {
        throw new Exception("La clave especificada (" . $key . ") no existe en el archivo de las variables de entorno");
    }
}
function obtenerConexionVenta()
{
    $password = obtenerVariableDelEntornoVenta("MYSQL_PASSWORD");
    $user = obtenerVariableDelEntornoVenta("MYSQL_USER");
    $dbName = obtenerVariableDelEntornoVenta("MYSQL_DATABASE_NAME");
    $database = new PDO('mysql:host=localhost;dbname=' . $dbName, $user, $password);
    // $database->query("set names utf8;");
    $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $database;
}