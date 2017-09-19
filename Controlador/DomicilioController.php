<?php
require_once (__DIR__.'/../Modelo/Domicilio.php');
require_once (__DIR__.'/../Modelo/Ciudad.php');

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
        } else if ($action == "JSONSelectCiudad") {
            DomicilioController::JSONSelectCiudad();
        } else if ($action == "selectDomicilio") {
            //

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
            $arrayDomicilio['Uuario_IdUsuario'] =2;
            $arrayDomicilio['Ciudad_IdCiudad'] = $_POST["Ciudad"];
            //$arrayDomicilio['Ciudad_IdCiudad'] = $_POST['Ciudad_IdCiudad'];
            var_dump($arrayDomicilio);
            $Domicilio = new Domicilio($arrayDomicilio);
            $Domicilio->insertar();
            header("Location: ../Vista/BackEnd/Adminnoxadmin-12/horizontal/Index.php?respuesta=correcto");
        } catch (Exception $e) {

            var_dump($e);
            //header("Location: ../../../../horizontal/registroDomicilio.php?respuesta=error");
        }
    }


    static public function JSONSelectCiudad()
    {


        try {
            $IdDep = $_POST["idDep"];

            $arrayCiudades = Ciudad ::buscar("SELECT * FROM `ciudad` where  ciudad.Departamento_IdDepartamento='$IdDep'");

            $arrayCi=array();

            foreach ($arrayCiudades as $objCiudades) {

                $arrayCi[] = array("idCiudad" => $objCiudades->getIdCiudad(), "NombreC" => $objCiudades->getNombre());


            }
            header('Content-Type: application/json');
            //echo json_encode($arrayE);
            $myJSON = json_encode($arrayCi);

            echo $myJSON;;



        } catch (Exception $e) {

            var_dump($e);

        }


    }


}