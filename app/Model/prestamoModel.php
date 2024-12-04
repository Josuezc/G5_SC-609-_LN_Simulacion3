<?php
      require_once $_SERVER['DOCUMENT_ROOT'] . "/G5_SC-609-_LN_Simulacion3/vendor/autoload.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/G5_SC-609-_LN_Simulacion3/app/Model/baseDatosModel.php";

    class prestamoModel {
        private $conexion;

        public function __construct() {
            $this->conexion = new Conexion();  //Crear la conexión
        }

        public function listarPrestamos() {
            try {
                $db = $this->conexion->conectar();
                if ($db === null) {
                    return [];
                }
                
                $prestamosCollection = $db->prestamo; 
                $prestamos = $prestamosCollection->find(); 
                
                $listaPrestamos = [];
                foreach ($prestamos as $prestamo) {
                    $fechaPrestamo = null;
                    if (isset($prestamo['fechaPrestamo']) && !empty($prestamo['fechaPrestamo'])) {
                        $fechaPrestamo =$prestamo['fechaPrestamo']; // Mantén el formato como string
                       
                    } else {
                        $fechaPrestamo = null; 
                    } 
                        $usuariosCollection = $db->usuario; 
                        $usuarios = $usuariosCollection->find(['_id' => $prestamo['usuario_id']]); 
                
                        foreach ($usuarios as $usuario) {  
    
                            $nombre=$usuario['nombre'];
            
                                }
                                $librosCollection = $db->libro; 
                                $libros = $librosCollection->find(['_id' => $prestamo['libro_id']]); 
                                foreach ($libros as $libro) {  
            
                                    $nombrelibro=$libro['nombre'];
                    
                                        }
                     $listaPrestamos[] = [
                        '_id' => $prestamo['_id'],
                        'usuario_nombre' => $nombre,
                        'libro_nombre' => $nombrelibro, 
                       'fechaPrestamo' =>  $fechaPrestamo,
                       'libro_id'=>  $prestamo['libro_id']
                        
                    ];
                }
            
                return $listaPrestamos;
                
        
            } catch (\Exception $e) {
                
                error_log("Error al obtener préstamos: " . $e->getMessage());
                    
                
                return [];
            }
        
        }

        public function creardevolucion($ndevolucion) {
            try {
                $db = $this->conexion->conectar();
                if ($db === null) {
                    return false;
                }
    
                $devolucionesCollection = $db->devoluciones;
                $devolucionesCollection->insertOne($ndevolucion); // Insertar el producto en la colección
                return true;
            } catch (\Exception $e) {
                return false;
            }
        }

        public function actualizarlibro($id,$dato) {
            try {
                $db = $this->conexion->conectar();
                if ($db === null) {
                    return false;
                }
    
                $libroCollection = $db->libro;
                $libroCollection->updateOne(
                    ['_id' => (int)$id], // Filtro
                    ['$set' => $dato] // Datos a actualizar
                );
                return true;
            } catch (\Exception $e) {
                return false;
            }
        }

        public function eliminarprestamo($idprestamo) {
            try {
                $db = $this->conexion->conectar();
                if ($db === null) {
                    return false;
                }
    
                $prestamosCollection = $db->prestamo;
                $prestamosCollection->deleteOne(['_id' => (int)$idprestamo]); 
                return true;
            } catch (\Exception $e) {
                return false;
            }
        }

       
        
    }
?>
