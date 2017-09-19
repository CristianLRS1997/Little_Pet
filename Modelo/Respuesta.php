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

        private $IdRespuesta;
    private $Enunciado ;

    private $Respuesta ;

        private $Adopcion_IdAdopcion ;



    public function __construct($littlepet_data=array())
    { parent::__construct();
        if(count($littlepet_data)>1) {
            foreach ($littlepet_data as $campo => $valor) {
                $this->$campo = $valor;
            }
        }else{
        $this->IdRespuesta = "";
            $this->Enunciado = "";
        $this->Respuesta = "";
        $this->Adopcion_IdAdopcion = "";

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
        return $this->IdRespuesta;
    }

    /**
     * @param string $IdRespuesta
     */
    public function setIdrespuesta($IdRespuesta)
    {
        $this->idrespuesta = $IdRespuesta;
    }
    /**
     * @return string
     */
    public function getEnunciado()
    {
        return $this->Enunciado;
    }

    /**
     * @param string $Enunciado
     */
    public function setEnunciado($Enunciado)
    {
        $this->Enunciado = $Enunciado;
    }


    /**
     * @return string
     */
    public function getRespuesta()
    {
        return $this->Respuesta;
    }

    /**
     * @param string $Respuesta
     */
    public function setRespuesta($Respuesta)
    {
        $this->respuesta = $Respuesta;
    }

    /**
     * @return string
     */

    /**
     * @return string
     */
    public function getAdopcion()
    {
        return $this->Adopcion_IdAdopcion;
    }

    /**
     * @param string $adopcion
     */
    public function setAdopcion($Adopcion_IdAdopcion)
    {
        $this->adopcion = $Adopcion_IdAdopcion;
    }

    public static function buscarForId($id)
    {
        $resp = new Respuesta();

        if ($id >0 ){
            $getrow = $resp->getRow("SELECT * FROM  littlepet.respuesta WHERE Respuesta =?", array($id));
            $resp -> idrespuesta = $getrow['IdRespuesta'];
            $resp -> Enunciado =$getrow['Enunciado'];
            $resp -> Respuesta = $getrow['Respuesta'];
            $resp -> Adopcion_IdAdopcion = $getrow['Adopcion_IdAdopcion'];

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
            $resp -> IdRespuesta= $valor['IdRespuesta'];
            $resp -> Enunciado =$valor['Enunciado'];
            $resp -> Respuesta = $valor['Respuesta'];
            $resp -> Adopcion_IdAdopcion = $valor['Adopcion_IdAdopcion'];
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
        $this-> insertRow("INSERT INTO littlepet.respuesta (Enunciado,Respuesta,Adopcion_IdAdopcion)VALUES (?,?,?)",array(
           $this -> Enunciado,
            $this->Respuesta,
            $this -> Adopcion_IdAdopcion,


        ));
        $this->Disconnect();


    }

    public function editar()
    {
        $this-> updateRow("UPDATE  littlepet.respuesta SET Enunciado=?, Respuesta = ?  ,Adopcion_IdAdopcion=?",array(
            $this->Enunciado,
            $this->Respuesta,
            $this -> Adopcion_IdAdopcion,
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