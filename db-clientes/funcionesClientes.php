<?php

function actualizarCliente($razon, $rfc, $id)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("UPDATE clientes SET RAZON_SOCIAL = ?, RFC = ? WHERE IDCLIENTE = ?");
    return $sentencia->execute([$razon, $rfc, $id]);
}



function obtenerCliente()
{
    $bd = obtenerConexion();
    $sentencia = $bd->query("SELECT IDCLIENTE, RAZON_SOCIAL, RFC FROM clientes");
    return $sentencia->fetchAll();
}

function eliminarCliente($id)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("DELETE FROM clientes WHERE IDCLIENTE = ?");
    return $sentencia->execute([$id]);
}

function guardarCliente($Razon, $RFC)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("INSERT INTO clientes(RAZON_SOCIAL, RFC) VALUES(?, ?)");
    return $sentencia->execute([$Razon, $RFC]);
}

function obtenerVariableDelEntorno($key)
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
function obtenerConexion()
{
    $password = obtenerVariableDelEntorno("MYSQL_PASSWORD");
    $user = obtenerVariableDelEntorno("MYSQL_USER");
    $dbName = obtenerVariableDelEntorno("MYSQL_DATABASE_NAME");
    $database = new PDO('mysql:host=localhost;dbname=' . $dbName, $user, $password);
    // $database->query("set names utf8;");
    $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $database;
}