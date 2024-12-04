<?php
include_once '../../Controller/PrestamoController/prestamoController.php';
$prestamoController = new prestamoController();
$prestamoController->devolucion($_POST ['usuario_nombre'],$_POST ['libro_nombre']);
$prestamoController->updatelibroestado($_POST ['libro_id']);
$prestamoController->eliminarprestamo($_POST ['id_prestamo']);
header("Location:prestamo.php");
exit();
?>