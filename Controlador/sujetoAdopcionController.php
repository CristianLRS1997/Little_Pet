<?php
session_start();
require_once (__DIR__.'/../Modelo/SujetoAdopcion.php');

if(!empty($_GET['action'])){
    sujetoAdopcionController::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}

class sujetoAdopcionController
{
    static function main($action){
        if ($action == "crear"){
            sujetoAdopcionController::crear();
        }else if ($action == "editar"){
            sujetoAdopcionController::editar();
        }
    }

    static public function crear (){
        try {
            $arraySujetoAdopcion = array();
            $arraySujetoAdopcion['Genero'] = $_POST['Genero'];
            $arraySujetoAdopcion['Anos'] = $_POST['Anos'];
            $arraySujetoAdopcion['Meses'] = $_POST['Meses'];
            $arraySujetoAdopcion['Nombre'] = $_POST['Nombre'];
            $arraySujetoAdopcion['Tamano'] = $_POST['Tamano'];
            $arraySujetoAdopcion['Esterilizado'] = $_POST['Esterilizado'];
            $arraySujetoAdopcion['Vacunas'] = "Si";
            $arraySujetoAdopcion['Descripcion'] = $_POST['Descripcion'];
            $arraySujetoAdopcion['Dueno'] = "1";
            $arraySujetoAdopcion['Raza'] = "1";
            $arraySujetoAdopcion['Ciudad'] = "1";
            $arraySujetoAdopcion['Alimentacion'] = $_POST['Alimentacion'];
            $arraySujetoAdopcion['Estado'] ="Activo";
            $sujetoAdopcion = new SujetoAdopcion ($arraySujetoAdopcion);
            $sujetoAdopcion->insertar();
            header("Location: ../Vista/BackEnd/Adminnoxadmin-12/horizontal/registroSujeto.php ?respuesta=correcto");
        } catch (Exception $e) {
            var_dump($e);
            // header("Location: ../Vista/pages/registroPaciente.php?respuesta=error");
        }
    }

}