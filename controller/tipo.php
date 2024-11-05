<?php

/* TODO: Incluye el archivo de configuración de la conexión a la base de datos y la clase Usuario */
require_once("../config/conexion.php");
require_once("../models/Tipo.php");

/* TODO:Crea una instancia de la clase Tipo */
$tipo = new Tipo();

/* TODO: Utiliza una estructura switch para determinar la operación a realizar según el valor de $_GET["op"] */
switch ($_GET["op"]) {

        /* TODO: Si la operación es "combo" */
    case "combo":
        $datos = $tipo->get_tipo();
        $html = "";
        $html .= "<option value=''>Seleccionar</option>";
        if (is_array($datos) == true and count($datos) > 0) {
            foreach ($datos as $row) {
                $html .= "<option value='" . $row['tipo_id'] . "'>" . $row['tipo_nom'] . "</option>";
            }
            echo $html;
        }
        break;
}
