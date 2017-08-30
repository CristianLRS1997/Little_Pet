<?php
require_once('db_abstract_class.php');
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 29/08/2017
 * Time: 9:33 PM
 */
class Respuesta extends db_abstract_class
{

        private $idrespuesta;
        private $respuesta ;
        private $pregunta ;
        private $adopcion ;


    public function __construct($littlepet_data=array())
    { parent::__construct();
        if(count($littlepet_data)>1) {
            foreach ($littlepet_data as $campo => $valor) {
                $this->$campo = $valor;
            }
        }else{
        $this->idrespuesta = "";
        $this->respuesta = "";
        $this->pregunta = "";
        $this->adopcion = "";

    }
    }
    /* Metodo destructor cierra la conexion. */
    function __destruct() {
        $this->Disconnect();
        unset($this);
    }

    /**
     * @return string
     */
    public function getIdrespuesta()
    {
        return $this->idrespuesta;
    }

    /**
     * @param string $idrespuesta
     */
    public function setIdrespuesta($idrespuesta)
    {
        $this->idrespuesta = $idrespuesta;
    }

    /**
     * @return string
     */
    public function getRespuesta()
    {
        return $this->respuesta;
    }

    /**
     * @param string $respuesta
     */
    public function setRespuesta($respuesta)
    {
        $this->respuesta = $respuesta;
    }

    /**
     * @return string
     */
    public function getPregunta()
    {
        return $this->pregunta;
    }

    /**
     * @param string $pregunta
     */
    public function setPregunta($pregunta)
    {
        $this->pregunta = $pregunta;
    }

    /**
     * @return string
     */
    public function getAdopcion()
    {
        return $this->adopcion;
    }

    /**
     * @param string $adopcion
     */
    public function setAdopcion($adopcion)
    {
        $this->adopcion = $adopcion;
    }

    public static function buscarForId($id)
    {
        $resp = new Respuesta();

        if ($id >0 ){
            $getrow = $resp->getRow("SELECT * FROM  littlepet.respuesta WHERE respuesta =?", array($id));
            $resp -> idrespuesta = $getrow['IdRespuesta'];
            $resp -> respuesta = $getrow['Respuesta'];
            $resp -> pregunta = $getrow['Pregunta_IdPregunta'];
            $resp -> adopcion = $getrow['Adopcion_IdAdopcion'];

            $resp->Disconnect();
            return $resp;

        }else{

            return NULL;
        }
    }

    public static function buscar($query)
    {
        $arrresp = array();
        $tmp = new Respuesta();
        $getrows = $tmp->getRows($query);
        foreach ( $getrows as $valor) {
            $resp = new Respuesta();
            $resp -> idrespuesta = $valor['IdRespuesta'];
            $resp -> respuesta = $valor['Respuesta'];
            $resp -> pregunta = $valor['Pregunta_IdPregunta'];
            $resp -> adopcion = $valor['Adopcion_IdAdopcion'];
            array_push($arrresp, $resp);
        }
        $tmp->Disconnect();
        return $arrresp;
    }

    public static function getAll()
    {
       return Respuesta::buscar("SELECT * FROM littlepet.respuesta");
    }

    public function insertar()
    {
        $this-> insertRow("INSERT INTO littlepet.respuesta VALUES ('NULL',?,?,?)",array(
            $this->respuesta,
            $this-> pregunta,
            $this -> adopcion,


        ));
        $this->Disconnect();


    }

    public function editar()
    {
        $this-> updateRow("UPDATE littlepet.respuesta SET Respuesta = ? ,Pregunta_IdPregunta=? ,Adopcion_IdAdopcion=?",array(
            $this->respuesta,
            $this-> pregunta,
            $this -> adopcion,
        ));
        $this->Disconnect();

    }

    public function eliminar($id)
    {

        if ($id > 0){
            return $this->deleteRow("DELETE FROM littlepet.respuesta WHERE id = ?", array($id));
        }else{
            return false;
        }

    }
}