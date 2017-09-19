<?php
require "../../../../Controlador/sujetoAdopcionController.php";
require "../../../../Controlador/UsuarioController.php ";

    session_start();
    if (empty($_SESSION["DataUser"]["IdUsuario"])){
        header("Location: login.php");

    }
    $_SESSION["user"]=$_SESSION["DataUser"]["IdUsuario"];
?>
<!DOCTYPE html>
<html lang="en">

<head>


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


    <div class="col-lg-4">
        <div class="panel panel-color panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Panel Info</h3>
            </div>
            <div class="panel-body">

            </div>
        </div>
    </div>
    <div class="col-md-8 col-lg-4">
<br><br><br><br><br>
<br><br>
    <div class="card-box">
        <h4 class="header-title m-t-0"></h4>

        <div class="text-center">

            <div class="">

                <div id="sparkline2" class="text-center"></div>

                <?php echo sujetoAdopcionController::adminTableUsuario()?>

            </div>

        </div>
    </div>
</div>
</div>
</body>

</html>
