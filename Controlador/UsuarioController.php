<?php
require_once (__DIR__.'/../Modelo/Usuario.php');

if(!empty($_GET['action'])){
    UsuarioController::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}
/**
 * Created by PhpStorm.
 * User: Pcjennyfer
 * Date: 28/08/2017
 * Time: 9:07
 */
class UsuarioController
{
    static function main($action){
        if ($action == "crear"){
            UsuarioController::crear();
        }else if ($action == "editar"){
            UsuarioController::editar();
        }else if ($action == "selectUSuario"){
           // pacienteController::selectUsuario();
        }

    }
    static public function crear (){
        try {
            $arrayUsuario = array();
            $arrayUsuario['Nombres'] = $_POST['Nombres'];
            $arrayUsuario['Apellidos'] = $_POST['Apellidos'];
            $arrayUsuario['Email'] = $_POST['Email'];
            $arrayUsuario['Celular'] = $_POST['Celular'];
            $arrayUsuario['Contrasena'] = $_POST['Contrasena'];
            $arrayUsuario['Estado'] = $_POST['Estado'];
            $arrayUsuario['Fecha_Nacimiento'] = $_POST['Fecha_Nacimiento'];
            $arrayUsuario['Foto'] = "Activo";
            $Usuario = new Usuario() =($arrayUsuario);
            $Usuario->insertRow();
            header("Location: ../Vista/pages/registroPaciente.php?respuesta=correcto");
        } catch (Exception $e) {
            //var_dump($e);
            header("Location: ../Vista/pages/registroPaciente.php?respuesta=error");
        }
    }

}