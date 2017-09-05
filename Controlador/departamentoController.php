<?php
require_once (__DIR__.'/../Modelo/Departamento.php');
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 04/09/2017
 * Time: 9:44 PM
 */
if(!empty($_GET['action'])){
    departamentoController::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}
class departamentoController
{
    static function main($action){
        if ($action == "mostrar"){
            departamentoController::mostrar();
        }

    }

    static public function mostrar ($isRequired=true, $id="IdDepartamento", $nombre="IdDepartamento", $class=""){
        $arrdep= Departamento::getAll(); /*  */
        $htmlSelect = "<select ".(($isRequired) ? "required" : "")." id= '".$id."' name='".$nombre."' class='".$class."'>";
        $htmlSelect .= "<option >Seleccione</option>";
        if(count($arrdep) > 0){
            foreach ($arrdep as $dep)
                $htmlSelect .= "<option value='".$dep->getIdDepartamento()."'>".$dep->getNombre()."</option>";
        }
        $htmlSelect .= "</select>";
        return $htmlSelect;
    }

}