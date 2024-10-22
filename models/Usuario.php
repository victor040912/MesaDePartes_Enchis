<?php
/* TODO: Definición de la clase Usuario que extiende la clase Conectar */
class Usuario extends Conectar {


    /* public function login(){
        $conectar = parent::conexion();
        parent::set_names();
        if(isset($_POST["enviar"])){
            $correo = $_POST["usu_correo"];
            $pass = $_POST["usu_pass"];
            if(empty($correo) and empty($pass)){
                header("Location:".conectar::ruta()."index.php?m=2");
                exit();
            }else{
                $sql="SELECT * FROM tm_usuario WHERE usu_correo = ? AND rol_id = 1";
                $sql=$conectar->prepare($sql);
                $sql->bindValue(1,$correo);
                $sql->execute();
                $resultado=$sql->fetch();
                if($resultado){
                    $textoCifrado = $resultado["usu_pass"];

                    $iv_dec = substr(base64_decode($textoCifrado), 0, openssl_cipher_iv_length($this->cipher));
                    $cifradoSinIV = substr(base64_decode($textoCifrado), openssl_cipher_iv_length($this->cipher));
                    $textoDecifrado = openssl_decrypt($cifradoSinIV, $this->cipher, $this->key, OPENSSL_RAW_DATA, $iv_dec);

                    if($textoDecifrado==$pass){
                        if(is_array($resultado) and count($resultado)>0){
                            $_SESSION["usu_id"] = $resultado["usu_id"];
                            $_SESSION["usu_nomape"] = $resultado["usu_nomape"];
                            $_SESSION["usu_correo"] = $resultado["usu_correo"];
                            $_SESSION["usu_img"] = $resultado["usu_img"];
                            $_SESSION["rol_id"] = $resultado["rol_id"];
                            header("Location:".Conectar::ruta()."view/Home/");
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
}*/

    
    public function registrar_usuario($usu_nomape, $usu_correo, $usu_pass) {
        
        /* Conexión a la base de datos */
        $conectar = parent::conexion();
        parent::set_names();

        /* Hashear la contraseña antes de almacenarla */


        /* Consulta SQL */
        $sql = "INSERT INTO tm_usuario
                (usu_nomape, usu_correo, usu_pass, est)
                VALUES (?, ?, ?, 1)";
        
        $sql = $conectar->prepare($sql);

        /* Vincular valores */
        $sql->bindValue(1, $usu_nomape);
        $sql->bindValue(2, $usu_correo);
        $sql->bindValue(3, $usu_pass);

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
    
    
    
}


?>
