<?php
require_once (__DIR__.'/../Modelo/Respuesta.php');

require_once (__DIR__.'/../Modelo/Adopcion.php');
require_once (__DIR__.'/../Modelo/Usuario.php');
require_once (__DIR__.'/../Modelo/SujetoAdopcion.php');

/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 29/08/2017
 * Time: 11:26 PM
 */
if(!empty($_GET['action'])){
    respuestaController::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}


class respuestaController
{
    static function main($action){
        if ($action == "crear"){
            respuestaController::crear();
        }else if ($action == "mostrar"){
            respuestaController::mostrar();
        }else if ($action == "crear2"){
            respuestaController::crear2();
        }else if ($action == "crear3"){
            respuestaController::crear3();
        }else if ($action == "crear4"){
            respuestaController::crear4();
        }else if ($action == "crear5"){
            respuestaController::crear5();
        }
        else if ($action == "crear6"){
            respuestaController::crear6();
        }
    }

    static public function crear()
    {



        try{
            $arrresp = array();
            $arrresp['Enunciado']=$_POST['Enunciado'];
            $arrresp['Respuesta']=$_POST['Respuesta'];
            $arrresp['Adopcion_IdAdopcion']= "2";
            $resp = new Respuesta($arrresp);
             $resp->insertar();
           // var_dump($arrresp);
            header("Location: ../Vista/BackEnd/Adminnoxadmin-12/horizontal/Pregunta2.php?respuesta=correcto");
        }catch (Exception $e){
           var_dump($e);

        }
    }
    static public function crear2()
    {



        try{
            $arrresp = array();
            $arrresp['Enunciado']=$_POST['Enunciado'];
            $arrresp['Respuesta']=$_POST['Respuesta'];
            $arrresp['Adopcion_IdAdopcion']= "2";
            $resp = new Respuesta($arrresp);
            $resp->insertar();
            // var_dump($arrresp);
            header("Location: ../Vista/BackEnd/Adminnoxadmin-12/horizontal/Pregunta3.php?respuesta=correcto");
        }catch (Exception $e){
            var_dump($e);

        }
    }
    static public function crear3()
    {



        try{
            $arrresp = array();
            $arrresp['Enunciado']=$_POST['Enunciado'];
            $arrresp['Respuesta']=$_POST['Respuesta'];
            $arrresp['Adopcion_IdAdopcion']= "2";
            $resp = new Respuesta($arrresp);
            $resp->insertar();
            // var_dump($arrresp);
            header("Location: ../Vista/BackEnd/Adminnoxadmin-12/horizontal/Pregunta4.php?respuesta=correcto");
        }catch (Exception $e){
            var_dump($e);

        }
    }
    static public function crear4()
    {



        try{
            $arrresp = array();
            $arrresp['Enunciado']=$_POST['Enunciado'];
            $arrresp['Respuesta']=$_POST['Respuesta'];
            $arrresp['Adopcion_IdAdopcion']= "2";
            $resp = new Respuesta($arrresp);
            $resp->insertar();
            // var_dump($arrresp);
            header("Location: ../Vista/BackEnd/Adminnoxadmin-12/horizontal/Pregunta5.php?respuesta=correcto");
        }catch (Exception $e){
            var_dump($e);

        }
    }
    static public function crear5()
    {



        try{
            $arrresp = array();
            $arrresp['Enunciado']=$_POST['Enunciado'];
            $arrresp['Respuesta']=$_POST['Respuesta'];
            $arrresp['Adopcion_IdAdopcion']= "2";
            $resp = new Respuesta($arrresp);
            $resp->insertar();
            // var_dump($arrresp);
            header("Location: ../Vista/BackEnd/Adminnoxadmin-12/horizontal/Pregunta6.php?respuesta=correcto");
        }catch (Exception $e){
            var_dump($e);

        }
    }
    static public function crear6()
    {



        try{
            $arrresp = array();
            $arrresp['Enunciado']=$_POST['Enunciado'];
            $arrresp['Respuesta']=$_POST['Respuesta'];
            $arrresp['Adopcion_IdAdopcion']= "2";
            $resp = new Respuesta($arrresp);
            $resp->insertar();
            // var_dump($arrresp);
            header("Location: ../Vista/BackEnd/Adminnoxadmin-12/horizontal/Index.php?respuesta=correcto");
        }catch (Exception $e){
            var_dump($e);

        }
    }



    static public function mostrar()
    {


        $arrpreguntas =  Respuesta::getAll();
        #$arrcampos = ["Enunciado","Respuesta1","Respuesta2","Respuesta3","Respuesta4"];
        $htmlelemnt ="<p>";
        $htmlelemnt .= "<br>";



        foreach ($arrpreguntas as $pre){

              $adop = Adopcion::buscarForId($pre->getAdopcion());
              $usuario = Usuario::buscarForId($adop->getPadrino());
              $sujeto = SujetoAdopcion::buscarForId($adop->getSujetoAdopcion());

            $htmlelemnt .= "<h5 class='text-warning'>"."Enunciado: ".$pre->getEnunciado()."</h5>";

            $htmlelemnt.="<h5 >"."Respuesta: ".$pre->getRespuesta()."</h5>";

            $htmlelemnt .= "<h5 >"."Autor: ".$usuario->getNombres()."</h5>";
            $htmlelemnt .= "<h5 >"."Mascota: ".$sujeto->getNombre()."</h5>";



        }
        return $htmlelemnt;



    }


}