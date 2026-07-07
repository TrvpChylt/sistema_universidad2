<?php
require_once __DIR__ . '/../models/Banco.php';

class BancoController {
    private $modelo;

    public function __construct() {
        $this->modelo = new Banco();
    }

    // Manejar la petición principal
    public function index() {
        // Si viene una petición POST, significa que se envió el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'crear') {
            $this->guardar();
        }

        // Obtener los datos para la tabla
        $bancos = $this->modelo->obtenerTodos();

        // Cargar la vista pasándole los datos
        require_once __DIR__ . '/../views/bancos/Formulario.php';
    }

    // Procesar el guardado del formulario
    private function guardar() {
        $codigo = $_POST['codigo'] ?? '';
        $nombre = $_POST['nombre'] ?? '';
        $telefono = $_POST['telefono'] ?? '';

        if (!empty($codigo) && !empty($nombre)) {
            $this->modelo->registrar($codigo, $nombre, $telefono);
            // Redireccionamos para evitar que se duplique el registro al recargar la página
            header("Location: BancoController.php");
            exit;
        }
    }
}

// Inicializar el controlador inmediatamente al invocar el archivo
$controller = new BancoController();
$controller->index();