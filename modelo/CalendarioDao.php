<?php

require_once '../database/Conexion.php';

class CalendarioDao {

    public function CrearCalendario($datos) {
        $cn = new Conexion();
        $conectar = $cn->getConexion();
        $cn->set_names();

        $sql = "insert into Calendario(fecha_calendario,  hora_calendario,evento_calendario,estado_calendario,observacion_calendario,id_usuario) values(?,?,?,?,?,?)";

        $sql = $conectar->prepare($sql);

        $sql->bindValue(1, $datos[0]);
        $sql->bindValue(2, $datos[1]);
        $sql->bindValue(3, $datos[2]);
        $sql->bindValue(4, $datos[3]);
        $sql->bindValue(5, $datos[4]);
        $sql->bindValue(6, $datos[5]);
        $sql->execute();

        $id = $conectar->lastInsertId();

        return $id;
    }

    public function ListarTodos($user) {
        $cn = new Conexion();
        $conectar = $cn->getConexion();
        $cn->set_names();

        $sql = "select id_calendario , fecha_calendario,  hora_calendario,evento_calendario,estado_calendario,observacion_calendario,id_usuario"
                . " from Calendario"
                . " where id_usuario=?";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $user);
        $sql->execute();

        return $resultado = $sql->fetchAll();
    }

    public function Eliminar($id) {
        $cn = new Conexion();
        $conectar = $cn->getConexion();
        $cn->set_names();

        $sql = "delete from Calendario where id_calendario=?";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();

        return $sql->rowCount();
    }

    public function BuscarPorId($id) {
        $cn = new Conexion();
        $conectar = $cn->getConexion();
        $cn->set_names();

         $sql = "select id_calendario , fecha_calendario,  hora_calendario,evento_calendario,estado_calendario,observacion_calendario,id_usuario"
                . " from Calendario"
                . " where id_calendario=?";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();

        return $resultado = $sql->fetchAll();
    }

    public function EditarCalendario($datos) {
        $cn = new Conexion();
        $conectar = $cn->getConexion();
        $cn->set_names();

        $sql = "update Calendario set fecha_calendario =?,hora_calendario=?,evento_calendario=?,estado_calendario=?, "
                . " observacion_calendario =? "
                . " where id_calendario =?";

        $sql = $conectar->prepare($sql);

        $sql->bindValue(1, $datos[0]);
        $sql->bindValue(2, $datos[1]);
        $sql->bindValue(3, $datos[2]);
        $sql->bindValue(4, $datos[3]);
        $sql->bindValue(5, $datos[4]);
        $sql->bindValue(6, $datos[5]);
        return $sql->execute();
    }

}

?>