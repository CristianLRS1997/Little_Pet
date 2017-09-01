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

                <form role="form">
                    <div class="row">
                        <div class="col-xs-6 ">

                            <input type="email" required parsley-type="email" class="form-control"
                                   id="inputEmail3" placeholder="Email">
                        </div>
                        <div class="col-xs-6">
                            <select id="heard" class="form-control" required="">
                                <option value="">Genéro del Animal</option>
                                <option value="macho">Macho</option>
                                <option value="hembra">Hembra</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xs-6 col-md-3">
                            <input type="email" required parsley-type="email" class="form-control"
                                   id="inputEmail3" placeholder="Email">
                        </div>
                        <div class="col-xs-6 col-md-3">
                            <input type="email" required parsley-type="email" class="form-control"
                                   id="inputEmail3" placeholder="Email">
                        </div>

                        <div class="col-xs-6">
                            <input type="email" required parsley-type="email" class="form-control"
                                   id="inputEmail3" placeholder="Email">
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-8 col-sm-offset-4">
                            <div class="checkbox checkbox-purple">
                                <input id="checkbox6" type="checkbox">
                                <label for="checkbox6">
                                    Remember me
                                </label>
                            </div>
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
