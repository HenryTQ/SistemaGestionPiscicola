<?php

require_once '../database/Conexion.php';

class CalidadDeAguaDao {

    public function CrearCalidadDeAgua($datos) {
        $cn = new Conexion();
        $conectar = $cn->getConexion();
        $cn->set_names();

        $sql = "insert into Calidad_Agua(fecha_calidad , temperatura_calidad , oxigeno_calidad , ph_calidad , alcalinidad_calidad , dureza_calidad , observaciones_calidad,id_estanque) values(?,?,?,?,?,?,?,?)";

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

        $sql = "select id_calidad , fecha_calidad , temperatura_calidad , oxigeno_calidad , ph_calidad , alcalinidad_calidad , dureza_calidad , observaciones_calidad,e.id_estanque , e.nombre_estanque "
                . " from Calidad_Agua a inner join Estanque e on e.id_estanque = a.id_estanque "
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

        $sql = "delete from Calidad_Agua where id_calidad=?";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();

        return $sql->rowCount();
    }

    public function BuscarPorId($id) {
        $cn = new Conexion();
        $conectar = $cn->getConexion();
        $cn->set_names();

        $sql = "select id_calidad , fecha_calidad , temperatura_calidad , oxigeno_calidad , ph_calidad , alcalinidad_calidad , dureza_calidad , observaciones_calidad,e.id_estanque , e.nombre_estanque "
                . " from Calidad_Agua a inner join Estanque e on e.id_estanque = a.id_estanque "
                . " where id_calidad=?";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();

        return $resultado = $sql->fetchAll();
    }

    public function EditarCalidadDeAgua($datos) {
        $cn = new Conexion();
        $conectar = $cn->getConexion();
        $cn->set_names();

        $sql = "update Calidad_Agua set fecha_calidad =?, temperatura_calidad =?, oxigeno_calidad=? , ph_calidad =?, "
                . " alcalinidad_calidad =? , dureza_calidad =? , observaciones_calidad =? ,id_estanque = ? "
                . " where id_calidad =?";

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