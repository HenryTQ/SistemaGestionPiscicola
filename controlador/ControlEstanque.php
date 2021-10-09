<?php

require_once '../modelo/EstanqueDao.php';
session_start();

$obj = new EstanqueDao();

$accion = $_REQUEST["accion"];

$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
$area = isset($_POST["area"]) ? $_POST["area"] : "";
$tipo = isset($_POST["tipo"]) ? $_POST["tipo"] : "";

$volumen = isset($_POST["volumen"]) ? $_POST["volumen"] : "";
$forma = isset($_POST["area"]) ? $_POST["forma"] : "";
$estado = isset($_POST["estado"]) ? $_POST["estado"] : "";

$usuario = $_SESSION["usuario"][0][0];

if ($accion === "crear") {
    $datos = array(
        $nombre,
        $tipo,
        $forma,
        $area,
        $volumen,
        $estado,
        $usuario
    );

    $data = $obj->CrearEstanque($datos);

    echo json_encode($data);
} else if ($accion === "listar_json") {
    $data = $obj->ListarTodos($usuario);

    echo json_encode($data);
} else if ($accion === "listar") {
    header("location: ./../vista/PagListarEstanque.php");
} else if ($accion == "eliminar") {
    $id = $_REQUEST["id"];
    $res = $obj->Eliminar($id);
    echo $res;
}
?>
