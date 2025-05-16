<?php
class AccesoDatos {
    private $conexion;

    public function conectar() {
        $this->conexion = new PDO("mysql:host=localhost;dbname=agenda;charset=utf8", "root", "");
        $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function desconectar() {
        $this->conexion = null;
    }

    public function ejecutarConsulta($consulta) {
        $resultado = $this->conexion->query($consulta);
        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ejecutarComando($comando) {
        return $this->conexion->exec($comando);
    }

    public function getConexion() {
        return $this->conexion;
    }
}
?>
