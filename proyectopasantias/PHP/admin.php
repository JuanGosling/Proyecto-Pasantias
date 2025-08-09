<?php
require_once '../INCLUDES/Autenticacion.php';
require_once '../INCLUDES/Item.php';

// Solo admin puede acceder
if (!Auth::esAdmin()) {
    header("Location: ./login.php");
    exit;
}

$item = new Item();
$items = $item->obtenerTodos();
$usuario = Auth::obtenerUsuario();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="../BOOTSTRAP_v5.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/admin.css">
</head>
<body>
    
    <!-- Barra de Navegacion -->

        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
            
            <!-- Script para Cambiar el Color -->

            <script>

                const navbar = document.querySelector('.navbar');
                window.addEventListener('scroll', () => {
                    if (window.scrollY > 50) {
                    navbar.style.backgroundColor = '#212529';
                    }
                    else {
                    navbar.style.backgroundColor = 'transparent';
                    }
                });

            </script>

            <!-- Fin del Script para Cambiar el Color -->

            <div class="container">

                <a class="navbar-brand" style="font-family: Outfit;font-size: 30px;padding-top: 10px;">Módulo 23</a>

                <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>

                    <div class="offcanvas-body ">

                        <ul class="navbar-nav ms-auto">

                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="../index.php">Inicio</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" href="./servicios.php">Servicios</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" href="./nuestrotrabajo.php">Nuestro Trabajo</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" href="./sobrenosotros.php">Sobre Nosotros</a>
                            </li>

                            <!-- Verifica si hay una sesion activa , si lo hay se muestra el email y el boton para cerrar sesion
                            sino se muestras los botones default de iniciar sesion y registrarse-->

                            <?php if (Auth::esAdmin()): ?>
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">Panel de Administrador</a>
                                </li>
                            <?php endif; ?>

                            <?php if (isset($_SESSION['Usuario'])): ?>

                            <li class="nav-item dropdown">

                                <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #C19A6B;">
                                <?= htmlspecialchars($usuario['Nombre']) ?><img src="../IMG/user.png" class="icono">
                                </a>
                                
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Mi Perfil</a></li>
                                    <li><a class="dropdown-item" href="#">Cambiar Contraseña</a></li>
                                    <li><a class="dropdown-item" href="./cerrarsesion.php">Cerrar Sesion</a></li>
                                </ul>

                            </li>

                            <?php else: ?>

                            <li class="nav-item">
                                <a class="btn" href="login.php">Iniciar Sesion</a>
                            </li>

                            <li class="nav-item">
                                <a class="btn" href="register.php">Registrarse</a>
                            </li>

                            <?php endif; ?>

                        </ul>

                    </div>

                </div>

                <button class="navbar-toggler " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation" style="background-color: #C19A6B;">
                    <span class="navbar-toggler-icon"></span>
                </button>

            </div>

        </nav>

    <!-- Contenedor de los Bloques (Sections) -->

    <div class="contenedor">

        <!-- Bloque Principal -->

        <section class="bloqueprincipal" style="justify-content: center;">

            <div >

                <h1 style="font-size: 35px;color: #C19A6B;">Bienvenido al Panel de Administrador!</h1>

            </div>

        </section>

        <!-- Bloque 1 -->

        <section class="bloque" style="padding-top: 5%;padding-bottom:3%">

            <h1 style="font-size: 35px;text-align: center;margin-bottom: 1%;" id="titulo">En el Panel de Administrador vas a poder ver , agregar , modificar y quitar Artículos.</h1>

        </section>

        <section class="bloque" style="padding-top:0%">

            <div class="container-fluid">
                <div class="row">
                    <!-- Menú lateral -->
                    <div class="col-md-2 bg-dark text-white p-3">
                        <h4>Opciones</h4>
                        <ul class="nav flex-column">
                            <li class="nav-item"><a href="agregar.php" class="btn">Agregar Artículo</a></li>
                        </ul>
                    </div>

                    <!-- Contenido principal -->
                    <div class="col-md-10 p-4">
                        <h2>Listado de Artículos</h2>
                        <div class="row">
                            <?php foreach ($items as $i): ?>
                                <div class="col-md-4 mb-4">
                                    <div class="card h-100">
                                        <?php if ($i['imagen']): ?>
                                            <img src="../uploads<?= htmlspecialchars($i['imagen']) ?>" class="card-img-top" alt="Imagen">
                                        <?php else: ?>
                                            <div class="bg-secondary text-white text-center p-5">Sin imagen</div>
                                        <?php endif; ?>
                                        <div class="card-body" style="background-color: #C19A6B; color: #ffffff;font-family: Outfit;">
                                            <h5 class="card-title"><?= htmlspecialchars($i['titulo']) ?></h5>
                                            <p class="card-text"><?= nl2br(htmlspecialchars($i['descripcion'])) ?></p>
                                        </div>
                                        <div class="card-footer text-end">
                                            <a href="editar.php?id=<?= $i['id'] ?>" style="background-color: #6bc16bff;" class="btn btn-sm btn-primary">Editar</a>
                                            <a href="eliminar.php?id=<?= $i['id'] ?>" style="background-color: #c16b6bff;" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este ítem?')">Eliminar</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </div>

    <!-- Pie de Pagina -->

    <footer>

        <!-- Copyright -->

        <div class="footer">
            <p>© 2025 Nombre de la empresa. Todos los derechos reservados.</p>
            <p><a class="btn" href="#top">Volver arriba ↑</a></p>
        </div>

    </footer>

</body>

<script src="../BOOTSTRAP_v5.3/js/bootstrap.bundle.min.js"></script>

</html>