<?php
include_once("AccesoDatos.php");

class Usuario {
    private $usuario;
    private $contrasena;

    public function __construct($usuario, $contrasena) {
        $this->usuario = $usuario;
        $this->contrasena = $contrasena;
    }

    public function validar() {
        $bd = new AccesoDatos();
        $bd->conectar();

        $sql = "SELECT * FROM usuarios WHERE clave = '$this->usuario' AND contra = '$this->contrasena'";
        $resultado = $bd->ejecutarConsulta($sql);

        $bd->desconectar();
        return count($resultado) > 0 ? $resultado[0] : false;
    }
}
?>
