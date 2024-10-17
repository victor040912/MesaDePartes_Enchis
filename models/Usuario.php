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
}


?>
