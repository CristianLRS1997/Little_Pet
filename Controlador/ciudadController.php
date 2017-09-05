<?php
require_once (__DIR__.'/../Modelo/Ciudad.php');
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 04/09/2017
 * Time: 9:58 PM
 */
if(!empty($_GET['action'])){
    ciudadController::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}
class ciudadController
{
    static function main($action){
        if ($action == "mostrar"){
            ciudadController::mostrar();
        }

    }

    static public function mostrar ($isRequired=true, $id="IdCiudad", $nombre="IdCiudad", $class=""){
        $arrciudad= Ciudad::getAll(); /*  */
        $htmlSelect = "<select ".(($isRequired) ? "required" : "")." id= '".$id."' name='".$nombre."' class='".$class."'>";
        $htmlSelect .= "<option >Seleccione</option>";
        if(count($arrciudad) > 0){
            foreach ($arrciudad as $ciudad)
                $htmlSelect .= "<option value='".$ciudad->getIdCiudad()."'>".$ciudad->getNombre()."</option>";
        }
        $htmlSelect .= "</select>";
        return $htmlSelect;
    }


}