<?php
require_once('db_abstract_class.php');
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 04/09/2017
 * Time: 8:04 PM
 */
class Ciudad extends db_abstract_class
{

    private $IdCiudad;
    private $Nombre;
    private $Estado;
    private $Departamento_IdDepartamento;


    public function __construct($littlepet_data=array())
    {
        parent::__construct();
        if(count($littlepet_data)>1) {
            foreach ($littlepet_data as $campo => $valor) {
                $this->$campo = $valor;
            }
        }else{
        $this->IdCiudad = "";
        $this->Nombre = "";
        $this->Estado = "";
        $this->Departamento_IdDepartamento = "";
    }}

    /* Metodo destructor cierra la conexion. */
    function __destruct() {
        $this->Disconnect();
        unset($this);
    }

    /**
     * @return string
     */
    public function getIdCiudad()
    {
        return $this->IdCiudad;
    }

    /**
     * @param string $IdCiudad
     */
    public function setIdCiudad($IdCiudad)
    {
        $this->IdCiudad = $IdCiudad;
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
    public function getDepartamentoIdDepartamento()
    {
        return $this->Departamento_IdDepartamento;
    }

    /**
     * @param string $Departamento_IdDepartamento
     */
    public function setDepartamentoIdDepartamento($Departamento_IdDepartamento)
    {
        $this->Departamento_IdDepartamento = $Departamento_IdDepartamento;
    }

    protected static function buscarForId($id)
    {
        // TODO: Implement buscarForId() method.
    }

    protected static function buscar($query)
    {
       $arrci = array();
       $tmp = new Ciudad();
        $getrows = $tmp ->getRows($query);
        foreach ($getrows as $valor){
            $ciu = new Ciudad();
            $ciu->IdCiudad= $valor['IdDepartamento'];
            $ciu->Nombre= $valor['Nombre'];
            $ciu->Estado= $valor['Estado'];
            $ciu->Departamento_IdDepartamento= $valor['Departamento_IdDepartamento'];
            array_push($arrci, $ciu);

        }
        $tmp->Disconnect();
        return $arrci;

    }

    protected static function getAll()
    {
      return Ciudad::buscar("SELECT * FROM littlepet.ciudad");
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