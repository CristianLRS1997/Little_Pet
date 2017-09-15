<?php
require_once (__DIR__.'/../Modelo/Respuesta.php');
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 29/08/2017
 * Time: 11:26 PM
 */
if(!empty($_GET['action'])){
    respuestaController::main($_GET['action']);
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
            $arrresp = array();
            $arrresp['Respuesta']=$_POST['Respuesta'];
            $arrresp['Pregunta_IdPregunta']= $_POST['Pregunta_IdPregunta'];
            $arrresp['Adopcion_IdAdopcion']= "1";
            $resp = new Respuesta($arrresp);
            $resp->insertar();
            header("Location: ../Vista/BackEnd/Adminnoaxadmin-12/horizontal/mostrarpreguntas.php?respuesta=correcto");
        }catch (Exception $e){
           var_dump($e);

        }
    }

     static public function mostrar()
    {

            $arrrespuesta = Respuesta::getAll();
            $htmlelement = "<h1>";
            $htmlelement = "<p>";


            foreach ($arrrespuesta as $valor ){

                $htmlelement .= "<h1>".$valor->getPregunta()."</h1>";


            }

return $htmlelement;

    }


}