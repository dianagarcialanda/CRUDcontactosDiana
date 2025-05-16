<?php
include_once("../m/Usuario.php");





if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = new Usuario($_POST['usuario'], $_POST['contrasena']);
    $datos = $usuario->validar();

    if ($datos) {
        $_SESSION['usuario'] = $datos['id'];  // Usamos el id del usuario para la sesión
        //$_SESSION['usuario'] = $datos['clave'];
        $_SESSION['tipo'] = $datos['tipo'];

        if ($datos['tipo'] == 'admin') {
            header("Location: /P3_phpYagenda/v/2inicioAdmin.php");
        } else {
            header("Location: /P3_phpYagenda/v/3inicioUser.php");
        }
    } else {
        echo "Usuario o contraseña incorrectos";
    }
}
?>
