<?php
//TODO: Definicion de la clase usurio que extiende la clase conectar
class Usuario extends conectar
{
    //TODO: Metodo para registrar un nuevo usuario en la base de datos
    public function registrar_usuario($usu_nomape,$usu_correo,$usu_pass){
        //TODO: obtener la conexion a la base de datos utilizando el metodo de la clase padre
        $conectar = parent::conexion();
        //TODO: Establecer el juego de caracteres a UTF-8 utilizando el metodo de la clase padre
        parent::set_name();
        //TODO: Consulta SQL para insertar un nuevo usuario en la tabla tm_usuario
        $sql = "INSERT INTO tm_usuario
            (usu_nomape,usu_correo,usu_pass)
            VALUES
            (?, ?, ?)";
        //TODO: Preparar la consulta SQL
        $sql=$conectar->prepare($sql);
        //TODO: Vicncula los valores a los parámetros de la consulta
        $sql->bindValue(1,$usu_nomape);
        $sql->bindValue(2,$usu_correo);
        $sql->bindValue(3,$usu_pass);
        //TODO: Ejecuta la consulta SQL
        $sql->execute();
    }
}
 //TODO: Todo esto esta Encargada de recepcionar todas las variables que vienen desede controllers para proceder con la insercion del registro