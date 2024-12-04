<?php
include_once '../layout.php';
include_once '../../Model/prestamoModel.php';
include_once '../../Controller/PrestamoController/prestamoController.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


$nombreUsuario = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : '';
$prestamoController = new prestamoController();
$prestamos = $prestamoController->listarPrestamos();

?>


<!DOCTYPE html>
<html>

<?php 
HeadCSS();
?>

<body class="d-flex flex-column min-vh-100">

<?php 
MostrarNav();
MostrarMenu();
?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Lista de prestamos</h1>

    <?php if (!empty($mensaje)): ?>
        <div class="alert alert-<?php echo $tipo; ?>" role="alert">
            <?php echo $mensaje; ?>
        </div>
    <?php endif; ?>
    
    <!-- Tabla de prestamos -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">prestamos Creadas</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Usuario</th>
                        <th>Libro</th>
                        <th>Fecha del Prestamo</th>
                        <th>Acción</th>
                        
                     
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($prestamos)): ?>
                    <?php foreach ($prestamos as $index => $prestamo): ?>
                        <tr>
                            <td><?php echo $index + 1; ?></td>
                            <td>
                               
                                <?php 
                                echo isset($prestamo['usuario_nombre']) 
                                    ? htmlspecialchars($prestamo['usuario_nombre']) 
                                    : 'Cliente no disponible'; 
                                ?>
                            </td>
                            <td>
                                <?php 
                                echo isset($prestamo['libro_nombre']) 
                                    ? htmlspecialchars($prestamo['libro_nombre']) 
                                    : 'Pedido no disponible'; 
                                ?>

                            </td>                          
                            <td>
                                <?php 
                               
                               if (!empty($prestamo['fechaPrestamo'])) {
                                $fecha = DateTime::createFromFormat('Y-m-d H:i:s', $prestamo['fechaPrestamo']);
                                if ($fecha) {
                                    echo htmlspecialchars($fecha->format('d-m-Y H:i:s')); // Formato deseado en la vista
                                } else {
                                    echo 'Formato de fecha inválido';
                                }
                            } else {
                                echo 'Fecha no disponible';
                            }
                            
                            ?>
                               
                            </td>
                            <td>
                            <form method="POST" action="devolucionlibro.php" class="d-inline">
                                    <input type="hidden" name="id_prestamo" value="<?php echo $prestamo['_id']; ?>">
                                    <input type="hidden" name="libro_nombre" value="<?php echo $prestamo['libro_nombre']; ?>">
                                    <input type="hidden" name="usuario_nombre" value="<?php echo $prestamo['usuario_nombre']; ?>">
                                    <input type="hidden" name="libro_id" value="<?php echo $prestamo['libro_id']; ?>">
                                    <button type="submit" name="accion" value="Eliminar" class="btn btn-primary btn-sm">Devolver</button>
                                </form>
                            </td>
                           
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">No hay prestamos registradas.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    <?php if (!empty($mensaje)): ?>
        Swal.fire({
            icon: '<?php echo $tipo; ?>',
            title: '<?php echo $mensaje; ?>',
            showConfirmButton: false,
            timer: 2000
        });
    <?php endif; ?>
</script>

<script src="assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/js-cookie/js.cookie.js"></script>
<script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<script src="assets/js/argon.js?v=1.2.0"></script>
</body>

</html>
