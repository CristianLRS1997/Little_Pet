m<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Little Pet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="assets/images/LogoLittle.png">

    <!-- Sweet Alert -->
    <link href="../plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

    <?php include("Pages/Includes/Imports.php"); ?>

</head>


<body>

<header id="topnav">

    <?php include("Pages/Includes/Menu-Header.php"); ?>

</header>

<div class="wrapper">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li>
                                <a href="#">Little Pet</a>
                            </li>
                            <li>
                                <a href="#">Preguntas</a>
                            </li>
                            <li class="active">
                                Realizar
                            </li>
                        </ol>
                    </div>
                    <h4 class="page-title">Preguntas</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->


        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">




                    <form name="todo-form"  role="form" class="m-t-20" method="post" action="../../../../Controlador/preguntaController.php?action=crear">
                        <div class="row">
                        <div class="m-t-10">
                            <p>Enunciado</p>
                            <p class="text-muted m-b-15 font-14">
                                Escriba el enunciado y las opciones de respuesta para las personas interesadas en adoptar la mascota.
                            </p>
                            <textarea id="Enunciado" class="form-horizontal " maxlength="225" rows="2" placeholder="Escriba el enunciado hasta 225 caracteres." cols="98"
                             ></textarea>
                        </div>

                        <div class="col-sm-6">
                            <h4 id="todo-message"><span id="todo-remaining"></span> de <span id="todo-total"></span> Opciones</h4>
                        </div>
                        <div class="col-sm-6">
                            <a href="" class="btn btn-warning waves-effect w-md waves-light" id="btn-archive">Eliminar</a>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-sm-6 todo-inputbar">
                                <input type="text" id="todo-input-text" name="todo-input-text" class="form-control" placeholder="Agregar opciones">
                            </div>
                            <div class="col-sm-3 ">
                                <button class="btn btn-primary waves-effect w-md waves-light" type="button" id="todo-btn-submit">Agregar</button>
                            </div>

                        </div>

                       <ul class="list-group m-t-20 todo-list m-b-0" id="todo-list"></ul>

                       <button class="btn btn-success waves-effect w-md waves-light" type="button" >Siguiente</button>
                      </form>





            </div>
            </div><!-- end col -->
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

<!-- Plugins -->
<script src="../plugins/sweet-alert2/sweetalert2.min.js"></script>
<script src="../plugins/moment/moment.js"></script>
<script src="assets/pages/jquery.todo.js"></script>

<!-- App js -->
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>

</body>
</html>