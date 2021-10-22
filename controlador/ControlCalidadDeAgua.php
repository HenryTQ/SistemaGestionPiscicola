<?php

require_once '../modelo/CalidadDeAguaDao.php';
session_start();

$obj = new CalidadDeAguaDao();

$accion = $_REQUEST["accion"];

$estanque= isset($_POST["estanque"]) ? $_POST["estanque"] : "";
$fecha = isset($_POST["fecha"]) ? $_POST["fecha"] : "";
$anomalia= isset($_POST["anomalia"]) ? $_POST["anomalia"] : "";
$temperatura_calidad= isset($_POST["temperatura_calidad"]) ? $_POST["temperatura_calidad"] : "";
$oxigeno_calidad= isset($_POST["oxigeno_calidad"]) ? $_POST["oxigeno_calidad"] : "";
$ph = isset($_POST["ph"]) ? $_POST["ph"] : "";
$alcalinidad_calidad = isset($_POST["alcalinidad_calidad"]) ? $_POST["alcalinidad_calidad"] : "";
$dureza_calidad = isset($_POST["dureza_calidad"]) ? $_POST["dureza_calidad"] : "";
$id_calidad= isset($_POST["id_calidad"]) ? $_POST["id_calidad"] :0;
$usuario = $_SESSION["usuario"][0][0];

if ($accion === "crear") {
    $datos = array(
        $fecha,
        $temperatura_calidad,
        $oxigeno_calidad,
        $ph,
        $alcalinidad_calidad,
        $dureza_calidad,
        $anomalia,
        $estanque
    );

    $data = $obj->CrearCalidadDeAgua($datos);

    echo json_encode($data);
} else if ($accion === "listar_json") {
    $data = $obj->ListarTodos($usuario);

    echo json_encode($data);
    
} else if ($accion === "listar") {
    header("location: ./../vista/PagListarCalidadDeAgua.php");
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
        $temperatura_calidad,
        $oxigeno_calidad,
        $ph,
        $alcalinidad_calidad,
        $dureza_calidad,
        $anomalia,
        $estanque,
        $id_calidad
    );

    $data = $obj->EditarCalidadDeAgua($datos);

    echo json_encode($data);
}
?>
