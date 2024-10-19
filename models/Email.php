<?php
/* require '../include/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once("../config/conexion.php");
require_once("../models/Usuario.php");

class Email extends PHPMailer{

    protected $gCorreo = 'soporte.ti@lacasadelasenchiladas.pe';
    protected $gContrasena = 'enchis07';
    
    private $key="MesaDePartes1";
    private $cipher="aes-256-cbc";

    
    public function registrar($usu_id){

        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->cipher));
        $cifrado = openssl_encrypt($usu_id, $this->cipher, $this->key, OPENSSL_RAW_DATA, $iv);
        $textoCifrado = base64_encode($iv . $cifrado);

        $conexion = new Conectar();

        $usuario = new Usuario();
        $datos= $usuario -> get_usuario_id($usu_id);

        $this->IsSMTP();
        $this->Host = 'smtp.hostinger.com';
        $this->Port = 587;//Aqui el puerto
        $this->SMTPAuth = true;
        $this->SMTPSecure = 'tls';

        $this->Username = $this->gCorreo;
        $this->Password = $this->gContrasena;

        $this->setFrom($this->gCorreo,"Registro en Mesa de Partes");

        $this->CharSet = 'UTF8';
        $this->addAddress($datos[0]["usu_correo"]);
        $this->IsHTML(true);
        $this->Subject = "Mesa de Partes";

        $url = $conexion->ruta() . "view/confirmar/confirmar.php/>?id=" $textoCifrado;


        $cuerpo = file_get_contents("../assets/email/registrar.html");
        $cuerpo = str_replace("xlinkcorreourl",$url,$cuerpo);

        $this->Body = $cuerpo;
        $this->AltBody = strip_tags("Confirmar Registro");

        try{
            $this->send();
            return true;
        }catch(Exception $e){
            return false;
        }

    }
}



*/




?>