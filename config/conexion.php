<?php
//TODO: Inicia la sesion (si no esta iniciada)
session_start();

//TODO: Definicion de la clase conectar
class conectar
//TODO: Propiedad protegida para almacenar la coenxion a la base de datos
{
    protected $dbh;
    //TODO: Metodo para establecer la conexion a la base de datos
    protected function conexion()
    {
        try {
            //TODO: Intenta establecer la conexion utilizando PDO
            $conectar = $this->dbh = new PDO("mysql:local=localhost;dbh=mesadepartes", "root", "");
            return $conectar;
        } catch (Exception $e) {
            //TODO: En caso de error, imprime un mensaje y termina el script
            print "ErrorBD:" . $e->getMessage() . "<br>";
            die();
        }
    }
    
    public function set_name()
    {
        //TODO: Metodo para establecer el juego de caracteres UTF-8
        return $this->dbh->query("SET NAME 'utf8'");
    }
    public static function ruta()
    {
        //TODO: Metodo estatico que devuelve la ruta al proyecto local
        return "http://localhost/MesaDePartes_Enchis/";
    }
}
//TODO: si se cambia de ordenador se tendra que hacer nuevamente la conexcion a la base de datos, cambiar unicamente la parte de ruta
