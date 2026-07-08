<?php
require_once __DIR__ . '/../config/conexion.php';

class Banco {
    private $db;

    public function __construct() {
        // Usamos la conexión global definida en conexion.php
        global $conexion;
        $this->db = $conexion;
    }

    // 1. Método para obtener todos los bancos (READ)
    public function obtenerTodos() {
        $sql = "SELECT * FROM bancos ORDER BY id DESC";
        $resultado = $this->db->query($sql);
        
        if ($resultado) {
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }
        return [];
    }

    // 2. Método para registrar un nuevo banco (CREATE)
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

    // 3. NUEVO: Método para Actualizar los datos de un Banco (UPDATE)
    public function actualizar($id, $codigo, $nombre, $tipo_cuenta, $titular) {
        // El ID va al FINAL de la consulta para el filtro WHERE id = ?
        $sql = "UPDATE bancos SET numero_banco = ?, nombre_banco = ?, tipo_cuenta = ?, titular = ? WHERE id = ?";
        
        $stmt = $this->db->prepare($sql);
        
        if ($stmt) {
            // Pasamos 4 strings ("ssss") para los campos de texto y 1 entero ("i") para el id al final -> "ssssi"
            $stmt->bind_param("ssssi", $codigo, $nombre, $tipo_cuenta, $titular, $id);
            $ejecucion = $stmt->execute();
            $stmt->close();
            return $ejecucion; // Retorna true si se actualizó correctamente
        }
        
        return false;
    }

    // 4. NUEVO: Método para Eliminar un Banco (DELETE)
    public function eliminar($id) {
        $sql = "DELETE FROM bancos WHERE id = ?";
        
        $stmt = $this->db->prepare($sql);
        
        if ($stmt) {
            // Pasamos "i" de entero para vincular el ID del registro
            $stmt->bind_param("i", $id);
            $ejecucion = $stmt->execute();
            $stmt->close();
            return $ejecucion; // Retorna true si se eliminó correctamente
        }
        
        return false;
    }
}