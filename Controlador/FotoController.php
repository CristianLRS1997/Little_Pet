    <?php

    require_once (__DIR__.'/../Modelo/Foto.php');

    /**
 * Created by PhpStorm.
 * User: User
 * Date: 14/09/2017
 * Time: 21:44
 */

    if(!empty($_GET['action'])){
        FotoController::main($_GET['action']);
    }else{
        echo "No se encontro ninguna accion...";
    }
class FotoController
{
    static function main($action){
        if ($action == "crear"){
            FotoController::crear();
        }else if ($action == "mostrar"){
            FotoController::listar();
        }
    }

    static public function crear()
    {
        try{
            $arrresp = array();
            $arrresp['RutaFoto']=$_POST['RutaFoto'];
            $arrresp['Estado']=$_POST['Estado'];
            $arrresp['SujetoAdopcion']=$_POST['SujetoAdopcion'];
            $resp = new Respuesta($arrresp);
            $resp->insertar();
            header("Location: ../Vista/BackEnd/Adminnoaxadmin-12/horizontal/Foto.php?respuesta=correcto");
        }catch (Exception $e){
            var_dump($e);

        }
    }

    static public function listar()
    {





    }
}