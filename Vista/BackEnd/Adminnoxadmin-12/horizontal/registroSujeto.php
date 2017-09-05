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

        <div class="col-sm-9 center-page">
            <div class="card-box">
                <h3 class="text-center text-warning">REGISTRA AQUI A TU MASCOTA EN ADOPCIÓN</h3>
                <br>
                <p class="font-15 m-b-20" align="justify">
                    Llena este simple formulario con los datos de tu amigo que vas a dar en adopción, pronto te llegaran
                    ofertas de adopción para que el consiga el hogar que merece con calor de familia.
                </p>

                <br>

                <form role="form" method="post" action="../../../../Controlador/sujetoAdopcionController.php?action=crear">

                    <div class="col-xs-9 center-page">

                        <label>
                            <input type="radio" name="fb" value="op" />
                            <img class="icon-colored" src="assets/images/icons/Perro.svg" title="Perros"/>
                        </label>

                        <label>
                            <input type="radio" name="fb" value="op" />
                            <img class="icon-colored" src="assets/images/icons/Ave.svg" title="Aves"/>
                        </label>
                        <label>
                            <input type="radio" name="fb" value="op" />
                            <img class="icon-colored" src="assets/images/icons/Gato.svg" title="Gatos"/>
                        </label>

                        <label>
                            <input type="radio" name="fb" value="op" />
                            <img class="icon-colored" src="assets/images/icons/Pez.svg" title="Peces"/>
                        </label>

                        <label>
                            <input type="radio" name="fb" value="op" />
                            <img class="icon-colored" src="assets/images/icons/Roedor.svg" title="Roedor"/>
                        </label>

                    </div>


                    <div class="row">

                        <div class="col-xs-6 ">
                            <input type="text" style="background-color: #FEF9E7 ; border:none" id="Nombre" name="Nombre" class="form-control" required
                                   data-parsley-minlength="2" placeholder="Nombre de la mascota"/>
                        </div>
                        <div class="col-xs-6">
                            <select style="background-color: #FEF9E7 ; border:none" required="" id="Genero"  name="Genero" class="form-control" >
                                <option value="">Genéro del Animal</option>
                                <option value="Macho">Macho</option>
                                <option value="Hembra">Hembra</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xs-6 col-md-3">
                            <input style="background-color: #FEF9E7 ; border:none" type="number" id="Anos" name="Anos" class="form-control" required
                                   data-parsley-minlength="1" placeholder="Años"/>
                        </div>
                        <div class="col-xs-6 col-md-3">
                            <input style="background-color: #FEF9E7 ; border:none" type="number" id="Meses" name="Meses" class="form-control" required
                                   data-parsley-minlength="1" placeholder="Meses"/>
                        </div>

                        <div class="col-xs-6">
                            <select style="background-color: #FEF9E7; border:none " required="" id="Tamano" name="Tamano" class="form-control" >
                                <option value="">Tamaño</option>
                                <option value="Grande">Grande</option>
                                <option value="Mediano">Mediano</option>
                                <option value="Pequeño">Pequeño</option>
                                <option value="Mini">Mini</option>
                            </select>
                        </div>
                    </div>

                    <br>

                    <div class="form-group row">

                        <div class="col-xs-6 col-md-3">
                            <select style="background-color: #FEF9E7; border:none " required="" id="Vacunas" name="Vacunas" class="form-control" >
                                <option value="">Vacunas</option>
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                                <option value="No Reporta">No Reporta</option>
                            </select>
                        </div>

                        <div class="col-xs-6 col-md-3">
                            <select style="background-color: #FEF9E7; border:none " required="" id="Alimentacion" name="Alimentacion" class="form-control" >
                                <option value="">Alimentación</option>
                                <option value="Normal">Normal</option>
                                <option value="Especial">Especial</option>
                                <option value="No Sabe">No Sabe</option>
                            </select>
                        </div>

                        <div class="col-xs-6">
                            <div class="radio radio-warning radio-inline">
                                <input type="radio" id="Si" value="Si" name="radioInline" checked>
                                <label for="Si">Esta esterilizado</label>
                            </div>
                            <div class="radio radio-warning radio-inline">
                                <input type="radio" id="No" value="Si" name="radioInline">
                                <label for="No">Sin esterilizar</label>
                            </div>

                        </div>

                    </div>

                    <br>


                    <div class="form-group">
                        <textarea  style="background-color: #FEF9E7; border:none " id="Descripciom" class="form-control" name="Descripcion"
                                  data-parsley-trigger="keyup" data-parsley-minlength="50"
                                  data-parsley-minlength-message="Debe terner almenos una descripción de 50 caracteres."
                                  data-parsley-validation-threshold="10" placeholder="Describe a tu mascota..."></textarea>
                    </div>



                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-20 p-b-0">
                                <div class="form-group clearfix" >
                                    <div class="col-sm-12 padding-left-0 padding-right-0" >
                                        <input type="file" name="files[]" id="filer_input1"
                                               multiple="multiple">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="form-group row">
                        <div class="col-sm-8 col-sm-offset-4">
                            <button type="reset" class="btn waves-effect w-md waves-light btn-lg font-15" onmouseout="this.style.background ='#D2D2D2'"  onmouseover="this.style.background ='#8c8c8c'" style=" background-color: #D2D2D2 ; color: #fdfefe; border-radius: 5px">
                                <strong>Cancelar</strong>
                            </button>
                            <button type="submit" class="btn waves-effect w-md waves-light btn-lg font-15 " value="validate" onmouseout="this.style.background ='#F5B041'"  onmouseover="this.style.background ='#F77C10'" style= "background-color: #F5B041 ; color: #fdfefe; border-radius: 5px">
                                <strong>Guardar</strong>
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