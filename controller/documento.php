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

            if (is_array($datos) && !empty($datos) && isset($datos[0])) {
                $doc_id = $datos[0]["doc_id"];
                
                echo "Su tramite ha sido registrado con exito con Nro: " . date("m") . "-" . date("Y") . "-" . $doc_id;

                // Resto del código para manejo de archivos y envío de email
            } else {
                echo "Error: No se pudo registrar el documento.";
            }
            break;

        default:
            echo "Error: Operación no válida.";
    }
} else {
    echo "Error: Operación no especificada.";
}

?>
