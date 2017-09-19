<?php
session_start();
if (!empty($_SESSION['idUsuario'])){
    header("Location: Index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Adminox - Responsive Web App Kit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/LogoLittle.png">


    <!-- Sweet Alert -->
    <link href="../plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/modernizr.min.js"></script>

</head>


<body class="bg-accpunt-pages">

<!-- HOME -->
<section style="background-color: rgba(249,148,76,0.82)">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <div class="wrapper-page">

                    <div class="account-pages">
                        <div class="account-box">
                            <div class="account-logo-box">
                                <h2 class="text-uppercase text-center">
                                    <a href="index.html" class="text-success">
                                        <span><img src="assets/images/LogoLittleFrase.png" alt="" height="60"></span>
                                    </a>
                                </h2>
                                <h5 class="text-uppercase font-bold m-b-5 m-t-50">Iniciar sesión  </h5>

                            </div>
                            <div class="account-content">
                                <form id="frmLogin" name="frmLogin" method="post" class="form-horizontal">

                                    <div class="form-group m-b-20">
                                        <div class="col-xs-12">
                                            <label for="emailaddress">Email</label>
                                            <input class="form-control" style="background-color: #FEF9E7" id="Email" name="Email" type="email" id="emailaddress" required="" placeholder="xxx@xxx.com">
                                        </div>
                                    </div>

                                    <div class="form-group m-b-20">
                                        <div class="col-xs-12">

                                            <label for="password">Contraseña</label>
                                            <input class="form-control" type="password" required="" id="Contrasena" name="Contrasena" placeholder="Ingrese tu Contraseña">
                                        </div>
                                </div>

                                    <div class="form-zgroup text-center m-t-10">
                                        <div class="col-xs-12">
                                            <input class="btn btn-md btn-block btn-primary waves-effect waves-light" id="btnEnviar" value="Iniciar sesión " name="btnEnviar" type="submit">
                                        </div>
                                    </div>

                                </form>
                                <p>
                                    <div id="resultado" name="resultado" class="ui-widget">  </div>
                                </p>

                                <div class="row m-t-50">
                                    <div class="col-sm-12 text-center">
                                        <p class="text-muted">Aun no tienes una cuenta? <a href="registroUsuario.php" class="text-dark m-l-5"><b> Regístrate</b></a></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end card-box-->


                </div>
                <!-- end wrapper -->

            </div>
        </div>
    </div>
</section>
<!-- END HOME -->

<script>
    $("#frmLogin").submit(function(e) {
        e.preventDefault();

        var Email = $("#Email").val();
        var Contrasena = $("#Contrasena").val();

        $.ajax({
            method: "POST",
            url: "../../../../Controlador/UsuarioController.php?action=Login",
            data: { Email: Email, Contrasena: Contrasena}
        })
            .done(function( msg ) {
                console.log(msg);
                if(msg == 1){
                    window.location.href = "Index.php";
                }else{
                    swal(
                        {
                            title: 'Error!',
                            text: ''+msg,
                            type: 'error',
                            confirmButtonColor: '#e81a2d',
                            timer: 5000
                        }
                    );
                }
            });
    });
</script>

<!-- Sweet-Alert  -->
<script src="../plugins/sweet-alert2/sweetalert2.min.js"></script>
<script src="assets/pages/jquery.sweet-alert.init.js"></script>

</body>
</html>