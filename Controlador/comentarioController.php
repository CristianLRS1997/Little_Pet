<?php
require_once (__DIR__.'/../Modelo/Comentario.php');
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 28/08/2017
 * Time: 10:03 PM
 */
if(!empty($_GET['action'])){
    comentarioController::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}

class comentarioController
{
    /**
     * @param $action
     */
    static function main($action){
        if ($action == "crear"){
            comentarioController::crear();
        }else if ($action == "editar"){
             comentarioController::editar();
        }else if ($action == "mostrar"){
             comentarioController::mostrar();
        }
    }

    /**
     *
     */
    static public function  crear(){

        try{
            $arraycomentario = array ();
            $arraycomentario['Descripcion'] = $_POST['Descripcion'];
            $arraycomentario['SujetoAdopcion_IdSujetoAdopcion'] = $_POST['SujetoAdopcion_IdSujetoAdopcion'];
            $arraycomentario['Respuesta'] = $_POST['Respuesta'];
            $arraycomentario['Usuario_Interesado'] = $_POST['Usuario_Interesado'];
            $Comentario = new Comentario ($arraycomentario);
            $Comentario-> insertar();
            header("Location: ../Vista/pages/comentario.php?respuesta=correcto");

        } catch (Exception $e){


            header("Location: ../Vista/pages/comentario.php?respuesta=error");
        }



  }
    static public function  editar(){

        try{
            $arraycomentario = array ();
            $arraycomentario['Descripcion'] = $_POST['Descripcion'];
            $arraycomentario['SujetoAdopcion_IdSujetoAdopcion'] = $_POST['SujetoAdopcion_IdSujetoAdopcion'];
            $arraycomentario['Respuesta'] = $_POST['Respuesta'];
            $arraycomentario['Usuario_Interesado'] = $_POST['Usuario_Interesado'];
            $Comentario = new Comentario ($arraycomentario);
            $Comentario->editar();
            header("Location: ../Vista/pages/comentario.php?respuesta=correcto");

        } catch (Exception $e){


            header("Location: ../Vista/pages/comentario.php?respuesta=error");
        }



    }

     static public function mostrar()
    {
            $arrcome = Comentario::getAll();
            $htmlelement = "<br>";
            $htmlelement = "<h1>";

            foreach ($arrcome as $valor){

                $htmlelement .= "<h1>".$valor->getUsuario()."</h1>";
              $htmlelement .= "<h1>".$valor->getDescripcion()."</h1>";
              $htmlelement .= "<h1>".$valor->getRespuesta()."</h1>";
              $htmlelement .= "<br>";



            }

          return $htmlelement;


    }

}