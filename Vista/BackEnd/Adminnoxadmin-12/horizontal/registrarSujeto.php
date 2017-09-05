
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

<header id="topnav">

    <?php include("Pages/Includes/Menu-Header.php"); ?>

</header>

<div class="wrapper">
    <div class="container">

        <div class="col-sm-9" >
            <div class="card-box">
                <h2 class="text-center text-warning">REGISTRA AQUI TU MASCOTA</h2>
                <p class="text-muted font-14 m-b-20">
                    Llena este simple formulario con los datos de tu amigo que vas a dar en adopción, pronto te llegaran ofertas de adopción para que el
                    consiga el hogar que merece con calor de familia.
                </p>

                <form role="form" method="post" action="../../../../Controlador/sujetoAdopcionController.php?action=crear">

                    <div class="row">
                        <div class="col-xs-6 ">
                            <input type="text" id="Nombre" name="Nombre" class="form-control" required
                                   data-parsley-minlength="2" placeholder="Nombre de la mascota"/>
                        </div>
                        <div class="col-xs-6">
                            <select required="" id="Genero" name="Genero" class="form-control" >
                                <option>Genéro del Animal</option>
                                <option value="Macho">Macho</option>
                                <option value="Hembra">Hembra</option>
                            </select>
                            <button onclick="session()">alert</button>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xs-6 col-md-3">
                            <input type="number" id="Ano" name="Ano" class="form-control" required
                                   data-parsley-minlength="1" placeholder="Años"/>
                        </div>
                        <div class="col-xs-6 col-md-3">
                            <input type="number" id="Meses" name="Meses" class="form-control" required
                                   data-parsley-minlength="1" placeholder="Meses"/>
                        </div>

                        <div class="col-xs-6">
                            <select required="" id="Tamano" name="Tamano" class="form-control" >
                                <option>Tamaño</option>
                                <option value="Grande">Grande</option>
                                <option value="Mediano">Mediano</option>
                                <option value="Pequeño">Pequeño</option>
                                <option value="Mini">Mini</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-xs-6">

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-8 col-sm-offset-4">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                Register
                            </button>
                            <button type="reset"
                                    class="btn btn-default waves-effect m-l-5">
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>

                <div class="visible-lg" style="height: 79px;"></div>
            </div>

        </div> <!-- end col -->

    </div> <!-- end container -->
</div>
<!-- end wrapper -->

</body>

</html>
