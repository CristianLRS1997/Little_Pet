

<?php
session_start();
if (empty($_SESSION["DataUser"]["IdUsuario"])){
    header("Location: Index.php");
}

require "../../../../Controlador/respuestaController.php";

?>


<!DOCTYPE html>

<html>
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


<!-- Navigation Bar-->
<header id="topnav">
    <?php include("Pages/Includes/Menu-Header.php"); ?>
</header>
<!-- End Navigation Bar-->


<div class="wrapper">
    <div class="container">
        <BR>

        <div class="row">
            <div class="col-sm-9 center-page">
                <div class="card-box">
                    <h2 class="text-center text-warning">RESPUESTAS</h2>
                    <p class="font-15 m-b-20" align="justify"">
                    Estas son las respuestas que han dado por la mascota que quieres dar en adopcion.
                    </p>

                    <?php echo respuestaController::mostrar() ;?>





                </div>
            </div>





            <!-- Footer -->
            <footer class="footer text-right">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            2017 © Adminox - Coderthemes.com
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End Footer -->

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->


    <!-- jQuery  -->

</body>
</html>