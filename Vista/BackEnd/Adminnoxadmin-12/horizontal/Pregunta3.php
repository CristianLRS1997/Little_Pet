

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
                    <h2 class="text-center text-warning">PREGUNTAS</h2>
                    <p class="font-15 m-b-20" align="justify"">
                    Estas son las preguntas que debes responder para el proceso de adopcion.
                    </p>

                    <form method="post" action="../../../../Controlador/respuestaController.php?action=crear3">

                        <input  style='border: hidden' hidden='hidden' value="¿Estás consciente y aceptas que el animal necesita un periodo de ajuste en el que aprenda dónde debe ir al baño y se adapte a la familia?"
                                class='text-warning' id="Enunciado" name="Enunciado">¿Estás consciente y aceptas que el animal necesita un periodo de ajuste en el que aprenda dónde debe ir al baño y se adapte a la familia?</input>
                        <div class="checkbox checkbox-warning">
                            <input id="checkbox5" type="checkbox" name="Respuesta" value="Si" checked>
                            <label for="checkbox5">
                                Si
                            </label>
                        </div>
                        <div class="checkbox checkbox-warning">
                            <input id="checkbox5" type="checkbox" name="Respuesta" value="No" >
                            <label for="checkbox5">
                                No
                            </label>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-8 col-sm-offset-4">
                                <button type="reset" class="btn waves-effect w-md waves-light btn-lg font-15" onmouseout="this.style.background ='#D2D2D2'"  onmouseover="this.style.background ='#8c8c8c'" style=" background-color: #D2D2D2 ; color: #fdfefe; border-radius: 5px">
                                    <strong>Cancelar</strong>
                                </button>
                                <button type="submit" class=" btn waves-effect w-md waves-light btn-lg font-15 " id="sa-success" value="validate" onmouseout="this.style.background ='#F5B041'"  onmouseover="this.style.background ='#F77C10'" style= "background-color: #F5B041 ; color: #fdfefe; border-radius: 5px">
                                    <strong>Siguiente</strong>
                                </button>
                            </div>
                        </div>

                    </form>





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