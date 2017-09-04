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
    static function main($action)
    {
        if ($action == "crear") {
            UsuarioController::crear();
        } else if ($action == "editar") {
            UsuarioController::editar();
        } else if ($action == "selectUSuario") {
            pacienteController::selectUsuario();
        } else if($action == "Login"){
            usuarios_controller::Login();
        } else if($action == "CerrarSession"){
            usuarios_controller::CerrarSession();
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
            $arrayUsuario['Foto'] = "Sin Registro";
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
                        echo "<div class='ui-state-error ui-corner-all' style='margin-top: 20px; padding: 0 .7em;'>";
                        echo "<p><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span>";
                        echo "<strong>Error!</strong> El usuario se encuentra Inactivo</p>";
                        echo "</div>";
                    }
                }else if($respuesta == "Contrasena Incorrecto"){
                    echo "<div class='ui-state-error ui-corner-all' style='margin-top: 20px; padding: 0 .7em;'>";
                    echo "<p><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span>";
                    echo "<strong>Error!</strong> La Contraseña No Coincide Con El Usuario</p>";
                    echo "</div>";
                }else if($respuesta == "No existe el usuario"){
                    echo "<div class='ui-state-error ui-corner-all' style='margin-top: 20px; padding: 0 .7em;'>";
                    echo "<p><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span>";
                    echo "<strong>Error!</strong> No Existe Un Usuario Con Estos Datos</p>";
                    echo "</div>";
                }
            }else{
                echo "<div class='ui-state-error ui-corner-all' style='margin-top: 20px; padding: 0 .7em;'>";
                echo "<p><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span>";
                echo "<strong>Error!</strong> Datos Vacios</p>";
                echo "</div>";
            }
        } catch (Exception $e) {
            header("Location: ../login.php?respuesta=error");
        }
    }

    public function CerrarSession (){
        session_destroy();
        header("Location: ../Vista/login.php");
    }



}