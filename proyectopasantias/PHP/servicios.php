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
                                <a class="nav-link active" href="servicios.php">Servicios</a>
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

                <h1 style="font-size: 35px;color: #C19A6B;">Servicios</h1>

            </div>

        </section>

        <!-- Bloque 1 -->

        <section class="bloque" style="padding-top: 5%;">

            <div class="container">

                <div class="row text-center" id="titulo" style="margin-top: 3%;">

                    <div class="col-lg-4 animacion arriba">
                        
                        <div style="margin-bottom: 3%;">
                            <img src="../IMG/mesanordica.jpg" class="img-fluid" id="mesa" style="width: 70%; margin-bottom: 4%;">
                            <h1 style="font-size: 35px; color: #C19A6B;margin-bottom: 3%;" >Mesas</h1>

                        </div>         

                        <p style="font-size: 20px;">
                        Mesas diseñadas para reunir a la familia, con calidad, estilo y funcionalidad para compartir y crear recuerdos en tu hogar.
                        </p>

                    </div>

                    <div class="col-lg-4 animacion arriba">

                        <img src="../IMG/silla.jpg" class="img-fluid" id="silla" style="width: 70%; margin-bottom: 4%;">
                        <h1 style="font-size: 35px; color: #C19A6B;margin-bottom: 3%;" >Sillas</h1>

                        <p style="font-size: 20px;">
                           Diseños cómodos y resistentes, ideales para la familia. Estilo y practicidad para crear espacios acogedores todos los días.
                        </p>
                        
                    </div>

                    <div class="col-lg-4 animacion arriba">
                        <img src="../IMG/armario.jpg" class="img-fluid" id="armario" style="width: 70%; margin-bottom: 4%;">
                        <h1 style="font-size: 35px; color: #C19A6B;margin-bottom: 3%;" >Armarios</h1>

                        <p style="font-size: 20px;">
                           Espaciosos y funcionales, nuestros armarios de madera mantienen tu hogar organizado con el estilo cálido que tu familia merece.
                        </p>

                    </div>

                </div>

            </div>

            <div class="container" style="margin-top: 5%;">

                <div class="row text-center">

                    <div class="col-lg-4 animacion arriba">
                        
                        <div style="margin-bottom: 3%;">
                            <img src="../IMG/velador.jpg" class="img-fluid" id="velador" style="width: 70%; margin-bottom: 4%;">
                            <h1 style="font-size: 35px; color: #C19A6B;margin-bottom: 3%;" >Mesas de Luz</h1>

                        </div>         

                        <p style="font-size: 20px;">
                           Prácticos y acogedores, ideales para acompañar tus noches y mantener lo esencial siempre a mano.
                        </p>

                    </div>

                    <div class="col-lg-4 animacion arriba">
                        <img src="../IMG/repisa.jpg" class="img-fluid" id="repisa" style="width: 70%; margin-bottom: 4%;">
                        <h1 style="font-size: 35px; color: #C19A6B;margin-bottom: 3%;" >Repisas</h1>

                        <p style="font-size: 20px;">
                           Versátiles y resistentes, perfectas para ordenar o decorar, dando un toque natural y familiar a cada rincón.
                        </p>
                        
                    </div>

                    <div class="col-lg-4 animacion arriba">
                        <img src="../IMG/comoda.jpg" class="img-fluid" id="comoda" style="width: 70%; margin-bottom: 4%;">
                        <h1 style="font-size: 35px; color: #C19A6B;margin-bottom: 3%;" >Comodas</h1>

                        <p style="font-size: 20px;">
                            Diseñadas para la vida diaria, combinan capacidad, resistencia y un estilo atemporal que se adapta a cualquier habitación.
                        </p>

                    </div>

                </div>

            </div>

        </section>

    </div>

    <!-- Pie de Pagina -->

    <footer>

        <!-- Copyright -->

        <div class="footer">
            <p>© 2025 Módulo 23. Todos los derechos reservados.</p>
            <p>Sitio Desarrollado por Santiago Alcibar , Lautaro Cotti , Leonel Diaz y Felipe Eguiluz</p>
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