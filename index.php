<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Facil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
    <div class="container">

        <?php include_once "ui/encabezado.php" ?>

<div class="row">
<?php include_once "ui/navbar.php" ?>
</div>
<div class="row">
<?php

switch ($_GET["value"]) {
    case 1:
        include_once "productos.php";
        break;
    case 2:
        include_once "ui/navbar.php";
        break;
    case 3:
        include_once "ui/navbar.php";
        break;
        case 4:
            include_once "ui/navbar.php";
            break;
            default:
            
            break;
}
?>

</div>
        <?php include_once "ui/pie.php" ?>
</div>
</body>
</html>