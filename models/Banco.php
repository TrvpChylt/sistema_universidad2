<?php
require_once __DIR__ . '/../config/conexion.php';

class Banco {
    private $db;

    public function __construct() {
        // Usamos la conexión global que definimos en conexion.php
        global $conexion;
        $this->db = $conexion;
    }

    // Método para obtener todos los bancos (para la tabla)
    public function obtenerTodos() {
        $sql = "SELECT * FROM bancos ORDER BY id DESC";
        $resultado = $this->db->query($sql);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    // Método para registrar un nuevo banco (para el formulario)
    public function registrar($codigo, $nombre) {
        $sql = "INSERT INTO bancos (numero_banco, nombre_banco, tipo_cuenta, titular) VALUES (?, ?, '', '')";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ss", $codigo, $nombre); 
        return $stmt->execute();
    }
}