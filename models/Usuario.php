<?php
/* TODO: Definición de la clase Usuario que extiende la clase Conectar */
class Usuario extends Conectar{
    /* TODO: Método para registrar un nuevo usuario en la base de datos */

    /* TODO: Método para registrar un nuevo usuario en la base de datos */
    public function registrar_usuario($usu_nomape,$usu_correo,$usu_pass){


        /* TODO: Obtener la conexión a la base de datos utilizando el método de la clase padre */
        $conectar = parent::conexion();
        /* TODO: Establecer el juego de caracteres a UTF-8 utilizando el método de la clase padre */
        parent::set_names();
        /* TODO: Consulta SQL para insertar un nuevo usuario en la tabla tm_usuario */
        $sql="INSERT INTO tm_usuario
            (usu_nomape,usu_correo,usu_pass,usu_img,rol_id,est)
            VALUES
            (?,?,?,?)";
        /* TODO:Preparar la consulta SQL */
        $sql=$conectar->prepare($sql);
        /* TODO: Vincular los valores a los parámetros de la consulta */
        $sql->bindValue(1,$usu_nomape);
        $sql->bindValue(2,$usu_correo);
        $sql->bindValue(3,$usu_pass);

        /* TODO: Ejecutar la consulta SQL */
        $sql->execute();
    }
}

?>
