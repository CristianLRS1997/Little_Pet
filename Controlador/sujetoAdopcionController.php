<?php
session_start();
require_once (__DIR__.'/../Modelo/SujetoAdopcion.php');
require_once (__DIR__.'/../Vista/BackEnd/Adminnoxadmin-12/horizontal/Pages/apis/class.upload.php');



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
        }else if ($action == "adminTableSujeto"){
            sujetoAdopcionController::adminTableSujeto();
        }else if ($action == "InactivarSujeto"){
            sujetoAdopcionController::CambiarEstado("Inactivo");
        }else if ($action == "ActivarSujeto"){
            sujetoAdopcionController::CambiarEstado("Activo");
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
            $arraySujetoAdopcion['Estado'] ="Activo";
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

            $arraySujetoAdopcion['Foto'] = $NameArchivos;
            var_dump($arraySujetoAdopcion);
            $sujetoAdopcion = new SujetoAdopcion ($arraySujetoAdopcion);
            $sujetoAdopcion->insertar();
            header("Location: ../Vista/BackEnd/Adminnoxadmin-12/horizontal/index.php ?respuesta=correcto");
        } catch (Exception $e) {
            var_dump($e);
            // header("Location: ../Vista/pages/registroPaciente.php?respuesta=error");
        }
    }


    static  public function adminTableSujeto()
    {

        $arrSujetoAdopcion = SujetoAdopcion::getAll(); /*  */
        $tmpSujetoAdopcion = new SujetoAdopcion();
        $arrColumnas = [/*"IdSujetoAdopcion",*/"Genero","Anos","Meses","Nombre","Tamano","Esterilizado","Vacunas","Descripcion","Dueno","Raza","Ciudad","Alimentacion","Foto","Estado"];
        $htmlTable = "<thead>";
        $htmlTable .= "<tr>";
        foreach ($arrColumnas as $NameColumna){
            $htmlTable .= "<th>".$NameColumna."</th>";
        }
        $htmlTable .= "<th>Acciones</th>";
        $htmlTable .= "</tr>";
        $htmlTable .= "</thead>";

        $htmlTable .= "<tbody>";
        foreach ($arrSujetoAdopcion as $ObjSujetoAdopcion){
            $htmlTable .= "<tr>";
            // $htmlTable .= "<td>".$ObjSujetoAdopcion->getIdSujetoAdopcion()."</td>";
            $htmlTable .= "<td>".$ObjSujetoAdopcion->getGenero()."</td>";
            $htmlTable .= "<td>".$ObjSujetoAdopcion->getAnos()."</td>";
            $htmlTable .= "<td>".$ObjSujetoAdopcion->getMeses()."</td>";
            $htmlTable .= "<td>".$ObjSujetoAdopcion->getNombre()."</td>";
            $htmlTable .= "<td>".$ObjSujetoAdopcion->getTamano()."</td>";
            $htmlTable .= "<td>".$ObjSujetoAdopcion->getEsterilizado()."</td>";
            $htmlTable .= "<td>".$ObjSujetoAdopcion->getVacunas()."</td>";
            $htmlTable .= "<td>".$ObjSujetoAdopcion->getDescripcion()."</td>";
            $htmlTable .= "<td>".$ObjSujetoAdopcion->getDueno()."</td>";
            $htmlTable .= "<td>".$ObjSujetoAdopcion->getRaza()."</td>";
            $htmlTable .= "<td>".$ObjSujetoAdopcion->getCiudad()."</td>";
            $htmlTable .= "<td>".$ObjSujetoAdopcion->getAlimentacion()."</td>";
            $htmlTable .= "<td>".$ObjSujetoAdopcion->getFoto()."</td>";
            $htmlTable .= "<td>".$ObjSujetoAdopcion->getEstado()."</td>";

            $icons = "";
            if($ObjSujetoAdopcion->getEstado() == "Activo"){
                $icons .= "<a data-toggle='tooltip' title='Inactivar Usuario' data-placement='top' class='btn btn-social-icon btn-danger newTooltip' href='../../Controlador/sujetoAdopcionController.php?action=InactivarSujeto&IdSujetoAdopcion=".$ObjSujetoAdopcion->getIdSujetoAdopcion()."'><i class='fa fa-times'></i></a>";
            }else{
                $icons .= "<a data-toggle='tooltip' title='Activar Usuario' data-placement='top' class='btn btn-social-icon btn-success newTooltip' href='../../Controlador/sujetoAdopcionController.php?action=ActivarSujeto&IdSujetoAdopcion=".$ObjSujetoAdopcion->getIdSujetoAdopcion()."'><i class='fa fa-check'></i></a>";
            }
            $icons .= "<a data-toggle='tooltip' title='Actualizar Usuario' data-placement='top' class='btn btn-social-icon btn-primary newTooltip' href='actualizarEspecialista.php?IdEspecialista=".$ObjSujetoAdopcion->getIdSujetoAdopcion()."'><i class='fa fa-pencil'></i></a>";
            $icons .= "<a data-toggle='tooltip' title='Ver Usuario' data-placement='top' class='btn btn-social-icon btn-warning newTooltip' href='../../Controlador/especialistaController.php?action=InactivarPaciente&Especialista=".$ObjSujetoAdopcion->getIdSujetoAdopcion()."'><i class='fa fa-eye'></i></a>";
            $htmlTable .= "<td>".$icons."</td>";

            $htmlTable .= "</tr>";
        }
        $htmlTable .= "</tbody>";




        return $htmlTable;
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


    static public function CambiarEstado ($Estado){
        try {
            $IdSujetoAdopcion = $_GET["IdSujetoAdopcion"];
            $ObjSujetoAdopcion = SujetoAdopcion::buscarForId($IdSujetoAdopcion);
            $ObjSujetoAdopcion->setEstado($Estado);
            $ObjSujetoAdopcion->editar();
            header("Location: ../Vista/BackEnd/Adminnoaxadmin-12/horizontal/adminSujetos.php?respuesta=correcto");
        }catch (Exception $e){
            $txtMensaje = $e->getMessage();
            header("Location: ../Vista/BackEnd/Adminnoaxadmin-12/horizontal/adminSujetos.php?respuesta=error&Mensaje=".$txtMensaje);
        }
    }
}