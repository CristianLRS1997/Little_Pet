<?php
require_once('db_abstract_class.php');

/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 04/09/2017
 * Time: 7:48 PM
 */
class Departamento extends db_abstract_class
{

    private $IdDepartamento;
    private $Nombre ;
    private $Estado;

    public function __construct($littlepet_data=array())
    {
        parent::__construct();
        if(count($littlepet_data)>1) {
            foreach ($littlepet_data as $campo => $valor) {
                $this->$campo = $valor;
            }
        }else{
        $this->IdDepartamento = "";
        $this->Nombre = "";
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
    public function getIdDepartamento()
    {
        return $this->IdDepartamento;
    }

    /**
     * @param string $IdDepartamento
     */
    public function setIdDepartamento($IdDepartamento)
    {
        $this->IdDepartamento = $IdDepartamento;
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

    protected static function buscarForId($id)
    {
        // TODO: Implement buscarForId() method.
    }

    protected static function buscar($query)
    {
        $arrdep = array();
        $tmp = new Departamento();
        $getrows = $tmp ->getRows($query);
        foreach ($getrows as $valor){
            $dep = new Departamento();
            $dep->IdDepartamento= $valor['IdDepartamento'];
            $dep->Nombre= $valor['Nombre'];
            $dep->Estado= $valor['Estado'];
            array_push($arrdep, $dep);

        }
        $tmp->Disconnect();
        return $arrdep;


    }

    protected static function getAll()
    {
        return Departamento::buscar("SELECT * FROM littlepet.departamento");
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