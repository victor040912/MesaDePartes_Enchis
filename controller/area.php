<?php
 
    require_once("../config/conexion.php");
    require_once("../models/Area.php");

    $ara = new Area();

    switch($_GET["op"]){

        case "combo":
            $datos=$ara->get_area();
            $html="";
            $html.="<option value=''>Seleccionar</option>";
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row){
                    $html.="<option value='".$row['area_id']."'>".$row['area_nom']."</option>";
                }
                echo $html;
            }
            break;
    
        }
    
?>