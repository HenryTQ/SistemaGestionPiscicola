<?php

require_once '../modelo/MuestreoDao.php';
session_start();

$obj = new MuestreoDao();

$accion = $_REQUEST["accion"];

$fecha = isset($_POST["fecha"]) ? $_POST["fecha"] : "";
$peso_promedio = isset($_POST["peso_promedio"]) ? $_POST["peso_promedio"] : "";
$talla_promedio = isset($_POST["talla_promedio"]) ? $_POST["talla_promedio"] : "";
$estanque = isset($_POST["estanque"]) ? $_POST["estanque"] : "";
$biomasa = isset($_POST["biomasa"]) ? $_POST["biomasa"] : "";
$cantidad_siembra = isset($_POST["cantidad_siembra"]) ? $_POST["cantidad_siembra"] : "";
$razon_alimenticia = isset($_POST["razon_alimenticia"]) ? $_POST["razon_alimenticia"] : "";
$mortatlidad = isset($_POST["mortatlidad"]) ? $_POST["mortatlidad"] : "";
$etapa_produccion = isset($_POST["etapa_produccion"]) ? $_POST["etapa_produccion"] : "";
$especie = isset($_POST["especie"]) ? $_POST["especie"] : "";
$comentarios = isset($_POST["comentarios"]) ? $_POST["comentarios"] : "";
$usuario = $_SESSION["usuario"][0][0];
$id_alimentacion = isset($_POST["id_alimentacion"]) ? $_POST["id_alimentacion"] : "";
$id_siembra = isset($_POST["id_siembra"]) ? $_POST["id_siembra"] : "";
$id_cosecha = isset($_POST["id_cosecha"]) ? $_POST["id_cosecha"] : "";
$id_calidad = isset($_POST["id_calidad"]) ? $_POST["id_calidad"] : "";
$id_muestreo = isset($_POST["id_muestreo"]) ? $_POST["id_muestreo"] : "";

if ($accion === "crear") {
    $datos = array(
        $fecha,
        $estanque,
        $cantidad_siembra,
        $mortatlidad,
        $especie,
        $peso_promedio,
        $talla_promedio,
        $biomasa,
        $razon_alimenticia,
        $etapa_produccion,
        $id_siembra,
        $id_alimentacion,
        $id_cosecha,
        $id_calidad
    );

    $data = $obj->CrearMuestreo($datos);

    echo json_encode($data);
} else if ($accion === "listar_json") {
    $data = $obj->ListarTodos($usuario);

    echo json_encode($data);
} else if ($accion === "listar") {
    header("location: ./../vista/PagListarMuestreo.php");
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
        $estanque,
        $cantidad_siembra,
        $mortatlidad,
        $especie,
        $peso_promedio,
        $talla_promedio,
        $biomasa,
        $razon_alimenticia,
        $etapa_produccion,
        $id_siembra,
        $id_alimentacion,
        $id_cosecha,
        $id_calidad,
        $id_muestreo
    );

    $data = $obj->EditarMuestreo($datos);

    echo json_encode($datos);
}
?>
