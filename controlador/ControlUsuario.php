<?php

require_once '../modelo/UsuarioDAO.php';
session_start();

$obj = new UsuarioDao();

$accion = $_REQUEST["accion"];
$username = isset($_POST["username"]) ? $_POST["username"] : "";
$pass = isset($_POST["password"]) ? $_POST["password"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";

if ($accion === "iniciar") {

    $data = $obj->BuscarUsuario($username, $pass);

    if (count($data) > 0) {
        $_SESSION["usuario"] = $data;
    }
    echo json_encode($data);
} else if ($accion === "crear_cuenta") {
    if ($obj->ValidarUsuario($username) > 0) {
        $data = "El usuario " . $username . " no se encuentra disponible.";
    } else {
        $datos = array(
            $username,
            $email,
            $pass
        );

        $data = $obj->CrearUsuario($datos);

        if ($data > 0) {
            $data = "OK";
        } else {
            $data = "No se ha podido registrar datos del usuario.";
        }
    }

    echo json_encode($data);
} else if ($accion === "cerrar_sesion") {

    unset($_SESSION['usuario']);
    header("location: ./../index.php");
}
?>