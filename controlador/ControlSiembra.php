<?php

require_once '../modelo/SiembraDao.php';
session_start();

$obj = new SiembraDao();

$accion = $_REQUEST["accion"];

$fecha = isset($_POST["fecha"]) ? $_POST["fecha"] : "";
$cantidad = isset($_POST["cantidad"]) ? $_POST["cantidad"] : "";
$estanque = isset($_POST["estanque"]) ? $_POST["estanque"] : "";
$especie = isset($_POST["especie"]) ? $_POST["especie"] : "";
$peso = isset($_POST["peso"]) ? $_POST["peso"] : "";
$estado = isset($_POST["estado"]) ? $_POST["estado"] : "";
$procedencia = isset($_POST["procedencia"]) ? $_POST["procedencia"] : "";
$comentarios = isset($_POST["comentarios"]) ? $_POST["comentarios"] : "";
$id_siembra = isset($_POST["id_siembra"]) ? $_POST["id_siembra"] : 0;

$usuario = $_SESSION["usuario"][0][0];

if ($accion === "crear") {
    $datos = array(
        $fecha,
        $especie,
        $procedencia,
        $cantidad,
        $peso,
        $estado,
        $comentarios,
        $estanque
    );

    $data = $obj->CrearSiembra($datos);

    echo json_encode($data);
} else if ($accion === "listar_json") {
    $data = $obj->ListarTodos($usuario);

    echo json_encode($data);
} else if ($accion === "listar") {
    header("location: ./../vista/PagListarSiembra.php");
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
        $fecha,
        $especie,
        $procedencia,
        $cantidad,
        $peso,
        $estado,
        $comentarios,
        $estanque,
        $id_siembra
    );

    $data = $obj->EditarSiembra($datos);

    echo json_encode($data);
}
?>
