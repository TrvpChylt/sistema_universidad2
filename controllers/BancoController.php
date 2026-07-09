<?php
ini_set('display_errors', 0); 
error_reporting(E_ALL);

header('Content-Type: application/json');
require_once __DIR__ . '/../models/Banco.php';

class BancoController {
    private $modelo;

    public function __construct() {
        $this->modelo = new Banco();
    }

    public function procesarPeticion() {
        $metodo = $_SERVER['REQUEST_METHOD'];

        if ($metodo === 'POST') {
            $jsonInput = file_get_contents('php://input');
            $datos = json_decode($jsonInput, true);
            $accion = $datos['action'] ?? '';

            if ($accion === 'crear') {
                $this->guardar($datos);
            } elseif ($accion === 'eliminar') {
                $this->borrar($datos);
            } elseif ($accion === 'actualizar') {
                $this->modificar($datos);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Acción no permitida']);
            }
        } elseif ($metodo === 'GET') {
            $this->listar();
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Método no soportado']);
        }
    }

    private function guardar($datos) {
        $codigo = $datos['numero_banco'] ?? '';
        $nombre = $datos['nombre_banco'] ?? '';
        $tipo_cuenta = $datos['tipo_cuenta'] ?? '';
        $titular = $datos['titular'] ?? '';

        if (!empty($codigo) && !empty($nombre) && !empty($tipo_cuenta) && !empty($titular)) {
            $resultado = $this->modelo->registrar($codigo, $nombre, $tipo_cuenta, $titular);
            if ($resultado) {
                echo json_encode(['status' => 'success', 'message' => 'Banco registrado exitosamente']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Error en la base de datos']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Campos vacíos']);
        }
        exit;
    }

    private function borrar($datos) {
        $id = $datos['id'] ?? '';
        if (!empty($id)) {
            $resultado = $this->modelo->eliminar($id);
            if ($resultado) {
                echo json_encode(['status' => 'success', 'message' => 'Banco eliminado correctamente']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'No se pudo eliminar']);
            }
        }
        exit;
    }

    private function modificar($datos) {
        $id = $datos['id'] ?? '';
        $codigo = $datos['numero_banco'] ?? ''; 
        $nombre = $datos['nombre_banco'] ?? '';
        $tipo_cuenta = $datos['tipo_cuenta'] ?? '';
        $titular = $datos['titular'] ?? '';

        if (!empty($id) && !empty($codigo) && !empty($nombre) && !empty($tipo_cuenta) && !empty($titular)) {
            $resultado = $this->modelo->actualizar($id, $codigo, $nombre, $tipo_cuenta, $titular);
            if ($resultado) {
                echo json_encode(['status' => 'success', 'message' => 'Banco actualizado de forma exitosa']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'No se realizaron cambios en el registro o error en SQL']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Faltan campos obligatorios para actualizar']);
        }
        exit;
    }

    private function listar() {
        $bancos = $this->modelo->obtenerTodos();
        echo json_encode($bancos);
        exit;
    }
}

$controller = new BancoController();
$controller->procesarPeticion();