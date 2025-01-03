<?php
/* TODO: Definición de la clase Documento que extiende la clase Conectar */
class Documento extends Conectar{

    /* TODO: Método para registrar un nuevo usuario en la base de datos */
    public function registrar_documento($area_id,$tra_id,$doc_externo,$tip_id,$doc_dni,$doc_nom,$doc_descrip,$usu_id){
        /* TODO: Obtener la conexión a la base de datos utilizando el método de la clase padre */
        $conectar = parent::conexion();
        /* TODO: Establecer el juego de caracteres a UTF-8 utilizando el método de la clase padre */
        parent::set_names();
        /* TODO: Consulta SQL para insertar un nuevo usuario en la tabla tm_usuario */
        $sql="INSERT INTO tm_documento
            (area_id,tra_id,doc_externo,tip_id,doc_dni,doc_nom,doc_descrip,usu_id)
            VALUES
            (?,?,?,?,?,?,?,?)";
        /* TODO:Preparar la consulta SQL */
        $sql=$conectar->prepare($sql);
        /* TODO: Vincular los valores a los parámetros de la consulta */
        $sql->bindValue(1,$area_id);
        $sql->bindValue(2,$tra_id);
        $sql->bindValue(3,$doc_externo);
        $sql->bindValue(4,$tip_id);
        $sql->bindValue(5,$doc_dni);
        $sql->bindValue(6,$doc_nom);
        $sql->bindValue(7,$doc_descrip);
        $sql->bindValue(8,$usu_id);
        /* TODO: Ejecutar la consulta SQL */
        $sql->execute();

        $sql1="select last_insert_id() as 'doc_id'";
        $sql1=$conectar->prepare($sql1);
        $sql1->execute();
        return $sql1->fetchAll(pdo::FETCH_ASSOC);
        /* return $sql->fetchAll(); */
    }

    public function insert_documento_detalle($doc_id, $det_nom, $usu_id){
          /* TODO: Obtener la conexión a la base de datos utilizando el método de la clase padre */
          $conectar = parent::conexion();
          /* TODO: Establecer el juego de caracteres a UTF-8 utilizando el método de la clase padre */
          parent::set_names();
          /* TODO: Consulta SQL para insertar un nuevo usuario en la tabla tm_usuario */
          $sql="INSERT INTO td_documento_detalle 
                (doc_id,det_nom,usu_id)
                VALUES
                (?,?,?)";
          /* TODO:Preparar la consulta SQL */
          $sql=$conectar->prepare($sql);
          /* TODO: Vincular los valores a los parámetros de la consulta */
          $sql->bindValue(1,$doc_id);
          $sql->bindValue(2,$det_nom);
          $sql->bindValue(3,$usu_id);
         
          /* TODO: Ejecutar la consulta SQL */
          $sql->execute();
    }

    
    public function get_documento_x_id($doc_id){
        /* TODO: Obtener la conexión a la base de datos utilizando el método de la clase padre */
        $conectar = parent::conexion();
        /* TODO: Establecer el juego de caracteres a UTF-8 utilizando el método de la clase padre */
        parent::set_names();
        /* TODO: Consulta SQL para insertar un nuevo usuario en la tabla tm_usuario */
        $sql="CALL sp_l_documento_01(?);";
        /* TODO:Preparar la consulta SQL */
        $sql=$conectar->prepare($sql);
        /* TODO: Vincular los valores a los parámetros de la consulta */
        $sql->bindValue(1,$doc_id);
       
        /* TODO: Ejecutar la consulta SQL */
        $sql->execute();
        return $sql->fetchAll(pdo::FETCH_ASSOC);
   }

   public function get_documento_x_usu($usu_id){
    /* TODO: Obtener la conexión a la base de datos utilizando el método de la clase padre */
    $conectar = parent::conexion();
    /* TODO: Establecer el juego de caracteres a UTF-8 utilizando el método de la clase padre */
    parent::set_names();
    /* TODO: Consulta SQL para insertar un nuevo usuario en la tabla tm_usuario */
    $sql="CALL sp_l_documento_02(?);";
    /* TODO:Preparar la consulta SQL */
    $sql=$conectar->prepare($sql);
    /* TODO: Vincular los valores a los parámetros de la consulta */
    $sql->bindValue(1,$usu_id);
   
    /* TODO: Ejecutar la consulta SQL */
    $sql->execute();
    return $sql->fetchAll(pdo::FETCH_ASSOC);
}
}


?>