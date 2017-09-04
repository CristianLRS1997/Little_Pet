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

    <!-- App css -->
    <?php include("Pages/Includes/Imports.php"); ?>

</head>


<body class="bg-accpunt-pages">

<!-- HOME -->
<section>
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
                                <h5 class="text-uppercase font-bold m-b-5 m-t-50">Iniciar Sesion </h5>

                            </div>
                            <div class="account-content">
                                <form id="frmLogin" name="frmLogin" action="../Controlador/UsuarioController.php?action=Login" class="form-horizontal">

                                    <div class="form-group m-b-20">
                                        <div class="col-xs-12">
                                            <label for="emailaddress">Email</label>
                                            <input class="form-control" id="Email" name="Email" type="email" id="emailaddress" required="" placeholder="xxx@xxx.com">
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
                                            <button class="btn btn-md btn-block btn-primary waves-effect waves-light" id="btnEnviar" name="btnEnviar" type="submit"> Inciar Sesion </button>
                                        </div>
                                    </div>

                                </form>
                                <p>
                                    <div id="resultado" name="resultado" class="ui-widget">  </div>
                                </p>

                                <div class="row m-t-50">
                                    <div class="col-sm-12 text-center">
                                        <p class="text-muted">Aun no tienes una cuenta? <a href="registroUsuario.php" class="text-dark m-l-5"><b>Registrate</b></a></p>
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
    $("#frmLogin").submit(function() {
        e.preventDefault();
        var Email = $("#Email").val();
        var Contrasena = $("#Contrasena").val();

        $.ajax({
            method: "POST",
            url: "../Controlador/UsuarioController.php?action=Login",
            data: { Email: Email, Contrasena: Contrasena}
        })
            .done(function( msg ) {
                if(msg == "1"){
                    swal(
                        {
                            title: 'Ingreso Correcto!',
                            text: 'Bienvenido al Sistema!',
                            type: 'success',
                            confirmButtonColor: '#4fa7f3',
                            timer: 2000
                        }
                    ).then(
                        window.location.href = "Index.php";
                    )
                }else{
                    swal(
                        {
                            title: 'Error!',
                            text: 'Ha Ocurrido un Error! '+msg,
                            type: 'error',
                            confirmButtonColor: '#f96a74',
                            timer: 2000
                        }
                    );
                }
            });
    });
</script>


</body>
</html>