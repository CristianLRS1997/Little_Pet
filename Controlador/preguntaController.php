<?php

require_once (__DIR__.'/../Modelo/Pregunta.php');


/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 29/08/2017
 * Time: 11:09 PM
 */
if(!empty($_GET['action'])){
    preguntaController::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}
class preguntaController
{

    static function main($action){
        if ($action == "crear"){
            preguntaController::crear();
        }else if ($action == "mostrar"){
             preguntaController::mostrar();
        }
        else if ($action == "editar"){
            preguntaController::editar();
        }
    }

    static public function  crear()
    {

        try {
            $arraypreg = array();
            $arraypreg['Enunciado'] = $_POST['Enunciado'];
            $arraypreg['Respuesta1'] =$_POST['Respuesta1'];
            $arraypreg['Respuesta2'] = $_POST['Respuesta2'];
            $arraypreg['Respuesta3'] = $_POST['Respuesta3'];
            $arraypreg['Respuesta4'] = $_POST['Respuesta4'];
            $arraypreg['Estado'] = "Activo";

            $pregunta = new Pregunta ($arraypreg);
            $pregunta->insertar();
            header("Location: ../Vista/BackEnd/Adminnoaxadmin-12/horizontal/Preguntas.php?respuesta=correcto");

        } catch (Exception $e) {

            var_dump($e);

           // $txtMensaje = $e->getMessage();
           // header("Location: ../Vista/BackEnd/Adminnoaxadmin-12/horizontal/Preguntas.php?respuesta=error".$txtMensaje);
        }


    }

     static public function mostrar()
    {
          $arrpreguntas = Pregunta::getAll();
        #$arrcampos = ["Enunciado","Respuesta1","Respuesta2","Respuesta3","Respuesta4"];
          $htmlelemnt ="<p>";
          $htmlelemnt .= "<br>";



          foreach ($arrpreguntas as $pre){


            $htmlelemnt.="<input style='border: hidden' hidden='hidden' id='Pregunta_IdPregunta' name='Pregunta_IdPregunta' >".$pre->getIdpregunta()."</input>";
              $htmlelemnt .= "<h3 class='text-warning'>".$pre->getEnunciado()."</h3>";

              $htmlelemnt.="<div class=\"checkbox checkbox-warning\">".
                                           " <input id=\"checkbox2\" type=\"checkbox\" name='Respuesta' checked>".
                                          "  <label for=\"checkbox2\">".
                                                $pre->getRespuesta1().
                                           " </label>".
                                        "</div>";
              $htmlelemnt.="<div class=\"checkbox checkbox-warning\">".
                  " <input id=\"checkbox2\" type=\"checkbox\" name='Respuesta' >".
                  "  <label for=\"checkbox2\">".
                  $pre->getRespuesta2().
                  " </label>".
                  "</div>";
              $htmlelemnt.="<div class=\"checkbox checkbox-warning\">".
                  " <input id=\"checkbox2\" type=\"checkbox\" name='Respuesta'>".
                  "  <label for=\"checkbox2\">".
                  $pre->getRespuesta3().
                  " </label>".
                  "</div>";
              $htmlelemnt.="<div class=\"checkbox checkbox-warning\">".
                  " <input id=\"checkbox2\" type=\"checkbox\" name='Respuesta' >".
                  "  <label for=\"checkbox2\">".
                  $pre->getRespuesta4().
                  " </label>".
                  "</div>";

          }
        return $htmlelemnt;


    }




}