<?php

class Conexion {
    protected $dbh;
    protected $servidor = "localhost";
    protected $database = "bd_SistemaTrucha";
    protected $usuario = "root";
    protected $contrasenia = "admin123";

    public function getConexion() {
        try {
            $conectar = $this->dbh = new PDO("mysql:local=" . $this->servidor . ";"
                    . "dbname=" . $this->database, $this->usuario, $this->contrasenia);
            return $conectar;
        } catch (Exception $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function set_names() {
        return $this->dbh->query("SET NAMES 'utf8'");
    }
}

?>