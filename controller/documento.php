<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Resto del código para registrar el trámite
require_once("../config/conexion.php");
require_once("../models/Documento.php");
require_once("../models/Email.php");

$documento = new Documento();
$email = new Email();

if (isset($_GET["op"])) {
    switch ($_GET["op"]) {
        case "registrar":
            $datos = $documento->registrar_documento(
                $_POST["area_id"],
                $_POST["tra_id"],
                $_POST["doc_externo"],
                $_POST["tip_id"],
                $_POST["doc_dni"],
                $_POST["doc_nom"],
                $_POST["doc_descrip"],
                $_SESSION["usu_id"]
            );

            if(is_array($datos) == true and count($datos) == 0){
                echo "0";
            }else{

                $mes = date("m");
                $anio = date("Y");

                echo $mes."-".$anio."-".$datos[0]["doc_id"];

                if (empty($_FILES['file']['name'])){

                }else{
                    $countfiles = count($_FILES['file']['name']);
                    $ruta = "../assets/document/".$datos[0]["doc_id"]."/";
                    $file_arr = array();
                    if(!file_exists($ruta)){
                        mkdir($ruta,0777,true);
                    }
                    // Guarda cada archivo en la carpeta especificada
                    for ($index = 0; $index < $countfiles; $index++) {
                        $nombreTemporal = $_FILES['file']['tmp_name'][$index];
                        $destino = $ruta . $_FILES['file']['name'][$index];

                        // Guarda el nombre en la base de datos y mueve el archivo a la carpeta
                        $documento->insert_documento_detalle($doc_id, $_FILES['file']['name'][$index], $_SESSION["usu_id"]);
                        move_uploaded_file($nombreTemporal, $destino);
                    }
                } 
            break;
            }
        default:
            echo "Error: Operación no válida.";
    }
} else {
    echo "Error: Operación no especificada.";
}
?>
