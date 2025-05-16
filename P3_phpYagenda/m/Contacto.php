<?php
// m/Contacto.php
include_once("AccesoDatos.php");

class Contacto {
    public static function obtenerTodos() {
        $bd = new AccesoDatos();
        $bd->conectar();
        
        $sql = "SELECT * FROM contactos";
        $resultado = $bd->ejecutarConsulta($sql);
        
        $bd->desconectar();
        return $resultado;
    }

    public static function obtenerPorUsuario($idUsuario) {
        $bd = new AccesoDatos();
        $bd->conectar();
        
        $sql = "SELECT * FROM contactos WHERE id_usuario = :id_usuario";
        $stmt = $bd->getConexion()->prepare($sql);
        $stmt->bindParam(':id_usuario', $idUsuario, PDO::PARAM_INT);
        $stmt->execute();
        
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $bd->desconectar();
        return $resultado;

    }


    public static function obtenerPorId($id) {
        $bd = new AccesoDatos();
        $bd->conectar();
        
        $sql = "SELECT * FROM contactos WHERE id = :id";
        $stmt = $bd->getConexion()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        $bd->desconectar();
        return $resultado;
    }
    
    //CRUD-------------------------------------------------------------------------------------------
    
        public static function agregar($nombre, $direccion, $telefono, $email, $id_usuario) {
        $bd = new AccesoDatos();
        $bd->conectar();
        
        $sql = "INSERT INTO contactos (nombre, direccion, telefono, email, id_usuario) 
                VALUES (:nombre, :direccion, :telefono, :email, :id_usuario)";
        
        $stmt = $bd->getConexion()->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':id_usuario', $id_usuario);
        
        $resultado = $stmt->execute();
        $bd->desconectar();
        return $resultado;
    }

public static function actualizar($id, $nombre, $direccion, $telefono, $email, $id_usuario) {
    $bd = new AccesoDatos();
    $bd->conectar();
    
    $sql = "UPDATE contactos SET 
            nombre = :nombre, 
            direccion = :direccion, 
            telefono = :telefono, 
            email = :email,
            id_usuario = :id_usuario 
            WHERE id = :id";
    
    $stmt = $bd->getConexion()->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':direccion', $direccion);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':id_usuario', $id_usuario);
    
    $resultado = $stmt->execute();
    $bd->desconectar();
    return $resultado;
}

    public static function eliminar($id) {
        $bd = new AccesoDatos();
        $bd->conectar();
        
        $sql = "DELETE FROM contactos WHERE id = :id";
        $stmt = $bd->getConexion()->prepare($sql);
        $stmt->bindParam(':id', $id);
        
        $resultado = $stmt->execute();
        $bd->desconectar();
        return $resultado;
    }
}
?>
