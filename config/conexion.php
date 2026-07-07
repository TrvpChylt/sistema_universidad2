<?php
$servidor = "Localhost"; 
$usuario = "root";
$password = "";
$base_datos = "gestionmaestra"; 


$conexion = new mysqli($servidor, $usuario, $password, $base_datos);

// Verificar de forma estricta si la conexión falló
if ($conexion->connect_error) {

    die("Error crítico de conexión: " . $conexion->connect_error);
}

?>