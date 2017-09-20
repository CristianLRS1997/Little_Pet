<?php
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
    <?php include_once("../../../../Controlador/sujetoAdopcionController.php"); ?>



</head>

<body>

<header id="topnav">

    <?php include("Pages/Includes/Menu-Header.php"); ?>

</header>

<div class="wrapper" style="background-color: #FDFEFE">
    <div class="container">

        <div style="background-color: #F6F6F7" >

            <br>

            <br>

                <h3 class="text-center text-warning">¿TIENES UNA MASCOTA PARA DAR EN ADOPCIÓN?</h3>

            <div class="col-md-2 center-page" >
                <button onclick="location.href='IndexSujeto.php'" type="button" class="btn btn-block waves-effect waves-light font-15" onmouseout="this.style.background ='#F5B041'"
                        onmouseover="this.style.background ='#F77C10'" style= "background-color: #F5B041 ; color: #fdfefe;
                        border-radius: 5px">Publicala aquí</button>
            </div>

            <br>

            <br>

        </div>


        <h2 style="color: #F77C10">MIS HUELLITAS EN ADOPCIÓN</h2>

        <table id="datatable" class="table table-striped table-bordered">
            <?php echo sujetoAdopcionController::adminTableSujeto(); ?>
        </table>

    </div> <!-- end container -->
</div>
<!-- end wrapper -->


</body>





</html>
