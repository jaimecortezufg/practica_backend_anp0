<?php
//echo(__DIR__);
$ruta_absoluta = dirname(__DIR__,1);
//echo($ruta_absoluta."/db/conn.class.php");
require($ruta_absoluta."/db/conn.class.php");
//require($ruta_absoluta."/inc/validaciones.inc.php");
class Estudiante{
    public $idestudiante;
    public $fechanacimiento;
    public $estadoregistroestudiante;
    public $idgenero;
    public $carnet;
    public $anioingreso;
    public $conexion;
    public $validacion;

    public function __construct(){
        $this->conexion = new DB();
        //$this->validacion = new Validaciones();
    }

    //SETTER de $this->idestudiante
    public function setIdEstudiante($idestudiante){
        $this->idestudiante = intval($idestudiante);
    }

    //GETTER de $this->idestudiante
    public function getIdEstudiante(){
        return intval($this->idestudiante);
    }

    //SETTER de $this->fechanacimiento
    public function setFechaNacimiento($fechanacimiento){
        $this->fechanacimiento = $fechanacimiento;
    }

    //GETTER de $this->fechanacimiento
    public function getFechaNacimiento(){
        return $this->fechanacimiento;
    }

    //SETTER de $this->estadoregistroestudiante
    public function setEstadoRegistroEstudiante($estadoregistroestudiante){
        $this->estadoregistroestudiante = intval($estadoregistroestudiante);
    }

    //GETTER de $this->estadoregistroestudiante
    public function getEstadoRegistroEstudiante(){
        return $this->estadoregistroestudiante;
    }

    //SETTER de $this->idgenero
    public function setIdGenero($idgenero){
        $this->idgenero = $idgenero;
    }

    //GETTER de $this->idgenero
    public function getIdGenero(){
        return $this->idgenero;
    }

    //SETTER de $this->carnet
    public function setCarnet($carnet){
        $this->carnet = $carnet;
    }

    //GETTER de $this->carnet
    public function getCarnet(){
        return $this->carnet;
    }

    //SETTER de $this->anioingreso
    public function setAnioIngreso($anioingreso){
        $this->anioingreso = intval($anioingreso);
    }

    //GETTER de $this->anioingreso
    public function getAnioIngreso(){
        return intval($anioingreso);
    }


    public function obtenerEstudiantes(){
        $resultado = $this->conexion->run('SELECT * FROM estudiante;');
        $array = array("mensaje"=>"Registros encontrados","data"=>$resultado->fetchAll());
        return $array;
    }
}
$est = new Estudiante();
$datos = $est->obtenerEstudiantes();
header("Content-type: Application/json");
echo(json_encode($datos));
?>