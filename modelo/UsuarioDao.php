<?php

require_once '../database/Conexion.php';

class UsuarioDao {

    public function BuscarUsuario($user, $pass) {
        $cn = new Conexion();
        $conectar = $cn->getConexion();
        $cn->set_names();

        $sql = "select id_usuario , nombre_usuario , email_usuario from Usuario where nombre_usuario=? and clave_usuario=?";

        $sql = $conectar->prepare($sql);

        $sql->bindValue(1, $user);
        $sql->bindValue(2, $pass);
        $sql->execute();

        return $resultado = $sql->fetchAll();
    }

    public function ValidarUsuario($user) {
        $cn = new Conexion();
        $conectar = $cn->getConexion();
        $cn->set_names();

        $sql = "select count(1) from Usuario where nombre_usuario=?";

        $sql = $conectar->prepare($sql);

        $sql->bindValue(1, $user);
        $sql->execute();

        return $resultado = $sql->fetchColumn();
    }

    public function CrearUsuario($datos) {
        $cn = new Conexion();
        $conectar = $cn->getConexion();
        $cn->set_names();

        $sql = "insert into Usuario (nombre_usuario,email_usuario,clave_usuario) values(?,?,?)";

        $sql = $conectar->prepare($sql);

        $sql->bindValue(1, $datos[0]);
        $sql->bindValue(2, $datos[1]);
        $sql->bindValue(3, $datos[2]);
        $sql->execute();

        $id = $conectar->lastInsertId();

        return $id;
    }

}

?>