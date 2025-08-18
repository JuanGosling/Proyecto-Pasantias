<?php
require_once 'includes/Autenticacion.php';

$usuario = Auth::obtenerUsuario();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carpinteria Módulo 23</title>
    <link rel="stylesheet" href="./BOOTSTRAP_v5.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="./CSS/index.css">
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
                                <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" href="./PHP/servicios.php">Servicios</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" href="./PHP/nuestrotrabajo.php">Nuestro Trabajo</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" href="./PHP/sobrenosotros.php">Sobre Nosotros</a>
                            </li>

                            <!-- Verifica si hay una sesion activa , si lo hay se muestra el Usuario y el boton para cerrar sesion
                            sino se muestras los botones default de iniciar sesion y registrarse-->

                            <?php if (Auth::esAdmin()): ?>
                                <li class="nav-item">
                                    <a class="nav-link active" href="./PHP/admin.php">Panel de Administrador</a>
                                </li>
                            <?php endif; ?>

                            <?php if (isset($_SESSION['Usuario'])): ?>

                            <li class="nav-item dropdown">

                                <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #C19A6B;">
                                <?= htmlspecialchars($usuario['Nombre']) ?><img src="./IMG/user.png" class="icono">
                                </a>
                                
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Mi Perfil</a></li>
                                    <li><a class="dropdown-item" href="#">Cambiar Contraseña</a></li>
                                    <li><a class="dropdown-item" href="./PHP/cerrarsesion.php">Cerrar Sesion</a></li>
                                </ul>

                            </li>

                            <?php else: ?>

                            <li class="nav-item">
                                <a class="btn" href="./PHP/login.php">Iniciar Sesion</a>
                            </li>

                            <li class="nav-item">
                                <a class="btn" href="./PHP/register.php">Registrarse</a>
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

        <section class="bloqueprincipal">

            <div id="divespacio" style="animation: slideInLeft 1s ease-out forwards;">

                <h1  style="font-size: 35px;">En <b style="color: #C19A6B;">Módulo 23</b> creemos que cada hogar merece calidad</h1>

                <p style="padding-top: 15px; font-size: 20px;font-family: Outfit-Light;">
                Nos especializamos en carpintería, ofreciendo soluciones duraderas, estéticas y funcionales para todo tipo de personas, estilos de vida y presupuestos.
                Combinamos diseño moderno, materiales de primera y trabajo artesanal, logrando un equilibrio perfecto entre calidad y precio justo.
                </p>

            </div>

            <div>

                <img src="./IMG/Logo3.png" class="img-fluid" id="img1" style="animation: slideInRight 1s ease-out forwards;">

            </div>

        </section>

        <!-- Bloque 1 -->

        <section class="bloque">

            <div class="divbloque">

                <div id="divespacio">

                    <img src="./IMG/M4.jpg"  class="img-fluid" id="img2">

                </div>

                <div>

                    <h1 style="font-size: 35px; color: #C19A6B;"><b>Muebles que se adaptan a tu vida y a tu hogar</b></h1>

                    <p style="padding-top: 15px; font-size: 20px;font-family: Outfit-Light;">
                    En Módulo 23 diseñamos muebles pensando en la diversidad de hogares y estilos de vida. 
                    Ya sea un departamento moderno, una casa familiar o un espacio reducido, nuestras piezas 
                    se ajustan a cada entorno, optimizando el espacio sin perder calidez ni funcionalidad.
                    </p>

                </div>

            </div>

        </section>

        <!-- Bloque 2 -->

        <section class="bloque" style="background-color: #0D0D0D;padding-bottom: 10%;">

            <div class="container">

                <div class="row text-center">

                    <div class="col-lg-4">
                        
                        <div style="margin-bottom: 8%;">
                            <img src="./IMG/Logo3.png" class="img-fluid" id="img1" style="width: 70%;">
                        </div>

                        <h1 style="font-size: 35px; color: #C19A6B;margin-bottom: 8%;" >Materiales de Calidad</h1>

                        <p style="font-size: 20px;">
                            En Módulo 23 trabajamos con materiales seleccionados por su durabilidad, resistencia y estética.
                            Usamos maderas nobles, herrajes confiables y terminaciones de alto nivel para garantizar muebles que no solo se ven bien, sino que resisten el paso del tiempo.
                            Porque para nosotros, calidad es más que una promesa: es una base.
                        </p>

                    </div>

                    <div class="col-lg-4">

                        <div style="margin-bottom: 8%;">
                            <img src="./IMG/Logo3.png" class="img-fluid" id="img1" style="width: 70%;">
                        </div>

                        <h1 style="font-size: 35px; color: #C19A6B;margin-bottom: 8%;" >Accesible</h1>

                        <p style="font-size: 20px;">
                            Creemos que el diseño funcional y bien hecho no tiene por qué ser inaccesible.
                            Conseguir tu mueble ideal para tu hogar es posible , en Modulo 23
                            buscamos que seas capaz de acceder a lo mejor segun tu estilo de vida.
                        </p>
                        
                    </div>

                    <div class="col-lg-4">
                        
                        <div style="margin-bottom: 8%;">
                            <img src="./IMG/Logo3.png" class="img-fluid" id="img1" style="width: 70%;">
                        </div>

                        <h1 style="font-size: 35px; color: #C19A6B;margin-bottom: 8%;" >Trabajo Artesanal</h1>

                        <p style="font-size: 20px;">
                            Cada mueble que sale de nuestro taller lleva el sello del trabajo artesanal.
                            Detrás de cada corte, encastre y acabado, hay manos expertas que cuidan los detalles y entienden que la carpintería es tanto técnica como pasión.
                            En Módulo 23, lo que hacemos es único, porque está hecho por personas, no por máquinas.
                        </p>

                    </div>

                </div>

            </div>

        </section>

        <!-- Bloque 3 -->

        <section class="bloque" style="padding-top: 6%;">

            <h1 style="font-size: 40px;color: #C19A6B;display: flex;justify-content: center;margin-bottom: 5%;">Nuestros Servicios</h1>

            <div style="justify-content: center;display: flex;margin-bottom: 10%;">

                <img src="./IMG/M1.jpg" class="img-fluid" width="60%" id="img3">

            </div>

            <div class="container">

                <div class="row text-center">

                    <div class="col-lg-4">
                        
                        <div style="margin-bottom: 8%;">
                            <img src="./IMG/mesanordica.jpg" class="img-fluid" id="mesa" style="width: 70%; margin-bottom: 7%;">
                            <h1 style="font-size: 35px; color: #C19A6B;margin-bottom: 8%;" >Mesas</h1>

                        </div>         

                        <p style="font-size: 20px;">
                        Mesas diseñadas para reunir a la familia, con calidad, estilo y funcionalidad para compartir y crear recuerdos en tu hogar.
                        </p>

                    </div>

                    <div class="col-lg-4">

                        <img src="./IMG/silla.jpg" class="img-fluid" id="silla" style="width: 70%; margin-bottom: 7%;">
                        <h1 style="font-size: 35px; color: #C19A6B;margin-bottom: 8%;" >Sillas</h1>

                        <p style="font-size: 20px;">
                           Diseños cómodos y resistentes, ideales para la familia. Estilo y practicidad para crear espacios acogedores todos los días.
                        </p>
                        
                    </div>

                    <div class="col-lg-4">
                        <img src="./IMG/armario.jpg" class="img-fluid" id="armario" style="width: 70%; margin-bottom: 7%;">
                        <h1 style="font-size: 35px; color: #C19A6B;margin-bottom: 8%;" >Armarios</h1>

                        <p style="font-size: 20px;">
                           Espaciosos y funcionales, nuestros armarios de madera mantienen tu hogar organizado con el estilo cálido que tu familia merece.
                        </p>

                    </div>

                </div>

            </div>

            <div class="container" style="margin-top: 5%;">

                <div class="row text-center">

                    <div class="col-lg-4">
                        
                        <div style="margin-bottom: 8%;">
                            <img src="./IMG/velador.jpg" class="img-fluid" id="velador" style="width: 70%; margin-bottom: 7%;">
                            <h1 style="font-size: 35px; color: #C19A6B;margin-bottom: 8%;" >Veladores</h1>

                        </div>         

                        <p style="font-size: 20px;">
                           Prácticos y acogedores, ideales para acompañar tus noches y mantener lo esencial siempre a mano.
                        </p>

                    </div>

                    <div class="col-lg-4">
                        <img src="./IMG/repisa.jpg" class="img-fluid" id="repisa" style="width: 70%; margin-bottom: 7%;">
                        <h1 style="font-size: 35px; color: #C19A6B;margin-bottom: 8%;" >Repisas</h1>

                        <p style="font-size: 20px;">
                           Versátiles y resistentes, perfectas para ordenar o decorar, dando un toque natural y familiar a cada rincón.
                        </p>
                        
                    </div>

                    <div class="col-lg-4">
                        <img src="./IMG/comoda.jpg" class="img-fluid" id="comoda" style="width: 70%; margin-bottom: 7%;">
                        <h1 style="font-size: 35px; color: #C19A6B;margin-bottom: 8%;" >Comodas</h1>

                        <p style="font-size: 20px;">
                            Diseñadas para la vida diaria, combinan capacidad, resistencia y un estilo atemporal que se adapta a cualquier habitación.
                        </p>

                    </div>

                </div>

            </div>

            <div style="display: flex;justify-content: center;margin-top: 6%;">

                <a href="./PHP/servicios.html" class="btn" id="btn1">Ver mas</a>

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

<script src="./BOOTSTRAP_v5.3/js/bootstrap.bundle.min.js"></script>

</html>