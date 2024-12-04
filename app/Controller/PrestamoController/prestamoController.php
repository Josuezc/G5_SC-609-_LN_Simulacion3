<?php
include_once '../layout.php';
include_once '../../Model/prestamoModel.php';

class prestamoController {
    private $prestamoModel;
public function listarPrestamos() {
    return $this->prestamoModel->listarPrestamos();
}
public function __construct() {
    $this->prestamoModel = new prestamoModel();
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}
public function devolucion($usuario_id, $libro_id) {
    $devolucion = [
        'id_devolucion' => time(),
        'usuario_id' => $usuario_id,
        'libro_id' => $libro_id,
        'fechaDevolucion' => date('Y-m-d H:i:s')
       
    ];

    if ($this->prestamoModel->creardevolucion($devolucion)) {
        $_SESSION['mensaje'] = "devolucion agregado exitosamente.";
    } else {
        $_SESSION['mensaje'] = "Error al agregar la devolucion.";
    }
}

public function updatelibroestado($id) {
    $dato = [
        'estado' => 1
    ];

    if ($this->prestamoModel->actualizarlibro($id, $dato)) {
        $_SESSION['mensaje'] = "libro actualizado exitosamente.";
    } else {
        $_SESSION['mensaje'] = "Error al actualizar el libro.";
    }
}

public function eliminarprestamo($id) {
    if (empty($id)) {
        $_SESSION['mensaje'] = "Error: No se recibió el ID del prestamo.";
        return;
    }

    if ($this->prestamoModel->eliminarprestamo($id)) {
        $_SESSION['mensaje'] = "prestamo eliminado exitosamente.";
    } else {
        $_SESSION['mensaje'] = "Error al eliminar el prestamo.";
    }
}
}
?>