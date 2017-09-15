<?php
require "../../../../Controlador/sujetoAdopcionController.php";

if (empty($_SESSION["DataUser"]["IdUsuario"])){
    header("Location: login.php");

}
$_SESSION["user"]=$_SESSION["DataUser"]["IdUsuario"];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    $IdSujeto = $_GET["IdSujetoAdopcion"];
    $pregunta = SujetoAdopcion::buscarForId($IdSujeto)  ?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="assets/images/LogoLittle.png">

    <title>Little Pet</title>

    <?php include("Pages/Includes/Imports.php"); ?>

</head>

<body>

<header id="topnav">

    <?php include("Pages/Includes/Menu-Header.php"); ?>

</header>




<br><br><br><br><br>
<br><br>
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="row p-b-10">

                <!-- Labels -->
                <div class="col-md-6">
                    <h4 class="m-t-0 header-title"><b>Detalles</b></h4>

              <h1>  <?php echo $pregunta->getNombre()?></h1>

               <p> <?php echo $pregunta->getDescripcion()?></p>
                <?php echo $pregunta->getDueno()?>
                <?php echo $pregunta->getEsterilizado()?>
                <?php echo $pregunta->getRaza()?>

                </div></div></div></div></div>

</body>

</html>
