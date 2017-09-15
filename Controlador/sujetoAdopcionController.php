<?php
session_start();
require_once (__DIR__.'/../Modelo/SujetoAdopcion.php');
require_once (__DIR__.'/../Modelo/Usuario.php');
require_once (__DIR__.'/../Modelo/Foto.php');

if(!empty($_GET['action'])){
    sujetoAdopcionController::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}

class sujetoAdopcionController
{
    static function main($action){
        if ($action == "crear"){
            sujetoAdopcionController::crear();
        }else if ($action == "editar"){
            sujetoAdopcionController::editar();
        }
    }

    static public function crear (){
        try {
            $arraySujetoAdopcion = array();
            $arraySujetoAdopcion['Genero'] = $_POST['Genero'];
            $arraySujetoAdopcion['Anos'] = $_POST['Anos'];
            $arraySujetoAdopcion['Meses'] = $_POST['Meses'];
            $arraySujetoAdopcion['Nombre'] = $_POST['Nombre'];
            $arraySujetoAdopcion['Tamano'] = $_POST['Tamano'];
            $arraySujetoAdopcion['Esterilizado'] = $_POST['Esterilizado'];
            $arraySujetoAdopcion['Vacunas'] = "Si";
            $arraySujetoAdopcion['Descripcion'] = $_POST['Descripcion'];
            $arraySujetoAdopcion['Dueno'] = "1";
            $arraySujetoAdopcion['Raza'] = "1";
            $arraySujetoAdopcion['Ciudad'] = "1";
            $arraySujetoAdopcion['Alimentacion'] = $_POST['Alimentacion'];
            $arraySujetoAdopcion['Foto'] = $_POST['Foto'];
            $arraySujetoAdopcion['Estado'] ="Activo";
            $sujetoAdopcion = new SujetoAdopcion ($arraySujetoAdopcion);
            $sujetoAdopcion->insertar();
            header("Location: ../Vista/BackEnd/Adminnoxadmin-12/horizontal/registroSujeto.php ?respuesta=correcto");
        } catch (Exception $e) {
            var_dump($e);
            // header("Location: ../Vista/pages/registroPaciente.php?respuesta=error");
        }
    }

    static public function adminTableUsuario()
    {
        $arrUsuario = SujetoAdopcion::getAll(); /*  */
        $tmpUsuario = new SujetoAdopcion();
        $arrColumnas = [/*"idUsuario",*//*"TipoDocumento",*/
            "    ",""];
        $htmlTable = "<thead>";
        $htmlTable .= "<tr>";
        foreach ($arrColumnas as $NameColumna) {
            $htmlTable .= "<th>" . $NameColumna . "</th>";
        }
        $htmlTable .= "<th></th>";
        $htmlTable .= "</tr>";
        $htmlTable .= "</thead>";

        $htmlTable .= "<tbody>";
        foreach ($arrUsuario as $ObjUsuario) {
            $htmlTable .= "<tr>";

            $esta = Usuario::buscarForId($ObjUsuario->getDueno());
            $htmlTable .= "<tr align='center'>"  ."<img width='200' heigth='200' src='archivos/".$esta->getFoto(). "'>"."</tr>";
            $htmlTable .=  "<p>"."Dueño: ".  $esta->getNombres()."</p>" ;
            $htmlTable .= "<p>"."Nombre: ". $ObjUsuario->getNombre()."</p>" ;
            $htmlTable .= "<p>"."Genero: ". $ObjUsuario->getGenero()."</p>" ;
            $htmlTable .=  "<p>". $ObjUsuario->getAnos() . " Años" ."</p>"."</tr>"  ;


            $icons = "";

            $icons .= "<div class=\"div-table-cell\" style=\"width: 9%;\"><a class=\"btn btn-success\" href='Details-animal.php?IdSujetoAdopcion=".$ObjUsuario->getIdSujetoAdopcion()."'>Ver<i class=\"zmdi zmdi-refresh\"></i></a></div>";




            $htmlTable .=  $icons  ;
            $htmlTable .= "</tr>";


        }
        $htmlTable .= "</tbody>";
        return $htmlTable;
}
}