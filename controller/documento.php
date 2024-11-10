<?php

    /* TODO: Incluye el archivo de configuración de la conexión a la base de datos y la clase Usuario */
    require_once("../config/conexion.php");
    require_once("../models/Documento.php");
    require_once("../models/Email.php");

    /* TODO:Crea una instancia de la clase Usuario */
    $documento = new Documento();
    $email = new Email();

    /* TODO: Utiliza una estructura switch para determinar la operación a realizar según el valor de $_GET["op"] */
    switch($_GET["op"]){

        /* TODO: Si la operación es "registrar" */
        case "registrar":
            /* TODO: Llama al método registrar_usuario de la instancia $usuario con los datos del formulario */
            $datos = $documento->registrar_documento(
                $_POST["area_id"],
                $_POST["tra_id"],
                $_POST["doc_externo"],
                $_POST["tip_id"],
                $_POST["doc_dni"],
                $_POST["doc_nom"],
                $_POST["doc_descrip"],
                $_SESSION["usu_id"],
            );    
        if(is_array($datos) == true and count($datos) == 0){
            echo json_encode($datos);
        }else{
            echo "0";
        }
        break;
}

?>