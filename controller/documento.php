<?php

/* TODO: Incluye el archivo de configuración de la conexión a la base de datos y la clase Usuario */
require_once("../config/conexion.php");
require_once("../models/Documento.php");
require_once("../models/Email.php");

/* TODO:Crea una instancia de la clase Usuario */
$documento = new Documento();
$email = new Email();


switch($_GET["op"]){

    case "registrar":
        /* TODO: Llama al método registrar_usuario de la instancia $usuario con los datos del formulario */
        $datos = $documento->registrar_documento(
        $_POST["area_id"],
        $_POST["tra_id"],
        $_POST["doc_externo"],
        $_POST["tipo_id"],
        $_POST["doc_dni"],
        $_POST["doc_nom"],
        $_POST["doc_descrip"],
        $_SESSION["usu_id"],
        );

        echo json_encode($datos);
        /* if(is_array($datos) == true and count($datos) == 0){
            echo $datos[0]["doc_id"];
            echo "1";
        }else{
            echo "0";
        }
        break; */
}
