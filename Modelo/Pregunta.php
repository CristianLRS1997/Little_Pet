<?php
require_once('db_abstract_class.php');
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 29/08/2017
 * Time: 7:45 PM
 */
class Pregunta extends  db_abstract_class
{
    private  $idpregunta;
    private $enunciado ;
    private $rta1;
    private $rta2;
    private $rta3;
    private $rta4;
    private $estado ;
    private $sujetoadopcion ;



    public function __construct($littlepet_data=array())
    {
        parent::__construct();
        if(count($littlepet_data)>1) {
            foreach ($littlepet_data as $campo => $valor) {
                $this->$campo = $valor;
            }
        }else{
        $this->idpregunta = "";
        $this->enunciado = "";
        $this->rta1 = "";
        $this->rta2 = "";
        $this->rta3 = "";
        $this->rta4 = "";
        $this->estado = "";
        $this->sujetoadopcion = "";
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
    public function getIdpregunta()
    {
        return $this->idpregunta;
    }

    /**
     * @param string $idpregunta
     */
    public function setIdpregunta($idpregunta)
    {
        $this->idpregunta = $idpregunta;
    }

    /**
     * @return string
     */
    public function getEnunciado()
    {
        return $this->enunciado;
    }

    /**
     * @param string $enunciado
     */
    public function setEnunciado($enunciado)
    {
        $this->enunciado = $enunciado;
    }

    /**
     * @return string
     */
    public function getRta1()
    {
        return $this->rta1;
    }

    /**
     * @param string $rta1
     */
    public function setRta1($rta1)
    {
        $this->rta1 = $rta1;
    }

    /**
     * @return string
     */
    public function getRta2()
    {
        return $this->rta2;
    }

    /**
     * @param string $rta2
     */
    public function setRta2($rta2)
    {
        $this->rta2 = $rta2;
    }

    /**
     * @return string
     */
    public function getRta3()
    {
        return $this->rta3;
    }

    /**
     * @param string $rta3
     */
    public function setRta3($rta3)
    {
        $this->rta3 = $rta3;
    }

    /**
     * @return string
     */
    public function getRta4()
    {
        return $this->rta4;
    }

    /**
     * @param string $rta4
     */
    public function setRta4($rta4)
    {
        $this->rta4 = $rta4;
    }

    /**
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param string $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
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


    public  static function buscarForId($id)
    {
        $preg = new Pregunta();

        if ($id>0){
            $getrow = $preg->getRow("SELECT * FROM  littlepet.pregunta WHERE IdPregunta =?", array($id));
            $preg -> idpregunta = $getrow['IdPregunta'];
            $preg -> enunciado = $getrow['Enunciado'];
            $preg -> rta1 = $getrow['Respuesta1'];
            $preg -> rta2 = $getrow['Respuesta2'];
            $preg -> rta3 = $getrow['Respuesta3'];
            $preg -> rta4 = $getrow['Respuesta4'];
            $preg -> estado = $getrow['Estado'];
            $preg -> sujetoadopcion = $getrow['SujetoAdopcion'];
            $preg->Disconnect();
            return $preg;

        }else {

            return NULL ;
        }

    }

    public static function buscar($query)
    {
        $arrpreg = array();
      $tmp = new Pregunta();
      $getrows = $tmp->getRows($query);

      foreach ($getrows as $valor){

          $preg = new  Pregunta();
          $preg -> idpregunta = $valor['IdPregunta'];
          $preg -> enunciado = $valor['Enunciado'];
          $preg -> rta1 = $valor['Respuesta1'];
          $preg -> rta2 = $valor['Respuesta2'];
          $preg -> rta3 = $valor['Respuesta3'];
          $preg -> rta4 = $valor['Respuesta4'];
          $preg -> estado = $valor['Estado'];
          $preg -> sujetoadopcion = $valor['SujetoAdopcion'];
          array_push($arrpreg, $preg);
      }
      $tmp->Disconnect();
      return $arrpreg;
    }

    public static function getAll()
    {
        return Pregunta::buscar("SELECT * FROM littlepet.pregunta");
    }

    public function insertar()
    {
        $this-> insertRow("INSERT INTO littlepet.pregunta VALUES ('NULL',?,?,?,?,?,?,?)",array(
            $this->enunciado,
            $this-> rta1,
            $this -> rta2,
            $this-> rta3,
            $this-> rta4,
            $this-> estado,
            $this-> sujetoadopcion

        ));
        $this->Disconnect();

    }

    public function editar()
    {
        $this-> updateRow("UPDATE littlepet.pregunta SET Enunciado = ? ,Respuesta1=? ,Respuesta2=?, Respuesta3=?,Respuesta4=?,Estado=?,SujetoAdopcion=?",array(
            $this->enunciado,
            $this-> rta1,
            $this -> rta2,
            $this-> rta3,
            $this-> rta4,
            $this-> estado,
            $this-> sujetoadopcion
        ));
        $this->Disconnect();
    } 

    public function eliminar($id)
    {
        if ($id > 0){
            return $this->deleteRow("DELETE FROM littlepet.pregunta WHERE id = ?", array($id));
        }else{
            return false;
        }
    }
}