<?php
require_once __DIR__ . '/../config/conexion.php';

class Banco {
    private $db;

    public function __construct() {
        global $conexion;
        $this->db = $conexion;
    }

    public function obtenerTodos() {
        $sql = "SELECT * FROM bancos ORDER BY id DESC";
        $resultado = $this->db->query($sql);
        
        if ($resultado) {
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }
        return [];
    }

    public function registrar($codigo, $nombre, $tipo_cuenta, $titular) {
        $sql = "INSERT INTO bancos (numero_banco, nombre_banco, tipo_cuenta, titular) VALUES (?, ?, ?, ?)";
        
        $stmt = $this->db->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param("ssss", $codigo, $nombre, $tipo_cuenta, $titular);
            $ejecucion = $stmt->execute();
            $stmt->close();
            return $ejecucion;
        }
        
        return false;
    }

    public function actualizar($id, $codigo, $nombre, $tipo_cuenta, $titular) {
  
        $sql = "UPDATE bancos SET numero_banco = ?, nombre_banco = ?, tipo_cuenta = ?, titular = ? WHERE id = ?";
        
        $stmt = $this->db->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param("ssssi", $codigo, $nombre, $tipo_cuenta, $titular, $id);
            $ejecucion = $stmt->execute();
            $stmt->close();
            return $ejecucion;
        }
        
        return false;
    }

    public function eliminar($id) {
        $sql = "DELETE FROM bancos WHERE id = ?";
        
        $stmt = $this->db->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param("i", $id);
            $ejecucion = $stmt->execute();
            $stmt->close();
            return $ejecucion; 
        }
        
        return false;
    }
}