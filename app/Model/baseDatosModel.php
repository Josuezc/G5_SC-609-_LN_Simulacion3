<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/G5_SC-609-_LN_Simulacion3/vendor/autoload.php";
class Conexion {
    public function conectar() {
        try {
            $servidor = "127.0.0.1";
            
            $usuario = "";
            $password = "";

            $baseDatos = "biblioteca";
            $puerto = "27017";

            $cadenaConexion = "mongodb://127.0.0.1:27017/" . $baseDatos;
            //$cadenaConexion = "mongodb://127.0.0.1:27017/" . $baseDatos;

            $cliente = new MongoDB\Client($cadenaConexion);
            $db = $cliente->selectDatabase($baseDatos);

            return $db;  //retornar la base de datos conectada

        } catch (\Throwable $th) {
            echo "Error: " . $th->getMessage();
            return null;  //retornar null en caso de error
        }
    }
}
?>
