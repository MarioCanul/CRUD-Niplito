<?php

function actualizarProducto($descripcion, $medida, $precio, $id)
{
    $bd = obtenerConexionProducto();
    $sentencia = $bd->prepare("UPDATE productos SET DESCRIPCION = ?, UNIDADMEDIDA = ?, PRECIO1 = ? WHERE IDMATERIAL = ?");
    return $sentencia->execute([$descripcion, $medida, $precio, $id]);
}



function obtenerProductos()
{
    $bd = obtenerConexionProducto();
    $sentencia = $bd->query("SELECT IDMATERIAL, DESCRIPCION, UNIDADMEDIDA, PRECIO1 FROM productos");
    return $sentencia->fetchAll();
}

function eliminarProducto($id)
{
    $bd = obtenerConexionProducto();
    $sentencia = $bd->prepare("DELETE FROM productos WHERE IDMATERIAL = ?");
    return $sentencia->execute([$id]);
}

function guardarProducto($nombre, $precio, $descripcion)
{
    $bd = obtenerConexionProducto();
    $sentencia = $bd->prepare("INSERT INTO productos(DESCRIPCION, UNIDADMEDIDA, PRECIO1) VALUES(?, ?, ?)");
    return $sentencia->execute([$nombre, $precio, $descripcion]);
}

function obtenerVariableDelEntornoProducto($key)
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
function obtenerConexionProducto()
{
    $password = obtenerVariableDelEntornoProducto("MYSQL_PASSWORD");
    $user = obtenerVariableDelEntornoProducto("MYSQL_USER");
    $dbName = obtenerVariableDelEntornoProducto("MYSQL_DATABASE_NAME");
    $database = new PDO('mysql:host=localhost;dbname=' . $dbName, $user, $password);
    // $database->query("set names utf8;");
    $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $database;
}