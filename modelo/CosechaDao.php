<?php

require_once '../database/Conexion.php';

class CosechaDao {

    public function CrearCosecha($datos) {
        $cn = new Conexion();
        $conectar = $cn->getConexion();
        $cn->set_names();

        $sql = " insert into Cosecha(lote_cosecha,cantidad_cosecha, peso_cosecha,estanque_cosecha,especie_cosecha,observacion_cosecha,id_usuario,fecha_cosecha) values(?,?,?,?,?,?,?,?)";

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

        $sql = " select id_cosecha,lote_cosecha,cantidad_cosecha, peso_cosecha,estanque_cosecha,
            especie_cosecha,observacion_cosecha,id_usuario , fecha_cosecha 
                    from Cosecha "
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

        $sql = "delete from Cosecha where id_cosecha=?";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();

        return $sql->rowCount();
    }

    public function BuscarPorId($id) {
        $cn = new Conexion();
        $conectar = $cn->getConexion();
        $cn->set_names();

        $sql = "select id_cosecha,lote_cosecha,cantidad_cosecha, peso_cosecha,estanque_cosecha,especie_cosecha,observacion_cosecha,id_usuario,fecha_cosecha "
                . " from Cosecha"
                . " where id_cosecha=?";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();

        return $resultado = $sql->fetchAll();
    }

    public function EditarCosecha($datos) {
        $cn = new Conexion();
        $conectar = $cn->getConexion();
        $cn->set_names();

        $sql = "update Cosecha set lote_cosecha =?,cantidad_cosecha=?,peso_cosecha=?,estanque_cosecha=?,especie_cosecha=? ,"
                . " observacion_cosecha =?,fecha_cosecha=? "
                . " where id_cosecha =?";

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