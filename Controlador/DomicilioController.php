<?php
require_once (__DIR__.'/../Modelo/Domicilio.php');

if(!empty($_GET['action'])){
    DomicilioController::main($_GET['action']);
}else {
    echo "No se encontro ninguna accion...";
}
/**
 * Created by PhpStorm.
 * User: Pcjennyfer
 * Date: 01/09/2017
 * Time: 2:47
 */
class DomicilioController
{
    static function main($action)
    {
        if ($action == "crear") {
            DomicilioController::crear();
        } else if ($action == "editar") {
            DomicilioController::editar();
        } else if ($action == "selectDomicilio") {
            //  DomicilioController::selectDomicilio();
        }

    }


    static public function crear(){
        try {
            $arrayDomicilio = array();
            $arrayDomicilio['Tipo_Domicilio'] = $_POST['Tipo_Domicilio'];
            $arrayDomicilio['Barrio'] = $_POST['Barrio'];
            $arrayDomicilio['Direccion'] = $_POST['Direccion'];
            $arrayDomicilio['Estrato'] = $_POST['Estrato'];
            $arrayDomicilio['Estado'] = "Activo";
            $arrayDomicilio['Usuario_IdUsuario'] = $_POST['Usuario_IdUsuario'];
            $arrayDomicilio['Ciudad_IdCiudad'] = $_POST['Ciudad_Ciudad'];
            $Domicilio = new Domicilio($arrayDomicilio);
            $Domicilio->insertar();
            header("Location: ../../../../horizontal/perfilUsuario.php?respuesta=correcto");
        } catch (Exception $e) {
            //var_dump($e);
            header("Location: ../../../../horizontal/perfilUsuario.php?respuesta=error");
        }
    }


}