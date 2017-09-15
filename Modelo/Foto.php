<?php

require_once ('db_abstract_class.php');

/**
 * Created by PhpStorm.
 * User: User
 * Date: 14/09/2017
 * Time: 21:45
 */
class Foto extends db_abstract_class
{
    private $IdFoto;
    private $RutaFoto;
    private $Estado;
    private $SujetoAdopcion;

    public function __construct($Foto_data=array())
    {
        parent::__construct();
        if (count($Foto_data)>1) {
            foreach ($Foto_data as $campo => $valor) {
                $this->$campo = $valor;

            }
        }else{
            $this->IdFoto ="" ;
            $this->RutaFoto = "";
            $this->Estado = "";
            $this->SujetoAdopcion ="";
        }
    }

    /**
     * @return string
     */
    public function getIdFoto()
    {
        return $this->IdFoto;
    }

    /**
     * @param string $IdFoto
     */
    public function setIdFoto($IdFoto)
    {
        $this->IdFoto = $IdFoto;
    }

    /**
     * @return string
     */
    public function getRutaFoto()
    {
        return $this->RutaFoto;
    }

    /**
     * @param string $RutaFoto
     */
    public function setRutaFoto($RutaFoto)
    {
        $this->RutaFoto = $RutaFoto;
    }

    /**
     * @return string
     */
    public function getEstado()
    {
        return $this->Estado;
    }

    /**
     * @param string $Estado
     */
    public function setEstado($Estado)
    {
        $this->Estado = $Estado;
    }

    /**
     * @return string
     */
    public function getSujetoAdopcion()
    {
        return $this->SujetoAdopcion;
    }

    /**
     * @param string $SujetoAdopcion
     */
    public function setSujetoAdopcion($SujetoAdopcion)
    {
        $this->SujetoAdopcion = $SujetoAdopcion;
    }

    public static function buscarForId($id)
    {
        $Client = new Foto();
        if ($id  > 0){
            $getrow = $Client->getRow("SELECT * FROM littlepet.foto WHERE IdFoto =?", array($id));
            $Client->IdFoto = $getrow['IdFoto'];
            $Client->RutaFoto = $getrow['RutaFoto'];
            $Client->Estado = $getrow['Estado'];
            $Client->SujetoAdopcion = $getrow['SujetoAdopcion'];


            $Client->Disconnect();
            return $Client;
        }else{
            return NULL;


        }
    }

    public static function buscar($query)
    {
        $arrFoto = array();
        $tmp = new Foto();
        $getRows = $tmp->getRows($query);

        foreach ($getRows as $valor){
            $Foto = new Foto();
            $Foto->IdFoto = $valor['IdFoto'];
            $Foto->RutaFoto = $valor['RutaFoto'];
            $Foto->Estado = $valor['Estado'];
            $Foto->SujetoAdopcion = $valor['SujetoAdopcion'];

            array_push($arrFoto, $Foto);
        }
        $tmp->Disconnect();
        return $arrFoto;
    }

    public static function getAll()
    {
        return Foto::buscar("SELECT * FROM littlepet.foto");
    }

    public function insertar()
    {
        $this->insertRow("INSERT INTO littlepet.foto VALUES ('NULL', ?, ?, ?)", array(
                $this->RutaFoto,
                $this->Estado,
                $this->SujetoAdopcion

            )
        );
        $this->Disconnect();
    }

    public function editar()
    {
        $arrUser = (array) $this;
        $this->updateRow("UPDATE littlepet.foto SET RutaFoto = ?, Estado = ?, SujetoAdopcion_IdSujetoAdopcion = ? WHERE IdFoto = ?", array(
            $this->RutaFoto,
            $this->Estado,
            $this->SujetoAdopcion
        ));
        $this->Disconnect();
    }

    public function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }
}