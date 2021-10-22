<?php

require_once '../modelo/CalendarioDao.php';
session_start();

$obj = new CalendarioDao();

$accion = $_REQUEST["accion"];

$fecha = isset($_POST["fecha"]) ? $_POST["fecha"] : "";
$hora = isset($_POST["hora"]) ? $_POST["hora"] : "";
$estado= isset($_POST["estado"]) ? $_POST["estado"] : "";
$evento= isset($_POST["evento"]) ? $_POST["evento"] : "";
$comentarios= isset($_POST["comentarios"]) ? $_POST["comentarios"] : "";
$id_calendario = isset($_POST["id_calendario"]) ? $_POST["id_calendario"] : "";

$usuario = $_SESSION["usuario"][0][0];

if ($accion === "crear") {
    $datos = array(
        $fecha,
        $hora,
        $evento,
        $estado,
        $comentarios,
        $usuario
    );

    $data = $obj->CrearCalendario($datos);

    echo json_encode($data);
} else if ($accion === "listar_json") {
    $data = $obj->ListarTodos($usuario);

    echo json_encode($data);
    
} else if ($accion === "listar") {
    header("location: ./../vista/PagListarCalendario.php");
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
        $hora,
        $evento,
        $estado,
        $comentarios,
        $id_calendario
    );

    $data = $obj->EditarCalendario($datos);

    echo json_encode($data);
}
?>
