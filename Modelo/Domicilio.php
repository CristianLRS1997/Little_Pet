<?php

require_once ('db_abstract_class.php');

/**
 * Created by PhpStorm.
 * User: Pcjennyfer
 * Date: 28/08/2017
 * Time: 7:33
 */
class Domicilio extends db_abstract_class
{
private $IdDommujnicilio;
private $Tipo_Domicilio;
private $Barrio;
private $Direccion;
private $Estrato;
private $Estado;
private $Uuario_IdUsuario;
private $Ciudad_IdCiudad;

    public function __construct($Domicilio_data=array())
    {
        parent::__construct();
        if (count($Domicilio_data)>1) {
            foreach ($Domicilio_data as $campo => $valor) {
                $this->$campo = $valor;

            }
        }else{
            $this->IdDomicilio ="" ;
            $this->Tipo_Domicilio = "";
            $this->Barrio = "";
            $this->Direccion = "";
            $this->Estrato = "";
            $this->Estado ="";
            $this->Uuario_IdUsuario ="" ;
            $this->Ciudad_IdCiudad ="";
        }
    }


    /**
     * @return mixed
     */
    public function getIdDomicilio()
    {
        return $this->IdDomicilio;
    }

    /**
     * @param mixed $IdDomicilio
     */
    public function setIdDomicilio($IdDomicilio)
    {
        $this->IdDomicilio = $IdDomicilio;
    }

    /**
     * @return mixed
     */
    public function getTipoDomicilio()
    {
        return $this->Tipo_Domicilio;
    }

    /**
     * @param mixed $Tipo_Domicilio
     */
    public function setTipoDomicilio($Tipo_Domicilio)
    {
        $this->Tipo_Domicilio = $Tipo_Domicilio;
    }

    /**
     * @return mixed
     */
    public function getBarrio()
    {
        return $this->Barrio;
    }

    /**
     * @param mixed $Barrio
     */
    public function setBarrio($Barrio)
    {
        $this->Barrio = $Barrio;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->Direccion;
    }

    /**
     * @param mixed $Direccion
     */
    public function setDireccion($Direccion)
    {
        $this->Direccion = $Direccion;
    }

    /**
     * @return mixed
     */
    public function getEstrato()
    {
        return $this->Estrato;
    }

    /**
     * @param mixed $Estrato
     */
    public function setEstrato($Estrato)
    {
        $this->Estrato = $Estrato;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->Estado;
    }

    /**
     * @param mixed $Estado
     */
    public function setEstado($Estado)
    {
        $this->Estado = $Estado;
    }

    /**
     * @return mixed
     */
    public function getUuarioIdUsuario()
    {
        return $this->Uuario_IdUsuario;
    }

    /**
     * @param mixed $Uuario_IdUsuario
     */
    public function setUuarioIdUsuario($Uuario_IdUsuario)
    {
        $this->Uuario_IdUsuario = $Uuario_IdUsuario;
    }

    /**
     * @return mixed
     */
    public function getCiudadIdCiudad()
    {
        return $this->Ciudad_IdCiudad;
    }

    /**
     * @param mixed $Ciudad_IdCiudad
     */
    public function setCiudadIdCiudad($Ciudad_IdCiudad)
    {
        $this->Ciudad_IdCiudad = $Ciudad_IdCiudad;
    }


    protected static function buscarForId($id)
    {
        // TODO: Implement buscarForId() method.
    }

    protected static function buscar($query)
    {
        // TODO: Implement buscar() method.
    }

    protected static function getAll()
    {
        // TODO: Implement getAll() method.
    }

    protected function insertar()
    {
        // TODO: Implement insertar() method.
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