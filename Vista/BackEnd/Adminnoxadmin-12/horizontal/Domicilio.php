<?php

if (!empty($_SESSION['idUsuario']))
{
    header("Location: registroAdopcion.php");
}
?>
<?php include_once("../../../../Controlador/UsuarioController.php") ?>
<?php include_once ("../../../../Controlador/ciudadController.php") ?>
<?php include_once ("../../../../Modelo/Departamento.php") ?>

<?php  $ListaDepartamento = Departamento::getAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />


    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>


    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Plugins css-->
    <link href="../plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="../plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
    <link href="../plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="assets/js/modernizr.min.js"></script>
    <script>



        var removeAllOptionsSelect = function(element_class_or_id){
            var element = $(element_class_or_id+" option");
            $.each(element,function(i,v){
                value = v.value;
                $(element_class_or_id+" option[value="+value+"]").remove();
            })
        };

        function CargarCXD(idD) {
            //alert(idD);
            var id=idD;

            $.ajax({
                url: '../../../../Controlador/DomicilioController.php?action=JSONSelectCiudad',
                type: 'POST',
                dataType: 'json',
                data: {idDep: idD},


            }).done(function (data) {

                removeAllOptionsSelect('.Ciudades');

                $.each(data, function (key, value) {
                    var data = [{id: value.idCiudad, text: value.NombreC}];



                    $(".Ciudades").select2({
                        data: data
                    });


                });
            });
        }

    </script>


    <?php include("Pages/Includes/Imports.php"); ?>
    <?php
    $Usuario = $_SESSION["Usuario"]["Usuario_IdUsuario"];
    $_SESSION["idU"]=$Usuario;
    $arrayUS = Usuario::buscar("Select * from usuario where IdUsuario = '$Usuario'");

     $Ciudad = $_SESSION["Ciudad"]["Ciudad_IdCiudad"];
    $arraCiudad = Ciudad::buscar("Select * from ciudad where IdCiudad= '$Ciudad'");
    ?>

</head>

<body>

<header id="topnav">

    <?php include("Pages/Includes/Menu-Header.php"); ?>

</header>
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
                                <h5 class="text-uppercase font-bold m-b-5 m-t-50">Haz tu nuevo Domicilio</h5>

                            </div>
                            <div class="account-content">

                                <form class="form-horizontal" method="post" enctype="multipart/form-data" action="../../../../Controlador/DomicilioController.php?action=crear">
                                    <div class="col-xs-6">
                                        <select style="background-color: #f5f5f7; border:none" id="Tipo_Domicilio" name="Tipo_Domicilio" class="form-control" required="">
                                            <option value="">Tipo Domicilio</option>
                                            <option value="Casa">casa</option>
                                            <option value="Finca">Finca</option>
                                            <option value="Apartamento">Apartamento</option>
                                            <option value="Cabaña">Cabaña</option>
                                        </select>
                                    </div>

                                    <div class="form-group m-b-20">
                                        <div class="col-xs-12">
                                            <label for="Barrio">Barrio</label>
                                            <input class="form-control" type="TEXT" id="Barrio" name="Barrio" required="" placeholder="Barrio">
                                        </div>
                                    </div>

                                    <div class="form-group m-b-20">
                                        <div class="col-xs-12">
                                            <label for="Direccion">Dirección</label>
                                            <input class="form-control" type="TEXT" id="Direccion" name="Direccion" required="required" placeholder="Dirección">
                                        </div>
                                    </div>
                                    <div class="form-group m-b-20">
                                        <div class="col-xs-12">
                                            <label for="Estrato">Estrato</label>
                                            <input class="form-control" type="Estrato" id="Estrato" name="Estrato" required="" placeholder="Estrato">
                                        </div>
                                    </div>
                                    <p >Departamento</p>
                                    <select style="    position: absolute;    top: -2pc;" class="form-control select2" onchange="CargarCXD(this.value)">
                                    <?php
                                    foreach ($ListaDepartamento as $objDepartamento){?>
                                        <option value="<?php echo $objDepartamento->getIdDepartamento() ?>"> <?php echo $objDepartamento->getNombre()  ?>  </option>

                                    <?php
                                    }
                                    ?>
                                    </select>
                                    <p>Ciudad</p>
                                    <select id="Ciudad" name="Ciudad" class="form-control Ciudades">

                                    </select>


                                    <div class="form-group m-b-20">
                                        <div class="col-xs-12">
                                           <section id="Usuario_IdUsuario" name="Usuario_IdUsuario" class="from-control" required="">

                                           </section>
                                        </div>
                                    </div>
                                            <button class="btn btn-success btn-rounded w-md waves-effect waves-light" type="submit">Finalizar Registro</button>

                                </form>


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



<script src="../plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
<script src="../plugins/switchery/switchery.min.js"></script>
<script src="../plugins/select2/js/select2.min.js" type="text/javascript"></script>
<script src="../plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
<script src="../plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
<script src="../plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
<script src="../plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>


<!-- Init Js file -->
<script type="text/javascript" src="assets/pages/jquery.form-advanced.init.js"></script>

<!-- App js -->
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>



</body>

</html>
