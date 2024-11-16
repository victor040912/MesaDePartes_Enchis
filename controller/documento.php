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
        
            if(is_array($datos) == true && count($datos) == 0){
                echo "0";
            } else {
                $doc_id = $datos[0]["doc_id"];
                $mes = date("m");
                $anio = date("Y");
        
                echo $mes."-".$anio."-".$doc_id;
        
                if (!empty($_FILES['file']['name'])) {
                    $countfiles = count($_FILES['file']['name']);
                    $ruta = "../assets/document/".$doc_id."/";
                    $file_arr = array();
                    if (!file_exists($ruta)) {
                        mkdir($ruta, 0777, true);
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
            }
            break;
            
            
            
            case "listarusuario":
                $datos = $documento->get_documento_x_usu($_SESSION["usu_id"]);
                $data = array();
                foreach ($datos as $row) {
                    $sub_array = array();
                    // Verificar si el índice "nrotramite" existe en el array
                    $sub_array[] = isset($row["nrotramite"]) ? $row["nrotramite"] : "N/A";
                    $sub_array[] = $row["area_nom"];
                    $sub_array[] = $row["tra_nom"];
                    $sub_array[] = $row["doc_externo"];
                    $sub_array[] = $row["tip_nom"];
                    $sub_array[] = $row["doc_dni"];
                    $sub_array[] = $row["doc_nom"];
                    $sub_array[]= '<button type="button" class="btn btn-soft-primary waves-effect waves-light btn-sm">
    <i class="bx bx-message-alt-dots font-size-16 align-middle"></i>
</button>
';
                    $data[] = $sub_array;
                }
                $results = array(
                    "sEcho" => 1,
                    "iTotalRecords" => count($data),
                    "iTotalDisplayRecords" => count($data),
                    "aaData" => $data
                );
                echo json_encode($results);
                break;
            

        default:
            echo "Error: Operación no válida.";

    }
} else {
    echo "Error: Operación no especificada.";
}
?>
