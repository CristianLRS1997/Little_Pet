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
    private  $IdPregunta;
    private $Enunciado ;
    private $Respuesta1;
    private $Respuesta2;
    private $Respuesta3;
    private $Respuesta4;
    private $Estado ;
    private $SujetoAdopcion ;



    public function __construct($littlepet_data=array())
    {
        parent::__construct();
        if(count($littlepet_data)>1) {
            foreach ($littlepet_data as $campo => $valor) {
                $this->$campo = $valor;
            }
        }else{
        $this->IdPregunta = "";
        $this->Enunciado = "";
        $this->Respuesta1 = "";
        $this->Respuesta2 = "";
        $this->Respuesta3 = "";
        $this->Respuesta4 = "";
        $this->Estado = "";
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
    public function getIdpregunta()
    {
        return $this->IdPregunta;
    }

    /**
     * @param string $idpregunta
     */
    public function setIdpregunta($idpregunta)
    {
        $this->IdPregunta = IdPregunta;
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
    public function getRespuesta1()
    {
        return $this->Respuesta1;
    }

    /**
     * @param string $Respuesta1
     */
    public function setRespuesta1($Respuesta1)
    {
        $this->Respuesta1 = $Respuesta1;
    }

    /**
     * @return string
     */
    public function getRespuesta2()
    {
        return $this->Respuesta2;
    }

    /**
     * @param string $Respuesta2
     */
    public function setRespuesta2($Respuesta2)
    {
        $this->Respuesta2 = $Respuesta2;
    }

    /**
     * @return string
     */
    public function getRespuesta3()
    {
        return $this->Respuesta3;
    }

    /**
     * @param string $Respuesta3
     */
    public function setRespuesta3($Respuesta3)
    {
        $this->Respuesta3 = $Respuesta3;
    }

    /**
     * @return string
     */
    public function getRespuesta4()
    {
        return $this->Respuesta4;
    }

    /**
     * @param string $Respuesta4
     */
    public function setRespuesta4($Respuesta4)
    {
        $this->Respuesta4 = $Respuesta4;
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


    public  static function buscarForId($id)
    {
        $preg = new Pregunta();

        if ($id>0){
            $getrow = $preg->getRow("SELECT * FROM  littlepet.pregunta WHERE IdPregunta =?", array($id));
            $preg -> IdPregunta = $getrow['IdPregunta'];
            $preg -> Enunciado = $getrow['Enunciado'];
            $preg -> Respuesta1 = $getrow['Respuesta1'];
            $preg -> Respuesta2 = $getrow['Respuesta2'];
            $preg -> Respuesta3 = $getrow['Respuesta3'];
            $preg -> Respuesta4 = $getrow['Respuesta4'];
            $preg -> Estado = $getrow['Estado'];
            $preg -> SujetoAdopcion = $getrow['SujetoAdopcion'];
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
          $preg -> IdPregunta = $valor['IdPregunta'];
          $preg -> Enunciado = $valor['Enunciado'];
          $preg -> Respuesta1 = $valor['Respuesta1'];
          $preg -> Respuesta2 = $valor['Respuesta2'];
          $preg -> Respuesta3 = $valor['Respuesta3'];
          $preg -> Respuesta4 = $valor['Respuesta4'];
          $preg -> Estado = $valor['Estado'];
          $preg -> SujetoAdopcion = $valor['SujetoAdopcion'];
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
        $this-> insertRow("INSERT INTO littlepet.pregunta (IdPregunta,Enunciado,Respuesta1,Respuesta2,Respuesta3,Respuesta4,Estado,SujetoAdopcion) VALUES ('NULL',?,?,?,?,?,?,?)",array(
            $this->Enunciado,
            $this-> Respuesta1,
            $this -> Respuesta2,
            $this-> Respuesta3,
            $this-> Respuesta4,
            $this-> Estado,
            $this-> SujetoAdopcion,

        ));
        $this->Disconnect();

    }

    public function editar()
    {
        $this-> updateRow("UPDATE littlepet.pregunta SET Enunciado = ? ,Respuesta1=? ,Respuesta2=?, Respuesta3=?,Respuesta4=?,Estado=?,SujetoAdopcion=?",array(
            $this->Enunciado,
            $this-> Respuesta1,
            $this -> Respuesta2,
            $this-> Respuesta3,
            $this-> Respuesta4,
            $this-> Estado,
            $this-> SujetoAdopcion
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