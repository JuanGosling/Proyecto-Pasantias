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
    <link rel="icon" href="../IMG/Logo4.png" type="image/png">
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

        <section class="bloque" >

            <div class="container">

                <div class="animacion izquierda" id="pregunta" >

                    <h1 style="font-size: 35px; color: #C19A6B;"><b>¿Puedo comprar directamente desde la página web?</b></h1>

                    <p style="padding-top: 15px; font-size: 20px;font-family: Outfit-Light;">
                     No, nuestra página funciona únicamente como un catálogo digital para mostrar nuestros productos. Para realizar compras, debes comunicarte con nosotros
                    </p>

                </div>

                <div class="animacion derecha" id="pregunta">

                    <h1 style="font-size: 35px; color: #C19A6B;"><b>¿Venden al público en general o solo a mayoristas?</b></h1>

                    <p style="padding-top: 15px; font-size: 20px;font-family: Outfit-Light;">
                   Somos una empresa mayorista, por lo que nuestras ventas están dirigidas exclusivamente a comercios, distribuidores y profesionales del rubro.
                    </p>

                </div>

                <div class="animacion izquierda" id="pregunta">

                    <h1 style="font-size: 35px; color: #C19A6B;"><b>¿Los productos que aparecen en la web siempre están en stock?</b></h1>

                    <p style="padding-top: 15px; font-size: 20px;font-family: Outfit-Light;">
                   El catálogo refleja los modelos que trabajamos habitualmente, pero la disponibilidad puede variar. Te recomendamos contactarte con nosotros para tener mas detalles.
                    </p>

                </div>

                <div class="animacion derecha" id="pregunta">

                    <h1 style="font-size: 35px; color: #C19A6B;"><b>¿Cómo puedo solicitar una cotización o más información?</b></h1>

                    <p style="padding-top: 15px; font-size: 20px;font-family: Outfit-Light;">
                    Podés ponerte en contacto con nosotros a través de nuestro boton de contacto una vez que hayas Iniciado Sesion,ahi tendras nuestro teléfono, WhatsApp o correo electrónico. Nosotros te brindararemos toda la información necesaria.
                    </p>

                </div>

            </div>

        </section>

    </div>

    <!-- Pie de Pagina -->

    <div class="footer">

        <p>© 2025 Módulo 23. Todos los derechos reservados.</p>
        <p style="padding-left:10%;padding-right:10%">Sitio Desarrollado por Santiago Alcibar , Lautaro Cotti , Leonel Diaz y Felipe Eguiluz</p>
        <p><a class="btn" href="#top" >Volver arriba ↑</a></p>

    </div>

</body>

<!-- Boton de Contacto -->

<div id="contacto-btn" onclick="toggleContacto()">
        <a class="btn"><b>📞 Contacto</b></a>
</div>

<!-- Panel De Informacion -->

<div id="contacto-panel" style="display:none; text-align:center">
    <span id="cerrar-contacto" onclick="toggleContacto()">&times;</span>
    <?php if (isset($_SESSION['Usuario'])): ?>
        <h5 style="color: #C19A6B; font-size:20px;padding-bottom:10px"><b>Información de Contacto</b></h5>
        <p><b style="color: #C19A6B;">Email:</b> </p>
        <p>soporte@modulo23.com</p>
        <p><b style="color: #C19A6B;">Teléfono:</b></p>
        <p> +54 223 123-4567</p>
        <p><b style="color: #C19A6B;">WhatsApp</b></p>
        <p>Link</p>
    <?php else: ?>
        <p class="alert alert-warning" role="alert">Debes <a href="./PHP/login.php">Iniciar Sesión</a> para ver la información de contacto.</p>
    <?php endif; ?>
</div>

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

    // Animacion del Panel de Informacion

    function toggleContacto() {
        const panel = document.getElementById('contacto-panel');
        panel.style.display = (panel.style.display === 'block') ? 'none' : 'block';
    }

</script>

<script src="../BOOTSTRAP_v5.3/js/bootstrap.bundle.min.js"></script>

</html>