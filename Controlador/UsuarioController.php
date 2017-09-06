<?php
session_start();
require_once (__DIR__.'/../Modelo/Usuario.php');
require_once (__DIR__.'/../Vista/BackEnd/Adminnoxadmin-12/horizontal/Pages/apis/class.upload.php');

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
    static function main($action)
    {
        if ($action == "crear") {
            UsuarioController::crear();
        } else if ($action == "editar") {
            UsuarioController::editar();
        } else if ($action == "selectUSuario") {
            pacienteController::selectUsuario();
        } else if($action == "Login"){
            UsuarioController::Login();
        } else if($action == "CerrarSession"){
            UsuarioController::CerrarSession();
        }
    }

    static public function crear()
    {
        try {
            $arrayUsuario = array();
            $arrayUsuario['Nombres'] = $_POST['Nombres'];
            $arrayUsuario['Apellidos'] = $_POST['Apellidos'];
            $arrayUsuario['Email'] = $_POST['Email'];
            $arrayUsuario['Celular'] = "0";
            $arrayUsuario['Contrasena'] = $_POST['Contrasena'];
            $arrayUsuario['Estado'] = "Activo";
            $arrayUsuario['Fecha_Nacimiento'] = "0000-00-00";
            /* Subir la Foto */
            $archivos = new Upload($_FILES['file_profile']);
            $NameArchivos = "";
            if ($archivos->uploaded){
                $archivos->file_new_name_body = date('H-M-s')."-".$archivos->file_src_name_body;
                $NameArchivos =  date('H-M-s')."-".$archivos->file_src_name_body.".".$archivos->file_src_name_ext;
                $archivos->Process('../Vista/BackEnd/Adminnoxadmin-12/horizontal/archivos');
                if($archivos->processed){
                    echo "Archivo Subido";
                }else{
                    echo "Archivo No Subido, Error en la carpeta..".$archivos->error;
                }
                $archivos->Clean();
                
            }else{
                echo "Error al subir el archivo...".$archivos->error;
            }

            $arrayUsuario['Foto'] = $NameArchivos;
            var_dump($arrayUsuario);
            $Usuario = new Usuario($arrayUsuario);
            $Usuario->insertar();
            header("Location: ../Vista/BackEnd/Adminnoxadmin-12/horizontal/registroUsuario.php?respuesta=correcto");

        } catch (Exception $e) {

            var_dump($e);
            //header("Location: ../Vista/BackEnd/Adminnoxadmin-12/horizontal/registroUsuario.php?respuesta=error");
        }
    }

    static public function editar()
    {
        try {
            $arrayUsuario = array();
            $arrayUsuario['Nombres'] = $_POST['Nombres'];
            $arrayUsuario['Apellidos'] = $_POST['Apellidos'];
            $arrayUsuario['Email'] = $_POST['Email'];
            $arrayUsuario['Contrasena'] = $_POST['Contrasena'];
            $arrayUsuario['Estado'] = "Activo";
            $arrayUsuario['Fecha_Nacimiento'] = "0000-00-00";
            $arrayUsuario['Foto'] = "url";
            $arrayUsuario['IdUsuario'] = $_POST['IdUsuario'];
            $Usuario = new Usuario($arrayUsuario);
            $Usuario->editar();
            header("Location: ../Vista/BackEnd/Adminnoxadmin-12/horizontal/registroUsuario.php?respuesta=correcto");
        } catch (Exception $e) {
            $txtMensaje = $e->getMessage();
            header("Location: ../Vista/BackEnd/Adminnoxadmin-12/horizontal/registroUsuario.php?respuesta=error&Mensaje=" . $txtMensaje);
        }
    }

    public function Login (){

        try {
            $Email = $_POST['Email'];
            $Contrasena = $_POST['Contrasena'];
            if(!empty($Email) && !empty($Contrasena)){
                $respuesta = Usuario::Login($Email, $Contrasena);
                if (is_array($respuesta)) {
                  if($respuesta["Estado"] == "Activo"){
                        $_SESSION['DataUser'] = $respuesta;
                        echo TRUE;
                    }else{
                        echo "El usuario se encuentra Inactivo";
                    }
                }else if($respuesta == "Contrasena Incorrecto"){
                    echo "La Contraseña No Coincide Con El Usuario";
                }else if($respuesta == "No existe el usuario"){
                    echo "No Existe Un Usuario Con Estos Datos";
                }
            }else{
                echo "Datos Vacios";
            }
        } catch (Exception $e) {
            echo "Error No Identificado!!! ".$e;
        }
    }

    public function CerrarSession (){
        session_destroy();
        header("Location: ../Vista/BackEnd/Adminnoxadmin-12/horizontal/login.php");
    }



}