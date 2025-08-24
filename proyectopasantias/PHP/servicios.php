<?php
require_once '../INCLUDES/Autenticacion.php';

$usuario = Auth::obtenerUsuario();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muebleria Módulo 23</title>
    <link rel="icon" href="./IMG/Logo4.png" type="image/png">
    <link rel="stylesheet" href="../BOOTSTRAP_v5.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/servicios.css">
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
                                <a class="nav-link active" href="./nuestrotrabajo.php">Nuestro Trabajo</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" href="./sobrenosotros.php">Sobre Nosotros</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" href="servicios.php">FAQs</a>
                            </li>

                            <!-- Verifica si hay una sesion activa , si lo hay se muestra el email y el boton para cerrar sesion
                            sino se muestras los botones default de iniciar sesion y registrarse-->

                            <?php if (Auth::esAdmin()): ?>
                                <li class="nav-item">
                                    <a class="nav-link active" href="./admin.php">Panel de Administrador</a>
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

                <h1 style="font-size: 35px;color: #C19A6B;">FAQs</h1>

            </div>

        </section>

        <!-- Bloque 1 -->

        <section class="bloque" style="padding-top: 5%;">

            <div class="container">

                <div class="animacion izquierda" style="margin-bottom:5%">

                    <h1 style="font-size: 35px; color: #C19A6B;"><b>¿ Lorem ipsum dolor sit amet consectetur, adipisicing elit.?</b></h1>

                    <p style="padding-top: 15px; font-size: 20px;font-family: Outfit-Light;">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Necessitatibus enim excepturi doloribus porro modi 
                    sunt quia! Debitis impedit eos voluptatibus officiis velit at, odit quasi blanditiis eum rem maxime quibusdam!
                    </p>

                </div>

                <div class="animacion derecha" style="margin-bottom:5%">

                    <h1 style="font-size: 35px; color: #C19A6B;"><b>¿ Lorem ipsum dolor sit amet consectetur, adipisicing elit.?</b></h1>

                    <p style="padding-top: 15px; font-size: 20px;font-family: Outfit-Light;">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Necessitatibus enim excepturi doloribus porro modi 
                    sunt quia! Debitis impedit eos voluptatibus officiis velit at, odit quasi blanditiis eum rem maxime quibusdam!
                    </p>

                </div>

                <div class="animacion izquierda" style="margin-bottom:5%">

                    <h1 style="font-size: 35px; color: #C19A6B;"><b>¿ Lorem ipsum dolor sit amet consectetur, adipisicing elit.?</b></h1>

                    <p style="padding-top: 15px; font-size: 20px;font-family: Outfit-Light;">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Necessitatibus enim excepturi doloribus porro modi 
                    sunt quia! Debitis impedit eos voluptatibus officiis velit at, odit quasi blanditiis eum rem maxime quibusdam!
                    </p>

                </div>

                <div class="animacion derecha" style="margin-bottom:5%">

                    <h1 style="font-size: 35px; color: #C19A6B;"><b>¿ Lorem ipsum dolor sit amet consectetur, adipisicing elit.?</b></h1>

                    <p style="padding-top: 15px; font-size: 20px;font-family: Outfit-Light;">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Necessitatibus enim excepturi doloribus porro modi 
                    sunt quia! Debitis impedit eos voluptatibus officiis velit at, odit quasi blanditiis eum rem maxime quibusdam!
                    </p>

                </div>

            </div>

        </section>

    </div>

    <!-- Pie de Pagina -->

    <footer>

        <!-- Copyright -->

        <div class="footer">
            <p>© 2025 Módulo 23. Todos los derechos reservados.</p>
            <p style="padding-left:10%;padding-right:10%">Sitio Desarrollado por Santiago Alcibar , Lautaro Cotti , Leonel Diaz y Felipe Eguiluz</p>
            <p><a class="btn" href="#top">Volver arriba ↑</a></p>
        </div>

    </footer>

</body>

<!-- Animaciones -->

<script>
    
    const elementos = document.querySelectorAll('.animacion');

    const observer = new IntersectionObserver((entradas) => {
        entradas.forEach((entrada) => {
        if (entrada.isIntersecting) {
            entrada.target.classList.add('visible');
        }
        else {
        entrada.target.classList.remove('visible');
        }
        });
    }, { threshold: 0.2 }); // 20% visible para activarse

    elementos.forEach(el => observer.observe(el));

</script>

<script src="../BOOTSTRAP_v5.3/js/bootstrap.bundle.min.js"></script>

</html>