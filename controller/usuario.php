<?php

require_once("../config/conexion.php");
require_once("../models/Usuario.php");

$usuario = new Usuario();

switch($_GET["op"]){

    case "registrar":
        /* Llama al método registrar_usuario de la instancia $usuario con los datos del formulario */
        $usuario->registrar_usuario($_POST["usu_nomape"], $_POST["usu_correo"], $_POST["usu_pass"]);
        echo json_encode(["status" => "success", "message" => "Usuario registrado correctamente"]);
        break;

    default:
        echo json_encode(["status" => "error", "message" => "Operación no válida"]);
        break;
}

?>