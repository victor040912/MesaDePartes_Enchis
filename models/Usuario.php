<?php
/* TODO: Definición de la clase Usuario que extiende la clase Conectar */
class Usuario extends Conectar {

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
}


?>
