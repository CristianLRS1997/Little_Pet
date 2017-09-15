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

<div class="wrapper" style="background-color: #FDFEFE">
    <div class="container">


        <div class="col-sm-9 center-page">

            <br>

            <br>

            <h3 class="text-center text-warning"><strong>REGISTRA AQUI A TU MASCOTA EN ADOPCIÓN</strong></h3>

            <br>
            <p class="font-15 m-b-20" align="justify">
                A continuación tendras 3 simples tips para el registro de la mascota que vas a dar enadopción, solo
                sigue los pasos para que la posible adopción sea mas efectiva y encuentre el mejor hogar posible. Lee
                detenidamente los tips que te mostramos acontinución:
            </p>

            <br>

            <p align="justify" style="color: #F49719"  class="font-18">
                <img class="icon-colored" src="assets/images/icons/compact_camera.svg" align="left"/>

                Toma las fotos claras, que esten enfocadas con luz y tomale los mejores angulos de tu mascota
                esto ayudara a que se vea lo hermoso que es para que nuestros padrinos opten por la adopción ese
                adorable amigo lo mas rapido posible.

            </p>

            <br>

            <p align="justify" style="color: #F49719" class="font-18">
                <img class="icon-colored" src="assets/images/icons/like.svg"  align="left"/>

                Con nosotros encontraras apoyo para que tu amigo peludo encuentre un hogar amoroso y seguro, por lo
                tu ayuda colaborandonos con ayudar a esa mascota dandole abrigo y cariño mientras una famila opta
                por escoger este hermoso amiguito, recuerda mantenerlo saludable.
            </p>

            <br>

            <p align="justify" style="color: #F49719" class="font-18">
                <img class="icon-colored" src="assets/images/icons/inspection.svg" align="left"/>

                    En este ultimo paso necesitamos tu sinceridad y consentimiento de los datos que estas suministrando en
                    nuestra pagina, necesitamos dados que sean veracez para asi podernos contactar contigo y que el padrino
                    de tu mascota tambien pueda hacerlo para aclarar alguna duda.

            </p>

            <br>

            <br>

            <div class="col-xs-6 center-page" >
                <button onclick="location.href='registroSujeto.php'" type="button" class="btn btn-block waves-effect waves-light font-15" onmouseout="this.style.background ='#F5B041'"
                        onmouseover="this.style.background ='#F77C10'" style= "background-color: #F5B041 ; color: #fdfefe;
                        border-radius: 5px">SIGUIENTE</button>
            </div>

            <br>

            <br>

        </div> <!-- end col -->

    </div> <!-- end container -->
</div>
<!-- end wrapper -->

</body>

</html>
