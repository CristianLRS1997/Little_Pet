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
    private $Anos;
    private $Meses;
    private $Nombre;
    private $Tamano;
    private $Esterilizado;
    private $Vacunas;
    private $Descripcion;
    private $Dueno;
    private $Raza;
    private $Ciudad;
    private $Alimentacion;
    private $Foto;
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
            $this->Anos = "";
            $this->Meses = "";
            $this->Nombre = "";
            $this->Tamano = "";
            $this->Esterilizado = "";
            $this->Vacunas = "";
            $this->Descripcion = "";
            $this->Dueno = "";
            $this->Raza = "";
            $this->Ciudad = "";
            $this->Alimentacion = "";
            $this->Foto = "";
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
    public function getAnos()
    {
        return $this->Anos;
    }

    /**
     * @param string $Anos
     */
    public function setAnos($Anos)
    {
        $this->Anos = $Anos;
    }

    /**
     * @return string
     */
    public function getMeses()
    {
        return $this->Meses;
    }

    /**
     * @param string $Meses
     */
    public function setMeses($Meses)
    {
        $this->Meses = $Meses;
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
    public function getFoto()
    {
        return $this->Foto;
    }

    /**
     * @param string $Foto
     */
    public function setFoto($Foto)
    {
        $this->Foto = $Foto;
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
        $Client = new SujetoAdopcion();
        if ($id  > 0){
            $getrow = $Client->getRow("SELECT * FROM littlepet.sujetoadopcion WHERE IdSujetoAdopcion =?", array($id));
            $Client->IdSujetoAdopcion = $getrow['IdSujetoAdopcion'];
            $Client->Genero = $getrow['Genero'];
            $Client->Anos = $getrow['Anos'];
            $Client->Meses = $getrow['Meses'];
            $Client->Nombre = $getrow['Nombre'];
            $Client->Tamano = $getrow['Tamano'];
            $Client->Esterilizado = $getrow['Esterilizado'];
            $Client->Vacunas = $getrow['Vacunas'];
            $Client->Descripcion = $getrow['Descripcion'];
            $Client->Dueno = $getrow['Dueno'];
            $Client->Raza = $getrow['Raza'];
            $Client->Ciudad = $getrow['Ciudad'];


            $Client->Disconnect();
            return $Client;
        }else{
            return NULL;


        }
    }

    public static function buscar($query)
    {
        $arrSujeto = array();
        $tmp = new SujetoAdopcion();
        $getRows = $tmp->getRows($query);

        foreach ($getRows as $valor){
            $sujeto = new SujetoAdopcion();
            $sujeto->IdSujetoAdopcion = $valor['IdSujetoAdopcion'];
            $sujeto->Genero = $valor['Genero'];
            $sujeto->Anos = $valor['Anos'];
            $sujeto->Meses = $valor['Meses'];
            $sujeto->Nombre = $valor['Nombre'];
            $sujeto->Tamano = $valor['Tamano'];
            $sujeto->Esterilizado = $valor['Esterilizado'];
            $sujeto->Vacunas = $valor['Vacunas'];
            $sujeto->Descripcion = $valor['Descripcion'];
            $sujeto->Dueno = $valor['Dueno'];
            $sujeto->Raza = $valor['Raza'];
            $sujeto->Ciudad = $valor['Ciudad'];
            $sujeto->Alimentacion = $valor['Alimentacion'];
            $sujeto->Foto = $valor = $valor['Foto'];
            array_push($arrSujeto, $sujeto);
        }
        $tmp->Disconnect();
        return $arrSujeto;

    }

    public static function getAll()
    {
        return SujetoAdopcion::buscar("SELECT * FROM littlepet.sujetoadopcion");
    }

    public function insertar()
    {
        $this->insertRow("INSERT INTO littlepet.sujetoadopcion (IdSujetoAdopcion, Genero, Anos,Meses, Nombre, Tamano, Esterilizado, Vacunas, Descripcion, Dueno, Raza, Ciudad, Alimentacion, Foto, Estado) VALUES ('NULL', ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array(
                $this->Genero,
                $this->Anos,
                $this->Meses,
                $this->Nombre,
                $this->Tamano,
                $this->Esterilizado,
                $this->Vacunas,
                $this->Descripcion,
                $this->Dueno,
                $this->Raza,
                $this->Ciudad,
                $this->Alimentacion,
                $this->Foto,
                $this->Estado


            )
        );
        $this->Disconnect();

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