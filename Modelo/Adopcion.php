<?php

/**
 * Created by PhpStorm.
 * User: acer
 * Date: 30/08/2017
 * Time: 16:27
 */

require_once ('db_abstract_class.php');

class Adopcion extends db_abstract_class
{

    private $IdAdopcion;
    private $Estado;
    private $Padrino;
    private $SujetoAdopcion;


    public function __construct($littlepet_data=array())
    {
        parent::__construct();
        if(count($littlepet_data)>1) {
            foreach ($littlepet_data as $campo => $valor) {
                $this->$campo = $valor;
            }
        }else {
            $this->IdAdopcion = "";
            $this->Estado = "";
            $this->Padrino = "";
            $this->SujetoAdopcion = "";
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
    public function getIdAdopcion()
    {
        return $this->IdAdopcion;
    }

    /**
     * @param string $IdAdopcion
     */
    public function setIdAdopcion($IdAdopcion)
    {
        $this->IdAdopcion = $IdAdopcion;
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
    public function getPadrino()
    {
        return $this->Padrino;
    }

    /**
     * @param string $Padrino
     */
    public function setPadrino($Padrino)
    {
        $this->Padrino = $Padrino;
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
        $ado = new Adopcion();
        if ($id >0 ){
            $getrow = $ado->getRow("SELECT * FROM  littlepet.adopcion WHERE IdAdopcion =?", array($id));
            $ado -> IdAdopcion = $getrow['IdAdopcion'];
            $ado -> Estado =$getrow['Estado'];
            $ado -> Padrino = $getrow['Padrino'];
            $ado -> SujetoAdopcion = $getrow['SujetoAdopcion'];

            $ado->Disconnect();
            return $ado
                ;

        }else{

            return NULL;
        }
    }

    public static function buscar($query)
    {
        $arrresp = array();
        $tmp = new Adopcion();
        $getrows = $tmp->getRows($query);
        foreach ( $getrows as $valor) {
            $resp = new Adopcion();
            $resp -> IdAdopcion= $valor['IdAdopcion'];
            $resp -> Estado = $valor['Estado'];
            $resp -> Padrino = $valor['Padrino'];
            $resp -> SujetoAdopcion = $valor['SujetoAdopcion'];
            array_push($arrresp, $resp);
        }
        $tmp->Disconnect();
        return $arrresp;
    }

    public static function getAll()
    {
        return Adopcion::buscar("SELECT * FROM littlepet.adopcion");
    }

    public function insertar()
    {

        $this->insertRow("INSERT INTO littlepet.Adopcion VALUES (NULL , ? , ?, ?)", array(

            $this->Estado,
            $this->Padrino,
            $this->SujetoAdopcion
            )
        );

        $this->Disconnect();
    }

    protected function editar()
    {
        // TODO: Implement editar() method.
    }

    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }
}