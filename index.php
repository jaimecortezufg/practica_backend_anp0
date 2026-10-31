<?php
//HABILITANDO CORS PARA DIFERENTES DOMINIOS Y DIFERENTES TIPOS DE REQUESTs
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin,X-Request-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET,POST,OPTIONS,PUT,DELETE");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Credentials: true");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

//NECESITO UTILIZAR LA CLASE ESTUDIANTE (para heredar todas sus propiedades y métodos)
require("classes/estudiante.class.php");

$Estudiante = new Estudiante();
if($_SERVER["REQUEST_METHOD"] === "GET"){
    $tipo_peticion = ( (isset($_GET["t"]) ? (($_GET["t"]!="") ? $_GET["t"] : null)  : null ));
    switch($tipo_peticion){
        case "all":
            //DEVOLVER TODOS LOS DATOS DE LA TABLA ESTUDIANTE
            $resultado = $Estudiante->obtenerEstudiantes(); // todos
        break;
        case "unique":
            //DEVOLVER UNICAMENTE EL DATO DE ESTUDIANTE SEGÚN EL PARÁMETRO "t"
        break;
        case "new":
            //INSERTAR UN NUEVO ESTUDIANTE POR METODO GET CON PARAMETROS DE URL
        break;
        default:
            //AVISAR AL USUARIO QUE NO SE ENTIENDE QUÉ SE EJECUTARÁ
            $resultado = array("mensaje"=>"¿Qué haremos?","valores"=>"");
        break;
    }
}elseif($_SERVER["REQUEST_METHOD"] === "POST"){

}else{
    $resultado = array("mensaje"=>"¿Qué método usaremos?","valores"=>"");
}
header("Content-Type: Application/json");
echo(json_encode($resultado));
?>