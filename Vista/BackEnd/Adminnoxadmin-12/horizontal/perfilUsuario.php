<?php
session_start();
if (empty($_SESSION["DataUser"]["IdUsuario"])){
    header("Location: login.php");
}
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


<script type="text/javascript">
    function session() {
        alert(<?php echo  $_SESSION["user"]?>)

    }

</script>

<body>

<header id="topnav">

    <?php include("Pages/Includes/Menu-Header.php"); ?>


</header>

<div class="wrapper">
    <div class="container">

        <div class="col-sm-9 center-page">
            <div class="card-box">
                <h3 class="text-center text-warning">Datos Personales</h3>


                    <div class="ch-form-row">
                        <label>Nombre:<?php echo $_SESSION["DataUser"]["Nombres"] ?></label>
                        <span> </span>

                    </div>

                    <div class="ch-form-row ">
                        <label>Apellidos:<?php echo $_SESSION["DataUser"]["Apellidos"] ?></label>
                        <span> </span>

                    </div>


                    <div class="ch-form-row">
                        <label>E-mail:<?php echo $_SESSION["DataUser"]["Email"] ?></label>
                        <span></span>

                    </div>
                    <div class="ch-form-row">

                        <div class="ch-form-row ">
                            <label type="password" >Contraseña:<?php echo $_SESSION["DataUser"]["Contrasena"] ?></label>
                            <span></span>


                        </div>

                        <div class="ch-form-row ">
                            <label >Celular:<?php echo $_SESSION["DataUser"]["Celular"] ?></label>
                            <span></span>

                        </div>

                        <div class="ch-form-row ">
                            <label >Fecha Nacimiento:<?php echo $_SESSION["DataUser"]["Fecha_Nacimiento"] ?></label>
                            <span></span>

                        </div>

                        <a href="EditarUsuario.php">Modificar Datos Personales</a>


                    <br>

                    <h3 class="text-center text-warning">Domicilio</h3>

                  <a href="">Agregar Domicilio</a>






                <div class="visible-lg" style="height: 79px;"></div>
            </div>

        </div> <!-- end col -->

    </div> <!-- end container -->
</div>
<!-- end wrapper -->

</body>


<!-- FORM-VALIDATION.HTML -->

<!-- Parsley js -->
<script type="text/javascript" src="../plugins/parsleyjs/parsley.min.js"></script>

<!-- App js -->
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('form').parsley();
    });
    $(function () {
        $('#demo-form').parsley().on('field:validated', function () {
            var ok = $('.parsley-error').length === 0;
            $('.alert-info').toggleClass('hidden', !ok);
            $('.alert-warning').toggleClass('hidden', ok);
        })
            .on('form:submit', function () {
                return false; // Don't submit form for this demo
            });
    });
</script>


</html>
