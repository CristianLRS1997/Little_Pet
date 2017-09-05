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
            $arraypreg['SujetoAdopcion'] = "2";

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
          $arrcampos = ["Enunciado","Respuesta1","Respuesta2","Respuesta3","Respuesta4"];
          $htmlelemnt ="<p>";
          $htmlelemnt .= "<br>";


          foreach ($arrpreguntas as $pre){

              $htmlelemnt .= "<h1 style='color: #00ACED'>".$pre->getEnunciado()."</h1>";
              $htmlelemnt .= "<p>".$pre->getRespuesta1()."</p>";
              $htmlelemnt .= "<p>".$pre->getRespuesta2()."</p>";
              $htmlelemnt .= "<p>".$pre->getRespuesta3()."</p>";
              $htmlelemnt .= "<p>".$pre->getRespuesta4()."</p>";
              $htmlelemnt .= "<div class='button-list' align='right'>";
              $htmlelemnt .="<button type='submit' title='Editar' class='btn btn-icon waves-effect waves-light btn-danger' href='actualizarpregunta.php?Idpregunta=".$pre->getIdpregunta()."'> <i class='fa fa-wrench '></i> </button>";
              $htmlelemnt .="<button type='submit'   title='Eliminar' class='btn btn-icon waves-effect waves-light btn-warning button-list '> <i class='fa fa-remove'></i> </button>";
              $htmlelemnt .= "</div>";
              $htmlelemnt .= "<br>";

          }
        return $htmlelemnt;


    }

     static public function editar()
    {
        try {

            $arraypreg = array();
            $arraypreg['Enunciado'] = $_POST['Enunciado'];
            $arraypreg['Respuesta1'] =$_POST['Respuesta1'];
            $arraypreg['Respuesta2'] = $_POST['Respuesta2'];
            $arraypreg['Respuesta3'] = $_POST['Respuesta3'];
            $arraypreg['Respuesta4'] = $_POST['Respuesta4'];
            $arraypreg['Estado'] = "Activo";
            $arraypreg['SujetoAdopcion'] = "2";

            $pregunta = new Pregunta ($arraypreg);
            $pregunta->editar();

            header("Location: ../Vista/BackEnd/Adminnoaxadmin-12/horizontal/actualizarpregunta.php?respuesta=correcto&IdPregunta".$arraypreg['IdPregunta']);

        } catch (Exception $e) {

            var_dump($e);

            // $txtMensaje = $e->getMessage();
            // header("Location: ../Vista/BackEnd/Adminnoaxadmin-12/horizontal/Preguntas.php?respuesta=error".$txtMensaje);
        }
    }


}