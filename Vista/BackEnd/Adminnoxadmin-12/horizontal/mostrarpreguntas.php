<?php require "../../../../Controlador/preguntaController.php";?>
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
                    <h4 class="text-center text-warning">Preguntas</h4>
                    <p class="text-muted font-14 m-b-20">
                        Estas son las preguntas que realizo.
                    </p>

                   <?php echo preguntaController::mostrar();?> bg
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
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>

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

</body>
</html>