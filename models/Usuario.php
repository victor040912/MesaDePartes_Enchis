<?php
/* TODO: Definición de la clase Usuario que extiende la clase Conectar */
class Usuario extends Conectar {

    private $key = "MesaDePartes";
    private $cipher = "aes-256-cbc";

public function login(){
        $conectar = parent::conexion();
        parent::set_names();
        if(isset($_POST["enviar"])){
            $correo = $_POST["usu_correo"];
            $pass = $_POST["usu_pass"];
            if(empty($correo) and empty($pass)){
                header("Location:".conectar::ruta()."index.php?m=2");
                exit();
            }else{
                $sql="SELECT * FROM tm_usuario WHERE usu_correo = ?";
                $sql=$conectar->prepare($sql);
                $sql->bindValue(1,$correo);
                $sql->execute();
                $resultado=$sql->fetch();
                if($resultado){
                    $usu_pass = $resultado["usu_pass"];
                   /*  $textoCifrado = $resultado["usu_pass"]; */

                    /* $iv_dec = substr(base64_decode($textoCifrado), 0, openssl_cipher_iv_length($this->cipher));
                    $cifradoSinIV = substr(base64_decode($textoCifrado), openssl_cipher_iv_length($this->cipher));
                    $textoDecifrado = openssl_decrypt($cifradoSinIV, $this->cipher, $this->key, OPENSSL_RAW_DATA, $iv_dec); */

                    /* if($textoDecifrado==$pass){ */
                    if($usu_pass ==$pass){
                        if(is_array($resultado) and count($resultado)>0){
                            $_SESSION["usu_id"] = $resultado["usu_id"];
                            $_SESSION["usu_nomape"] = $resultado["usu_nomape"];
                            $_SESSION["usu_correo"] = $resultado["usu_correo"];
                            header("Location:".Conectar::ruta()."view/home/");
                            exit();
                        }
                        
                    }else{
                        header("Location:".Conectar::ruta()."index.php?m=3");
                        exit();
                    }
                }else{
                    header("Location:".Conectar::ruta()."index.php?m=1");
                    exit();
                }
            }

        } 
}

    
    public function registrar_usuario($usu_nomape, $usu_correo, $usu_pass, $usu_img, $est) {

        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->cipher));
        $cifrado = openssl_encrypt($usu_pass, $this->cipher, $this->key, OPENSSL_RAW_DATA, $iv);
        $textoCifrado = base64_encode($iv . $cifrado);
        
        /* Conexión a la base de datos */
        $conectar = parent::conexion();
        parent::set_names();

        /* Consulta SQL */
        $sql = "INSERT INTO tm_usuario
                (usu_nomape, usu_correo, usu_pass, usu_img, est)
                VALUES (?, ?, ?, ?, ?)";
        
        $sql = $conectar->prepare($sql);

        /* Vincular valores */
        $sql->bindValue(1, $usu_nomape);
        $sql->bindValue(2, $usu_correo);
        $sql->bindValue(3, $usu_pass);
        $sql->bindValue(4, $usu_img);
        $sql->bindValue(5, $est);

        /* Ejecutar consulta */
        $sql->execute();

        $sql1="select last_insert_id() as 'usu_id'";
        $sql1=$conectar->prepare($sql1);
        $sql1->execute();
        return $sql1->fetchAll();
        /* return $sql->fetchAll(); */
    }

    public function get_usuario_correo($usu_correo){
        /* TODO: Obtener la conexión a la base de datos utilizando el método de la clase padre */
        $conectar = parent::conexion();
        /* TODO: Establecer el juego de caracteres a UTF-8 utilizando el método de la clase padre */
        parent::set_names();
        /* TODO: Consulta SQL para insertar un nuevo usuario en la tabla tm_usuario */
        $sql="SELECT * FROM tm_usuario
            WHERE usu_correo = ?";
        /* TODO:Preparar la consulta SQL */
        $sql=$conectar->prepare($sql);
        /* TODO: Vincular los valores a los parámetros de la consulta */
        $sql->bindValue(1,$usu_correo);
        /* TODO: Ejecutar la consulta SQL */
        $sql->execute();
        return $sql->fetchAll();
    }

     public function get_usuario_id($usu_id){
        /* TODO: Obtener la conexión a la base de datos utilizando el método de la clase padre */
         $conectar = parent::conexion(); 
        /* TODO: Establecer el juego de caracteres a UTF-8 utilizando el método de la clase padre */
        parent::set_names(); 
        /* TODO: Consulta SQL para insertar un nuevo usuario en la tabla tm_usuario */
        $sql="SELECT * FROM tm_usuario 
            WHERE usu_id = ?"; 
        /* TODO:Preparar la consulta SQL */
        $sql=$conectar->prepare($sql); 
        /* TODO: Vincular los valores a los parámetros de la consulta */
         $sql->bindValue(1,$usu_id); 
        /* TODO: Ejecutar la consulta SQL */
         $sql->execute();
        return $sql->fetchAll(); 
    }
    
    public function activar_usuario($usu_id){

        $iv_dec = substr(base64_decode($usu_id), 0, openssl_cipher_iv_length($this->cipher));
        $cifradoSinIV = substr(base64_decode($usu_id), openssl_cipher_iv_length($this->cipher));
        $textoDecifrado = openssl_decrypt($cifradoSinIV, $this->cipher, $this->key, OPENSSL_RAW_DATA, $iv_dec);

        /* TODO: Obtener la conexión a la base de datos utilizando el método de la clase padre */
        $conectar = parent::conexion();
        /* TODO: Establecer el juego de caracteres a UTF-8 utilizando el método de la clase padre */
        parent::set_names();
        /* TODO: Consulta SQL para insertar un nuevo usuario en la tabla tm_usuario */
        $sql = "UPDATE tm_usuario
                SET
                    est = 1,
                    fech_acti = NOW()
                WHERE
                    usu_id = ?";
        /* TODO:Preparar la consulta SQL */
        $sql=$conectar->prepare($sql);
        /* TODO: Vincular los valores a los parámetros de la consulta */
        $sql->bindValue(1,$textoDecifrado);
        /* TODO: Ejecutar la consulta SQL */
        $sql->execute();
    }

    public function recuperar_usuario($usu_correo,$usu_pass){

        /* $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->cipher));
        $cifrado = openssl_encrypt($usu_pass, $this->cipher, $this->key, OPENSSL_RAW_DATA, $iv);
        $textoCifrado = base64_encode($iv . $cifrado); */

        /* TODO: Obtener la conexión a la base de datos utilizando el método de la clase padre */
        $conectar = parent::conexion();
        /* TODO: Establecer el juego de caracteres a UTF-8 utilizando el método de la clase padre */
        parent::set_names();
        /* TODO: Consulta SQL para insertar un nuevo usuario en la tabla tm_usuario */
        $sql="UPDATE tm_usuario
                SET 
                usu_pass = ?
                WHERE 
                usu_correo = ?";
        /* TODO:Preparar la consulta SQL */
        $sql=$conectar->prepare($sql);
        /* TODO: Vincular los valores a los parámetros de la consulta */
        /* $sql->bindValue(1,$usu_textoCifrado); */
        $sql->bindValue(1,$usu_pass);
        $sql->bindValue(1,$usu_correo);
        /* TODO: Ejecutar la consulta SQL */
        $sql->execute();
    }
}


?>
