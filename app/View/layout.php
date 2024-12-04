<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$rol = isset($_SESSION['id_rol']) ? $_SESSION['id_rol'] : 3;

function MostrarMenu()
{
    echo '<div class="main-content" id="panel">
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav align-items-center ml-md-auto">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">';
                if (isset($_SESSION['nombre'])) {
                    echo '
                    <div class="media-body ml-2 d-none d-lg-block" style="display: flex; align-items: center;">
                        <span class="mb-0 text-sm font-weight-bold mr-2">' . htmlspecialchars($_SESSION['nombre']) . '</span>
                    </div>
                        <a href="../auth/logout.php">
                        <img alt="logout" src="https://cdn-icons-png.flaticon.com/512/1432/1432552.png" style="max-width: 30px; height: 30px;">
                    </a>';
                }
                else {
                    echo '
                    <div class="media-body ml-2 d-none d-lg-block">
                        <a href="../auth/login.php" class="nav-link">
                            <span class="nav-link-inner--text">Iniciar Sesión</span>
                        </a>
                    </div>';  
                }
                echo'
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>';
}

function MostrarNav()
{
    global $rol;
   if($rol == 1 || $rol == 2) {
    echo '
        <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
            <div class="scrollbar-inner">
                <div class="navbar-inner">
                    <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                        <hr class="my-3">
                        <h6 class="navbar-heading p-0 text-muted">
                            <span class="docs-normal">Biblioteca</span>
                        </h6>
                            <li class="nav-item">
                            Libros
                                <a class="nav-link" href="../productos/productos.php">
                                    <i class="ni ni-box-2 text-primary"></i>
                                    <span class="nav-link-text">Todos los libros</span>
                                </a>
                            </li>';
                            if ($rol == 1) {
                                echo '
                                <li class="nav-item">
                                    <a class="nav-link" href="../productos/productosCrud.php">
                                        <i class="ni ni-box-2 text-primary"></i>
                                        <span class="nav-link-text">Agregr libro</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../productos/listaProductos.php">
                                        <i class="ni ni-box-2 text-primary"></i>
                                        <span class="nav-link-text">Lista de libros</span>
                                    </a>
                                </li>';
                            }
                            echo'
                        </ul>';
                        if ($rol == 1) {
                            echo '
                            <h6 class="navbar-heading p-0 text-muted">
                                <span class="docs-normal">Prestamos de libros</span>
                            </h6>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="../prestamos/prestamo.php">
                                        <i class="ni ni-bullet-list-67 text-primary"></i>
                                        <span class="nav-link-text">Lista de prestamos</span>
                                    </a>
                                </li>
                            </ul>
                            <h6 class="navbar-heading p-0 text-muted">
                                <span class="docs-normal">Devoluciones</span>
                            </h6>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="/RopayMedia/app/View/Usuarios/listarUsuarios.php">
                                        <i class="ni ni-bullet-list-67 text-primary"></i>
                                        <span class="nav-link-text">Lista de devoluciones</span>
                                    </a>
                                </li>
                            </ul>';
                        }
                        echo'
                        <h6 class="navbar-heading p-0 text-muted">
                            <span class="docs-normal">Mis libros</span>
                        </h6>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="miscompras.php">
                                    <i class="ni ni-bullet-list-67 text-primary"></i>
                                    <span class="nav-link-text">Libros Reservados</span>
                                </a>
                            </li>';
                            echo'
                        </ul>
                    </div>
                </div>
            </div>
        </nav>';
    } else {
        echo '
        <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
            <div class="scrollbar-inner">
                <div class="navbar-inner">
                    <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                        <hr class="my-3">
                        <h6 class="navbar-heading p-0 text-muted">
                            <span class="docs-normal">Biblioteca</span>
                        </h6>
                            <li class="nav-item">
                            Libros
                                <a class="nav-link" href="../productos/productos.php">
                                    <i class="ni ni-box-2 text-primary"></i>
                                    <span class="nav-link-text">Todos los libros</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>';
    }
}


function HeadCSS()
{
    echo '
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
      <meta name="author" content="Creative Tim">

      <title>Ropa y 1/2</title>
      <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
      <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
      <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
      <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">      
      <link rel="stylesheet" href="../dist/css/styles.css">   
    </head>';
}

function HeadAuth()
{
    echo '
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
        <meta name="author" content="Creative Tim">
        <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
        <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
        <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
        <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
    </head>';
}



