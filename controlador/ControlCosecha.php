<?php

require_once '../modelo/CosechaDao.php';
session_start();

$obj = new CosechaDao();

$accion = $_REQUEST["accion"];

$fecha = isset($_POST["fecha"]) ? $_POST["fecha"] : "";
$cantidad = isset($_POST["cantidad"]) ? $_POST["cantidad"] : "";
$lote_cosecha = isset($_POST["lote_cosecha"]) ? $_POST["lote_cosecha"] : "";
$especie = isset($_POST["especie"]) ? $_POST["especie"] : "";
$estanque = isset($_POST["estanque"]) ? $_POST["estanque"] : "";
$peso = isset($_POST["peso"]) ? $_POST["peso"] : "";
$comentarios = isset($_POST["comentarios"]) ? $_POST["comentarios"] : "";
$id_cosecha = isset($_POST["id_cosecha"]) ? $_POST["id_cosecha"] : "";

$usuario = $_SESSION["usuario"][0][0];

if ($accion === "crear") {
    $datos = array(
        $lote_cosecha,
        $cantidad,
        $peso,
        $estanque,
        $especie,
        $comentarios,
        $usuario,
        $fecha
    );

    $data = $obj->CrearCosecha($datos);

    echo json_encode($data);
} else if ($accion === "listar_json") {
    $data = $obj->ListarTodos($usuario);

    echo json_encode($data);
} else if ($accion === "listar") {
    header("location: ./../vista/PagListarCosecha.php");
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
        $lote_cosecha,
        $cantidad,
        $peso,
        $estanque,
        $especie,
        $comentarios,
        $fecha,
        $id_cosecha
    );

    $data = $obj->EditarCosecha($datos);

    echo json_encode($data);
}
?>
