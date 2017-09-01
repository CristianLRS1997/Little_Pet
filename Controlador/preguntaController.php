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
        }/*else if ($action == "editar"){
             preguntaController::editar();
        }*/
    }

    static public function  crear()
    {

        try {
            $arraypreg = array();
            $arraypreg['Enunciado'] = $_POST['Enunciado'];
            $arraypreg['Pregunta1'] = "rfdtg";
            $arraypreg['Pregunta2'] = "edrfgh";
            $arraypreg['Pregunta3'] = "erdfgh";
            $arraypreg['Pregunta4'] = "wedrfg";
            $arraypreg['Estado'] = "Activo";
            $arraypreg['SujetoAdopcion'] = "1";

            $pregunta = new Pregunta ($arraypreg);
            $pregunta->insertar();
            header("Location: ../../../horizontal/Preguntas.php?respuesta=correcto");

        } catch (Exception $e) {

            $txtMensaje = $e->getMessage();
            header("Location: ../../../horizontal/Preguntas.php?respuesta=error".$txtMensaje);
        }


    }

}