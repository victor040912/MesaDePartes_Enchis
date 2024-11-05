<?php
/* TODO: Definición de la clase Usuario que extiende la clase Conectar */
class Documento extends Conectar {

    public function registrar_documento($area_id, $tra_id, $doc_externo, $tipo_id, $doc_dni,$doc_nom,$doc_descrip, $usu_id) {
        
        /* Conexión a la base de datos */
        $conectar = parent::conexion();
        parent::set_names();

        /* Consulta SQL */
        $sql = "INSERT INTO tm_documento
                (area_id,tra_id,doc_externo,tip_id,doc_dni,doc_nom,doc_descrip,usu_id)
                VALUES
                (?,?,?,?,?,?,?,?)";
        
        $sql = $conectar->prepare($sql);

        /* Vincular valores */
        $sql->bindValue(1, $area_id);
        $sql->bindValue(2, $tra_id);
        $sql->bindValue(3, $doc_externo);
        $sql->bindValue(4, $tipo_id);
        $sql->bindValue(5, $doc_dni);
        $sql->bindValue(6, $doc_nom);
        $sql->bindValue(7, $doc_descrip);
        $sql->bindValue(8, $usu_id);

        /* Ejecutar consulta */
        $sql->execute();

        $sql1="select last_insert_id() as 'doc_id'";
        $sql1=$conectar->prepare($sql1);
        $sql1->execute();
        return $sql1->fetchAll();
        /* return $sql->fetchAll(); */
    }

}
?>
