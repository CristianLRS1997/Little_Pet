<?php

/**
 * Created by PhpStorm.
 * User: acer
 * Date: 31/08/2017
 * Time: 10:04
 */

require_once ('db_abstract_class.php');

class SujetoAdopcion extends db_abstract_class
{

    private $IdSujetoAdopcion;
    private $Genero;
    private $Edad;
    private $Nombre;
    private $Tamano;
    private $Esterilizado;
    private $Vacunas;
    private $Descripcion;
    private $Dueno;
    private $Raza;
    private $Ciudad;
    private $Alimentacion;
    private $Estado;


    public function __construct($littlepet_data=array())
    {
        parent::__construct();
        if(count($littlepet_data)>1){
            foreach ($littlepet_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->IdSujetoAdopcion = "";
            $this->Genero = "";
            $this->Edad = "";
            $this->Nombre = "";
            $this->Tamano = "";
            $this->Esterilizado = "";
            $this->Vacunas = "";
            $this->Descripcion = "";
            $this->Dueno = "";
            $this->Raza = "";
            $this->Ciudad = "";
            $this->Alimentacion = "";
            $this->Estado = "";
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
    public function getIdSujetoAdopcion()
    {
        return $this->IdSujetoAdopcion;
    }

    /**
     * @param string $IdSujetoAdopcion
     */
    public function setIdSujetoAdopcion($IdSujetoAdopcion)
    {
        $this->IdSujetoAdopcion = $IdSujetoAdopcion;
    }

    /**
     * @return string
     */
    public function getGenero()
    {
        return $this->Genero;
    }

    /**
     * @param string $Genero
     */
    public function setGenero($Genero)
    {
        $this->Genero = $Genero;
    }

    /**
     * @return string
     */
    public function getEdad()
    {
        return $this->Edad;
    }

    /**
     * @param string $Edad
     */
    public function setEdad($Edad)
    {
        $this->Edad = $Edad;
    }

    /**
     * @return string
     */
    public function getNombre()
    {
        return $this->Nombre;
    }

    /**
     * @param string $Nombre
     */
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
    }

    /**
     * @return string
     */
    public function getTamano()
    {
        return $this->Tamano;
    }

    /**
     * @param string $Tamano
     */
    public function setTamano($Tamano)
    {
        $this->Tamano = $Tamano;
    }

    /**
     * @return string
     */
    public function getEsterilizado()
    {
        return $this->Esterilizado;
    }

    /**
     * @param string $Esterilizado
     */
    public function setEsterilizado($Esterilizado)
    {
        $this->Esterilizado = $Esterilizado;
    }

    /**
     * @return string
     */
    public function getVacunas()
    {
        return $this->Vacunas;
    }

    /**
     * @param string $Vacunas
     */
    public function setVacunas($Vacunas)
    {
        $this->Vacunas = $Vacunas;
    }

    /**
     * @return string
     */
    public function getDescripcion()
    {
        return $this->Descripcion;
    }

    /**
     * @param string $Descripcion
     */
    public function setDescripcion($Descripcion)
    {
        $this->Descripcion = $Descripcion;
    }

    /**
     * @return string
     */
    public function getDueno()
    {
        return $this->Dueno;
    }

    /**
     * @param string $Dueno
     */
    public function setDueno($Dueno)
    {
        $this->Dueno = $Dueno;
    }

    /**
     * @return string
     */
    public function getRaza()
    {
        return $this->Raza;
    }

    /**
     * @param string $Raza
     */
    public function setRaza($Raza)
    {
        $this->Raza = $Raza;
    }

    /**
     * @return string
     */
    public function getCiudad()
    {
        return $this->Ciudad;
    }

    /**
     * @param string $Ciudad
     */
    public function setCiudad($Ciudad)
    {
        $this->Ciudad = $Ciudad;
    }

    /**
     * @return string
     */
    public function getAlimentacion()
    {
        return $this->Alimentacion;
    }

    /**
     * @param string $Alimentacion
     */
    public function setAlimentacion($Alimentacion)
    {
        $this->Alimentacion = $Alimentacion;
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



    public static function buscarForId($id)
    {
        // TODO: Implement buscarForId() method.
    }

    public static function buscar($query)
    {
        // TODO: Implement buscar() method.
    }

    public static function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function insertar()
    {
        // TODO: Implement insertar() method.
    }

    public function editar()
    {
        // TODO: Implement editar() method.
    }

    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }
}