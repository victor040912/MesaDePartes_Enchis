<?php
/* require '../include/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once("../config/conexion.php");
require_once("../models/Usuario.php");

class Email extends PHPMailer{

    protected $gCorreo = 'soporte.ti@lacasadelasenchiladas.pe';
    protected $gContrasena = 'enchis07';
    
    public function registrar($usu_id){

        $this->IsSMTP();
        $this->Host = 'smtp.hostinger.com';
        $this->Port = 587;//Aqui el puerto
        $this->SMTPAuth = true;
        $this->SMTPSecure = 'tls';

        $this->Username = $this->gCorreo;
        $this->Password = $this->gContrasena;

        $this->setFrom($this->gCorreo,"Registro en Mesa de Partes AnderCode");

        $this->CharSet = 'UTF8';
        $this->addAddress("soporte.ti@lacasadelasenchiladas.pe");
        $this->IsHTML(true);
        $this->Subject = "Mesa de Partes";


        $cuerpo = file_get_contents("../assets/email/registrar.html");
        $cuerpo = str_replace("xlinkcorreourl",$usu_id,$cuerpo);

        $this->Body = $cuerpo;
        $this->AltBody = strip_tags("Confirmar Registro");

        try{
            $this->send();
            return true;
        }catch(Exception $e){
            return false;
        }

    }
} */



?>