<?phprequire_once ('db_abstract_class.php');/** * Created by PhpStorm. * User: Pcjennyfer * Date: 28/08/2017 * Time: 4:57 */class Usuario extends db_abstract_class{private $IdUsuario;private $Nombres;private $Apellidos;private $Email;private $Celular;private $Contrasena;private $Estado;private $Fecha_Nacimiento;private $Foto;    public function __construct($Usuario_data=array())    {        parent::__construct();        if (count($Usuario_data)>1){            foreach ($Usuario_data as $campo => $valor){                $this ->$campo = $valor;            }        }else{            $this->IdUsuario = "" ;            $this->Nombres = "";            $this->Apellidos ="" ;            $this->Email = "";            $this->Celular = "";            $this->Contrasena = "";            $this->Estado = "";            $this->Fecha_Nacimiento = "";            $this->Foto = "";        }    }    /**     * @return mixed     */    public function getIdUsuario()    {        return $this->IdUsuario;    }    /**     * @param mixed $IdUsuario     */    public function setIdUsuario($IdUsuario)    {        $this->IdUsuario = $IdUsuario;    }    /**     * @return mixed     */    public function getNombres()    {        return $this->Nombres;    }    /**     * @param mixed $Nombres     */    public function setNombres($Nombres)    {        $this->Nombres = $Nombres;    }    /**     * @return mixed     */    public function getApellidos()    {        return $this->Apellidos;    }    /**     * @param mixed $Apellidos     */    public function setApellidos($Apellidos)    {        $this->Apellidos = $Apellidos;    }    /**     * @return mixed     */    public function getEmail()    {        return $this->Email;    }    /**     * @param mixed $Email     */    public function setEmail($Email)    {        $this->Email = $Email;    }    /**     * @return mixed     */    public function getCelular()    {        return $this->Celular;    }    /**     * @param mixed $Celular     */    public function setCelular($Celular)    {        $this->Celular = $Celular;    }    /**     * @return mixed     */    public function getContrasena()    {        return $this->Contrasena;    }    /**     * @param mixed $Contrasena     */    public function setContrasena($Contrasena)    {        $this->Contrasena = $Contrasena;    }    /**     * @return mixed     */    public function getEstado()    {        return $this->Estado;    }    /**     * @param mixed $Estado     */    public function setEstado($Estado)    {        $this->Estado = $Estado;    }    /**     * @return mixed     */    public function getFechaNacimiento()    {        return $this->Fecha_Nacimiento;    }    /**     * @param mixed $Fecha_Nacimiento     */    public function setFechaNacimiento($Fecha_Nacimiento)    {        $this->Fecha_Nacimiento = $Fecha_Nacimiento;    }    /**     * @return mixed     */    public function getFoto()    {        return $this->Foto;    }    /**     * @param mixed $Foto     */    public function setFoto($Foto)    {        $this->Foto = $Foto;    }    public static function buscarForId($id)    {        $preg = new Usuario();        if ($id>0){            $getrow = $preg->getRow("SELECT * FROM  littlepet.usuario WHERE IdUsuario =?", array($id));            $preg -> IdUsuario  = $getrow['IdUsuario'];            $preg -> Nombres = $getrow['Nombres'];            $preg -> Apellidos = $getrow['Apellidos'];            $preg -> Email = $getrow['Email'];            $preg -> Celular = $getrow['Celular'];            $preg -> Contrasena = $getrow['Contrasena'];            $preg -> Fecha_Nacimiento = $getrow['Fecha_Nacimiento'];            $preg -> Foto = $getrow['Foto'];            $preg->Disconnect();            return $preg;        }else {            return NULL ;        }    }    public static function buscar($query)    {        $arrpreg = array();        $tmp = new Usuario();        $getrows = $tmp->getRows($query);        foreach ($getrows as $valor){            $preg = new Usuario();            $preg -> IdUsuario  = $valor['IdUsuario'];            $preg -> Nombres = $valor['Nombres'];            $preg -> Apellidos = $valor['Apellidos'];            $preg -> Email = $valor['Email'];            $preg -> Celular = $valor['Celular'];            $preg -> Contrasena = $valor['Contrasena'];            $preg -> Fecha_Nacimiento = $valor['Fecha_Nacimiento'];            $preg -> Foto = $valor['Foto '];            array_push($arrpreg, $preg);        }        $tmp->Disconnect();        return $arrpreg;    }    public static function getAll()    {        return Usuario::buscar("SELECT * FROM littlepet.usuario");    }    public function insertar()    {        $this->insertRow("INSERT INTO littlepet.Usuario (IdUsuario,Nombres,Apellidos,Email,Contrasena,Estado,Foto)  VALUES (NULL, ?, ?, ?, ?, ?, ?)", array(                $this->Nombres,                $this->Apellidos ,                $this->Email ,                $this->Contrasena,                $this->Estado,                $this->Foto,            )        );        $this->Disconnect();    }    public function editar()    {        $arrUser = (array) $this;        $this->updateRow("UPDATE littlepet.Usuario SET Nombres = ?, Apellidos = ?, Email = ?,Celular= ?, Contrasena = ?, Estado = ?, Fecha_Nacimiento = ?, Foto = ? WHERE IdUsuario = ?", array(            $this->Nombres,            $this->Apellidos,            $this->Email,            $this->Celular,            $this->Contrasena,            $this->Estado,            $this->Fecha_Nacimiento,            $this->Foto,            $this->IdUsuario        ));        $this->Disconnect();    }    public function eliminar($id)    {        // TODO: Implement eliminar() method.    }    public static function Login($Email, $Contrasena){        $arrUsuarios = array();        $tmp = new Usuario();        $getTempUser = $tmp->getRows("SELECT * FROM Usuario WHERE Email = '$Email'");        if(count($getTempUser) >= 1){            $getrows = $tmp->getRows("SELECT * FROM Usuario WHERE Email = '$Email' AND Contrasena = '$Contrasena'");            if(count($getrows) >= 1){                foreach ($getrows as $valor) {                    return $valor;                }            }else{                return "Contraseña Incorrecta";            }        }else{            return "No existe el usuario";        }        $tmp->Disconnect();        return $arrUsuarios;    }}