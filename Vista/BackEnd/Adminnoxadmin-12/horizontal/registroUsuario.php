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
                                <h5 class="text-uppercase font-bold m-b-5 m-t-50">Registrar</h5>
                                <p class="m-b-0">Registrate para adoptar o dar en adopcion</p>
                            </div>
                            <div class="account-content">
                                <form class="form-horizontal" method="post" enctype="multipart/form-data" action="../../../../Controlador/UsuarioController.php?action=crear">

                                    <div class="form-group m-b-20">
                                        <div class="col-xs-12">
                                            <label for="Nombres">Nombre</label>
                                            <input class="form-control" type="TEXT" id="Nombres" name="Nombres" required="" placeholder="Ingrese Nombres">
                                        </div>
                                    </div>

                                    <div class="form-group m-b-20">
                                        <div class="col-xs-12">
                                            <label for="Apellidos">Apellidos</label>
                                            <input class="form-control" type="TEXT" id="Apellidos" name="Apellidos" required="required" placeholder="Ingrese Aprellidos">
                                        </div>
                                    </div>

                                    <div class="form-group m-b-20">
                                        <div class="col-xs-12">
                                            <label for="Email">Email</label>
                                            <input class="form-control" type="email" id="Email" name="Email" required="" placeholder="xxx@xxx.com">
                                        </div>
                                    </div>

                                    <div class="form-group m-b-20">
                                        <div class="col-xs-12">
                                            <label for="Contrasena">Contraseña</label>
                                            <input class="form-control" type="password" required="" id="Contrasena" name="Contrasena"  placeholder="Ingresa tu Contraseña">
                                        </div>
                                    </div>

                                    <div class="form-group m-b-20">
                                        <div class="col-xs-12">
                                            <label for="Contrasena">Imagen</label>
                                            <input type="file" size="32" name="file_profile" value="" />
                                        </div>
                                    </div>

                                    <div class="form-group text-center m-t-10">
                                        <div class="col-xs-12">
                                            <button class="btn btn-success btn-rounded w-md waves-effect waves-light" type="submit">Enviar</button>
                                        </div>
                                    </div>

                                </form>


                                <div class="row m-t-50">
                                    <div class="col-sm-12 text-center">
                                        <p class="text-muted">Ya tienes una cuenta?  <a href="login.php" class="text-dark m-l-5"><b>Ingresa</b></a></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- end card-box-->
                    </div>


                </div>
                <!-- end wrapper -->

            </div>
        </div>
    </div>
</section>
<!-- END HOME -->



<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>

<!-- App js -->
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>

</body>
</html>