<?php
session_start();
require_once (__DIR__.'/../Modelo/Adopcion.php');

if(!empty($_GET['action'])){
    adopcionController::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}
class adopcionController
{

    static function main($action){
        if ($action == "crearAdopcion"){
            adopcionController::crear();
        }else if ($action == "editar"){
            adopcionController::editar();
        }
    }

    static public function crear (){
        try {
            $arrayAdopcion = array();
            $arrayAdopcion['Estado'] = $_POST['Estado'];
            $arrayAdopcion['Padrino'] = $_POST['Padrino'];
            $arrayAdopcion['SujetoAdopcion'] = $_POST['SujetoAdopcion'];
            $Adopcion = new Adopcion ($arrayAdopcion);
            $Adopcion->insertar();
            header("Location: ../Vista/pages/registroEspecialista.php?respuesta=correcto");
        } catch (Exception $e) {
            var_dump($e);
            //header("Location: ../Vista/pages/registroEspecialista.php?respuesta=error");
        }
    }

}