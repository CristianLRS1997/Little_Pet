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

<div class="wrapper" style="background-color: #FDFEFE" >
    <div class="container">

        <div class="col-sm-9 center-page">

            <br>

            <br>

            <h3 class="text-center text-warning">PROCESO DE ADOPCIÓN</h3>

            <br>

            <p class="font-15 m-b-20" align="justify">
                Llena este simple formulario con los datos de tu amigo que vas a dar en adopción, pronto te llegaran
                ofertas de adopción para que el consiga el hogar que merece con calor de familia.
            </p>

            <br>

            <!-- Clickable Wizard -->
            <div class="row">
                <div class="col-md-12">
                    <form role="form" method="post" action="../../../../Controlador/adopcionController.php?action=crear" >
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" style="background-color: #FEF9E7 ; border:none" id="Nombre" name="Nombre" parsley-trigger="change" required
                                           data-parsley-minlength="2" placeholder="Nombre de la mascota" class="form-control">
                                </div>

                                <div class="col-xs-6">
                                    <select style="background-color: #FEF9E7 ; border:none" id="Genero" name="Genero" class="form-control" required="">
                                        <option value="">Genero del Animal</option>
                                        <option value="Macho">Macho</option>
                                        <option value="Hembra">Hembra</option>
                                    </select>
                                </div>
                            </div>

                            <br>


                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" style="background-color: #FEF9E7 ; border:none" id="Dueno" name="Dueno"
                                           class="form-control" readonly="">
                                </div>

                                <div class="col-xs-3">
                                    <input type="text" style="background-color: #FEF9E7 ; border:none" id="Dueno" name="Dueno"
                                           class="form-control" readonly="">
                                </div>

                            </div>
                        </div>

                       <br>

                        <div class="form-group row">
                            <div class="col-sm-8 col-sm-offset-4">
                                <button type="reset" class="btn waves-effect w-md waves-light btn-lg font-15" onmouseout="this.style.background ='#D2D2D2'"  onmouseover="this.style.background ='#8c8c8c'" style=" background-color: #D2D2D2 ; color: #fdfefe; border-radius: 5px">
                                    <strong>Cancelar</strong>
                                </button>

                                <button type="submit" class="btn waves-effect w-md waves-light btn-lg font-15 stepy-next" id="sa-success" value="validate" onmouseout="this.style.background ='#F5B041'"  onmouseover="this.style.background ='#F77C10'" style= "background-color: #F5B041 ; color: #fdfefe; border-radius: 5px">
                                    <strong>Siguiente</strong>
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <!-- End row -->

            <div class="visible-lg" style="height: 79px;"></div>
        </div> <!-- end col -->
    </div> <!-- end container -->

    <!-- end wrapper -->

</body>


<!-- FORM-VALIDATION.HTML -->

<!--Form Wizard-->
<script src="../plugins/jquery.stepy/jquery.stepy.min.js" type="text/javascript"></script>
<!--wizard initialization-->
<script src="assets/pages/jquery.wizard-init.js" type="text/javascript"></script>

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
