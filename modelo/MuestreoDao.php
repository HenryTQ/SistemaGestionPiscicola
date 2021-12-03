<?php

require_once '../database/Conexion.php';

class MuestreoDao {

    public function CrearMuestreo($datos) {
        $cn = new Conexion();
        $conectar = $cn->getConexion();
        $cn->set_names();

        $sql = "insert into Muestreo(fecha_muestreo,estanque_muestreo,cantidad_siembra,cantidad_mortalidad,
            especie_muestreo,peso_promedio,talla_promedio,biomasa,racion_alimenticia,etapa_produccion,
            id_siembra,id_alimentacion,id_cosecha,id_calidad) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $sql = $conectar->prepare($sql);

        for ($i = 0; $i < 14; $i++) {
            $sql->bindValue($i + 1, $datos[$i]);
        }

        $sql->execute();

        $id = $conectar->lastInsertId();

        return $id;
    }

    public function ListarTodos($user) {
        $cn = new Conexion();
        $conectar = $cn->getConexion();
        $cn->set_names();

        $sql = " select fecha_muestreo , m.id_siembra , m.estanque_muestreo, cantidad_siembra, cantidad_mortalidad , especie_muestreo , peso_promedio , talla_promedio,
                     biomasa, racion_alimenticia , etapa_produccion  , m.id_muestreo , m.id_cosecha , m.id_calidad , m.peso_promedio ,m.id_alimentacion 
                    from Cosecha  c inner join muestreo m 
                    on m.id_cosecha = c.id_cosecha 
                     where id_usuario=?";

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

        $sql = " select fecha_muestreo , m.id_siembra , m.estanque_muestreo, cantidad_siembra, cantidad_mortalidad , especie_muestreo , peso_promedio , talla_promedio,
                     biomasa, racion_alimenticia , etapa_produccion  , m.id_muestreo  , m.id_cosecha , m.id_calidad , m.peso_promedio , m.id_alimentacion 
                    from Cosecha  c inner join muestreo m  
                    on m.id_cosecha = c.id_cosecha  
                   where id_muestreo=?";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();

        return $resultado = $sql->fetchAll();
    }

    public function EditarMuestreo($datos) {
        $cn = new Conexion();
        $conectar = $cn->getConexion();
        $cn->set_names();

        $sql = "update Muestreo set fecha_muestreo=?,estanque_muestreo=?,cantidad_siembra=?,
                 cantidad_mortalidad=?,especie_muestreo=?,peso_promedio=?,talla_promedio=?,
                  biomasa=?,racion_alimenticia=?,etapa_produccion=?,
            id_siembra=?,id_alimentacion=?,id_cosecha=?,id_calidad=?
             where id_muestreo=? ";
        $sql = $conectar->prepare($sql);


        for ($i = 0; $i < 15; $i++) {
            $sql->bindValue($i + 1, $datos[$i]);
        }
        return $sql->execute();
    }

}

?>