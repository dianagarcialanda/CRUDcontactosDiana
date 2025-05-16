<?php
include_once("../m/Contacto.php");



// Obtener todos los contactos
$contactos = Contacto::obtenerTodos();

// Manejar operaciones CRUD
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['accion'])) {
        switch ($_POST['accion']) {
            case 'agregar':
                $resultado = Contacto::agregar(
                    $_POST['nombre'],
                    $_POST['direccion'],
                    $_POST['telefono'],
                    $_POST['email'],
                    $_POST['id_usuario'] // Usamos el ID del formulario
                );
                if ($resultado) {
                    $mensaje = "Contacto agregado correctamente";
                } else {
                    $mensaje = "Error al agregar contacto";
                }
                header("Location: /P3_phpYagenda/v/2inicioAdmin.php");
                break;
                
            case 'actualizar':
                $resultado = Contacto::actualizar(
                    $_POST['id'],
                    $_POST['nombre'],
                    $_POST['direccion'],
                    $_POST['telefono'],
                    $_POST['email'],
                    $_POST['id_usuario'] // Añadido campo id_usuario
                );
                if ($resultado) {
                    $mensaje = "Contacto actualizado correctamente";
                } else {
                    $mensaje = "Error al actualizar contacto";
                }
                break;
                
            case 'eliminar':
                $resultado = Contacto::eliminar($_POST['id']);
                if ($resultado) {
                    $mensaje = "Contacto eliminado correctamente";
                } else {
                    $mensaje = "Error al eliminar contacto";
                }
                header("Location: /P3_phpYagenda/v/2inicioAdmin.php");
                break;
        }
        $contactos = Contacto::obtenerTodos();
    }
}


if (isset($_GET['accion']) && $_GET['accion'] == 'obtener' && isset($_GET['id'])) {
    $contacto = Contacto::obtenerPorId($_GET['id']);
    header('Content-Type: application/json');
    
    if ($contacto) {
        echo json_encode($contacto);
    } else {
        echo json_encode(['error' => 'Contacto no encontrado']);
    }
    exit();
}

// Para actualizar
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['accion']) && $_POST['accion'] == 'actualizar') {
    $resultado = Contacto::actualizar(
        $_POST['id'],
        $_POST['nombre'],
        $_POST['direccion'],
        $_POST['telefono'],
        $_POST['email'],
        $_POST['id_usuario']
    );
    
    if ($resultado) {
        $mensaje = "Contacto actualizado correctamente";
    } else {
        $mensaje = "Error al actualizar contacto";
    }
    
    // Recargar la lista de contactos
    $contactos = Contacto::obtenerTodos();
    // Redirigir para evitar reenvío del formulario
    header("Location: /P3_phpYagenda/v/2inicioAdmin.php");
    exit();
}

?>