<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Facil</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
  

        <?php include_once "ui/Header.php" ?>


<?php include_once "ui/navbar.php" ?>



<?php
$option= ( isset($_GET["value"])) ?$_GET["value"]:1;
switch ($option) {
    case 1:
        include_once "productos.php";
        break;
    case 2:
        include_once "clientes.php";
        break;
    case 3:
        include_once "ui/navbar.php";
        break;
        case 4:
            include_once "ui/navbar.php";
            break;
            default:
            include_once "productos.php";
            break;
}
?>


        <?php include_once "ui/Footer.php" ?>
      

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>
</html>