<?php
require_once (__DIR__.'/../Modelo/Respuesta.php');
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 29/08/2017
 * Time: 11:26 PM
 */
if(!empty($_GET['action'])){
    preguntaController::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}
class respuestaController
{
    static function main($action){
        if ($action == "crear"){
            respuestaController::crear();
        }else if ($action == "mostrar"){
            respuestaController::mostrar();
        }




    }

    static public function crear()
    {
        try{




        }catch (Exception $e){
           var_dump($e);

        }





    }


}