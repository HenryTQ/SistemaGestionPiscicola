<?php

require_once '../database/Conexion.php';

class SiembraDao {

    public function CrearSiembra($datos) {
        $cn = new Conexion();
        $conectar = $cn->getConexion();
        $cn->set_names();

        $sql = "insert into Siembra(fecha_siembra,especie_siembra,procedencia_siembra,cantidad_siembra,peso_siembra,estado_siembra,observacion_siembra,id_estanque) values(?,?,?,?,?,?,?,?)";

        $sql = $conectar->prepare($sql);

        $sql->bindValue(1, $datos[0]);
        $sql->bindValue(2, $datos[1]);
        $sql->bindValue(3, $datos[2]);
        $sql->bindValue(4, $datos[3]);
        $sql->bindValue(5, $datos[4]);
        $sql->bindValue(6, $datos[5]);
        $sql->bindValue(7, $datos[6]);
        $sql->bindValue(8, $datos[7]);

        $sql->execute();

        $id = $conectar->lastInsertId();

        return $id;
    }

    public function ListarTodos($user) {
        $cn = new Conexion();
        $conectar = $cn->getConexion();
        $cn->set_names();

        $sql = "select fecha_siembra,especie_siembra,procedencia_siembra,cantidad_siembra,peso_siembra,estado_siembra,observacion_siembra,e.id_estanque,id_siembra "
                . " from Siembra s inner join estanque e on e.id_estanque= s.id_estanque "
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

        $sql = "delete from Siembra where id_siembra=?";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();

        return $sql->rowCount();
    }

    public function BuscarPorId($id) {
        $cn = new Conexion();
        $conectar = $cn->getConexion();
        $cn->set_names();

        $sql = "select fecha_siembra,especie_siembra,procedencia_siembra,cantidad_siembra,peso_siembra,estado_siembra,observacion_siembra,e.id_estanque,id_siembra  "
                . " from Siembra s inner join estanque e on e.id_estanque= s.id_estanque "
                . " where id_siembra=?";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();

        return $resultado = $sql->fetchAll();
    }

    public function EditarSiembra($datos) {
        $cn = new Conexion();
        $conectar = $cn->getConexion();
        $cn->set_names();

        $sql = "update Siembra set fecha_siembra =?,especie_siembra=?,procedencia_siembra=?,cantidad_siembra=?, "
                . " peso_siembra =?, estado_siembra = ? , observacion_siembra = ? , id_estanque = ?"
                . " where id_siembra =?";

        $sql = $conectar->prepare($sql);

        $sql->bindValue(1, $datos[0]);
        $sql->bindValue(2, $datos[1]);
        $sql->bindValue(3, $datos[2]);
        $sql->bindValue(4, $datos[3]);
        $sql->bindValue(5, $datos[4]);
        $sql->bindValue(6, $datos[5]);
        $sql->bindValue(7, $datos[6]);
        $sql->bindValue(8, $datos[7]);
        $sql->bindValue(9, $datos[8]);
        return $sql->execute();
    }

}

?>