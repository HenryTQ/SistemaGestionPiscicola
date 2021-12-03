<?php

require_once '../modelo/AlimentacionDao.php';
session_start();

$obj = new AlimentacionDao();

$accion = $_REQUEST["accion"];

$fecha = isset($_POST["fecha"]) ? $_POST["fecha"] : "";
$marca = isset($_POST["marca"]) ? $_POST["marca"] : "";
$estanque = isset($_POST["estanque"]) ? $_POST["estanque"] : "";
$lote_alimento = isset($_POST["lote_alimento"]) ? $_POST["lote_alimento"] : "";
$tipo_alimento = isset($_POST["tipo_alimento"]) ? $_POST["tipo_alimento"] : "";
$cantidad = isset($_POST["cantidad"]) ? $_POST["cantidad"] : "";
$lote_siembra = isset($_POST["lote_siembra"]) ? $_POST["lote_siembra"] : "";
$id_alimentacion = isset($_POST["id_alimentacion"]) ? $_POST["id_alimentacion"] : "";

$usuario = $_SESSION["usuario"][0][0];

if ($accion === "crear") {
    $datos = array(
        $lote_alimento,
        $fecha,
        $marca,
        $tipo_alimento,
        $cantidad,
        $estanque,
        $lote_siembra,
        $usuario
    );

    $data = $obj->CrearAlimentacion($datos);

    echo json_encode($data);
} else if ($accion === "listar_json") {
    $data = $obj->ListarTodos($usuario);

    echo json_encode($data);
} else if ($accion === "listar") {
    header("location: ./../vista/PagListarAlimentacion.php");
} else if ($accion == "eliminar") {
    $id = $_REQUEST["id"];
    $res = $obj->Eliminar($id);
    echo $res;
} else if ($accion === "buscarPorId") {
    $id = $_REQUEST["id"];

    $data = $obj->BuscarPorId($id);

    echo json_encode($data[0]);
} else if ($accion === "editar") {
    $datos = array(
       $lote_alimento,
        $fecha,
        $marca,
        $tipo_alimento,
        $cantidad,
        $estanque,
        $lote_siembra,
        $id_alimentacion
    );

    $data = $obj->EditarAlimentacion($datos);

    echo json_encode($data);
}
?>
