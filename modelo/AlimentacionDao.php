<?php

require_once '../database/Conexion.php';

class AlimentacionDao {

    public function CrearAlimentacion($datos) {
        $cn = new Conexion();
        $conectar = $cn->getConexion();
        $cn->set_names();

        $sql = "insert into Alimentacion( lote_alimento , fecha_alimento , marca_alimento , tipo_alimento , cantidad_alimento , estanque_alimentacion , lote_siembra_alimentado,id_usuario) values(?,?,?,?,?,?,?,?)";

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

        $sql = "select  fecha_alimento , lote_alimento  , marca_alimento , tipo_alimento , cantidad_alimento , estanque_alimentacion , lote_siembra_alimentado , id_alimentacion 
                   from Alimentacion"
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

        $sql = "delete from Alimentacion where id_alimentacion=?";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();

        return $sql->rowCount();
    }

    public function BuscarPorId($id) {
        $cn = new Conexion();
        $conectar = $cn->getConexion();
        $cn->set_names();

        $sql = "select id_alimentacion , lote_alimento , fecha_alimento , marca_alimento , tipo_alimento , cantidad_alimento , 
                   estanque_alimentacion , lote_siembra_alimentado
                   from Alimentacion"
                . " where id_alimentacion=?";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();

        return $resultado = $sql->fetchAll();
    }

    public function EditarAlimentacion($datos) {
        $cn = new Conexion();
        $conectar = $cn->getConexion();
        $cn->set_names();

        $sql = "update Alimentacion set lote_alimento =?,fecha_alimento=?,marca_alimento=?,tipo_alimento=?, "
                . " cantidad_alimento =?, estanque_alimentacion = ? , lote_siembra_alimentado  = ?"
                . " where id_alimentacion =?";

        $sql = $conectar->prepare($sql);

        $sql->bindValue(1, $datos[0]);
        $sql->bindValue(2, $datos[1]);
        $sql->bindValue(3, $datos[2]);
        $sql->bindValue(4, $datos[3]);
        $sql->bindValue(5, $datos[4]);
        $sql->bindValue(6, $datos[5]);
        $sql->bindValue(7, $datos[6]);
        $sql->bindValue(8, $datos[7]);
        return $sql->execute();
    }

}

?>