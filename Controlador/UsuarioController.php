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
    static public function crear(){
        try {
            $arrayUsuario = array();
            $arrayUsuario['Nombres'] = $_POST['Nombres'];
            $arrayUsuario['Apellidos'] = $_POST['Apellidos'];
            $arrayUsuario['Email'] = $_POST['Email'];
            $arrayUsuario['Celular'] = 0;
            $arrayUsuario['Contrasena'] = $_POST['Contrasena'];

            $arrayUsuario['Estado'] = "Activo";
            $arrayUsuario['Fecha_Nacimiento'] = "0000-00-00";
            $arrayUsuario['Foto'] = "Sin Registro";
            $Usuario = new Usuario($arrayUsuario);
            $Usuario->insertar();
            header("Location: ../Vista/BackEnd/Adminnoxadmin-12/horizontal/registroUsuario.php?respuesta=correcto");

        } catch (Exception $e) {

            var_dump($e);
            //header("Location: ../Vista/BackEnd/Adminnoxadmin-12/horizontal/registroUsuario.php?respuesta=error");
        }
    }

    static public function editar (){
        try {
            $arrayUsuario = array();
            $arrayUsuario['Nombres'] = $_POST['Nombres'];
            $arrayUsuario['Apellidos'] = $_POST['Apellidos'];
            $arrayUsuario['Email'] = $_POST['Email'];
            $arrayUsuario['Contrasena'] = $_POST['Contrasena'];
            $arrayUsuario['Estado'] = "Activo";
            $arrayUsuario['Fecha_Nacimiento'] = $_POST['Fecha_Nacimiento'];
            $arrayUsuario['Foto'] = "url";
            $arrayUsuario['IdUsuario'] = $_POST['IdUsuario'];
            $Usuario = new Usuario($arrayUsuario) ;
            $Usuario ->editar();
            header("Location: ../Vista/pages/registroUsuario.php?respuesta=correcto");
        } catch (Exception $e) {
            $txtMensaje = $e->getMessage();
            header("Location: ../Vista/pages/registroUsuario.php?respuesta=error&Mensaje=".$txtMensaje);
        }
    }

}