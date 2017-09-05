<?php

require_once('db_abstract_class.php');
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 28/08/2017
 * Time: 6:46 PM
 */
class Comentario extends db_abstract_class
{

    private $idcomentario;
    private $descripcion;
    private $sujetoadopcion ;
    private $Respuesta ;
    private $usuario ;


    public function __construct($littlepet_data=array())
    {
        parent::__construct();
        if(count($littlepet_data)>1) {
            foreach ($littlepet_data as $campo => $valor) {
                $this->$campo = $valor;
            }
        }else{
        $this->idcomentario = "";
        $this->descripcion = "";
        $this->sujetoadopcion = "";
        $this->respuesta = "";
        $this->usuario = "";

    }

    }

    function __destruct() {
        $this->Disconnect();
        unset($this);
    }

    /**
     * @return string
     */
    public function getIdcomentario()
    {
        return $this->idcomentario;
    }

    /**
     * @param string $idcomentario
     */
    public function setIdcomentario($idcomentario)
    {
        $this->idcomentario = $idcomentario;
    }

    /**
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param string $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return string
     */
    public function getSujetoadopcion()
    {
        return $this->sujetoadopcion;
    }

    /**
     * @param string $sujetoadopcion
     */
    public function setSujetoadopcion($sujetoadopcion)
    {
        $this->sujetoadopcion = $sujetoadopcion;
    }

    /**
     * @return string
     */
    public function getRespuesta()
    {
        return $this->respuesta;
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
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param string $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }


    public static function buscarForId($id)
    {
        $coment = new Comentario();
        if ($id > 0 ){

            $getrow = $coment->getRow("SELECT * FROM  littlepet.comentario WHERE IdComentario =?", array($id));
            $coment -> idcomentario = $getrow['IdComentario'];
            $coment -> descripcion = $getrow['Descripcion'];
            $coment -> sujetoadopcion = $getrow['SujetoAdopcion_IdSujetoAdopcion'];
            $coment -> respuesta = $getrow['Respuesta'];
            $coment -> usuario = $getrow['Usuario_Interesado'];
            $coment->Disconnect();
            return $coment;
        }else{

            return NULL;
        }



    }

    public static function buscar($query)
    {
        $arrcomentario = array();
        $tmp = new Comentario();
        $getrows = $tmp->getRows($query);
        foreach ($getrows as $valor){

            $coment = new Comentario();
            $coment -> idcomentario = $valor['IdComentario'];
            $coment -> descripcion = $valor['Descripcion'];
            $coment -> sujetoadopcion = $valor['SujetoAdopcion_IdSujetoAdopcion'];
            $coment -> respuesta = $valor['Respuesta'];
            $coment -> usuario = $valor['Usuario_Interesado'];

        }
        $tmp->Disconnect();
        return $arrcomentario;
    }

    public static function getAll()
    {
        return Comentario::buscar("SELECT * FROM littlepet.Comentario");
    }

    public function insertar()
    {
        $this-> insertRow("INSERT INTO littlepet.Comentario VALUES ('NULL',?,?,?,?)",array(
            $this->descripcion,
            $this-> sujetoadopcion,
            $this -> respuesta,
            $this-> usuario

        ));
        $this->Disconnect();
    }

    public function editar()
    {
        $this-> updateRow("UPDATE littlepet.comentario SET Descripcion = ? ,SujetoAdopcion_IdSujetoAdopcion=? ,Respuesta=?, Usuario_Interesado=?",array(
            $this->descripcion,
            $this-> sujetoadopcion,
            $this -> respuesta,
            $this-> usuario

        ));
        $this->Disconnect();
    }

    public function eliminar($id)
    {
        if ($id > 0){
            return $this->deleteRow("DELETE FROM littlepet.comentario WHERE id = ?", array($id));
        }else{
            return false;
        }
    }
}