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
            $arraypreg['Respuesta'] = $_POST['Respuesta'];
            $arraypreg['Pregunta_IdPregunta'] = $_POST['Pregunta_IdPregunta'];
            $arraypreg['Adopcion_IdAdopcion'] = $_POST['Adopcion_IdAdopcion'];

            $Pregunta = new Pregunta ($arraypreg);
            $Pregunta->insertar();
            header("Location: ../Vista/pages/pregunta.php?respuesta=correcto");

        } catch (Exception $e) {


            header("Location: ../Vista/pages/pregunta.php?respuesta=error");
        }


    }

}