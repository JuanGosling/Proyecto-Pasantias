<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="./CSS/index.css">
</head>

<body style="background-color: #0D0D0D; color: #ffffff ;">

    <!-- Inicio de la Barra de Navegación -->

    <nav class="navbar navbar-expand-lg fixed-top " style="background-color: #1F1F1F;" data-bs-theme="dark">
        <div class="container-fluid ">

            <a class="navbar-brand mx-lg-5 me-auto" style="font-size: 30px;font-weight: 700; color:#C19A6B ; font-family: Arial, Helvetica, sans-serif;">MÓDULO 23</a>

            <img src="./IMG/Logo.png" width="70" height="70" >

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <div class="offcanvas-body ">
                    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active mx-lg-2" aria-current="page" href="#">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2"  href="#">Trabajos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="#">Ubicacion</a>
                        </li>   
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="#">Contactanos</a>
                        </li>
                    </ul>
                </div>

            </div>


            <!-- Verifica si hay una sesion activa , si lo hay se muestra el email y el boton para cerrar sesion
            sino se muestras los botones default de iniciar sesion y registrarse-->

            <?php if (isset($_SESSION['email'])): ?>
                        <p style="margin-top:15px">Bienvenido, <?php echo htmlspecialchars($_SESSION['email']); ?>!</p>
                    <a href="PHP/cerrarsesion.php" class="Login-button mx-lg-5">Cerrar sesión</a>
            <?php else: ?>
                    <a href="PHP/login.php" class="Login-button mx-lg-5">Iniciar Sesión</a>
                    <a href="PHP/register.php" class="Login-button mx-lg-5">Registrarse</a>
            <?php endif; ?>

            <button class="navbar-toggler " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        </div>

    </nav>
    
    <!-- Fin de la Barra de Navegación -->

    <!-- Inicio de Carrusel -->

    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-inner" >

            <div class="carousel-item active" data-bs-interval="4000" style="max-height: 750px ; max-width: 1920;">
                <img src="./IMG/M2.jpg" class="d-block w-100" alt="..." >
            </div>

            <section style="display: inline;display: flex;">

            <div style="position: absolute;top: 23%;left: 5%;">
                <img src="./IMG/Logo1.png" width="500" height="500" >
            </div>

            <div style="position: absolute;top: 33%; left: 40%;padding-right: 10%;">
                
                <p style="font-family: Arial, Helvetica, sans-serif;font-size: 25px; font-weight: 800; color: #8dee8a	;">En Módulo 23 creemos que cada hogar merece calidad</p>
                <p style="font-family: Arial, Helvetica, sans-serif;font-size: 25px; font-weight: 800;">
                    Nos especializamos en carpintería a medida, ofreciendo soluciones duraderas, estéticas y funcionales para todo tipo de personas, estilos de vida y presupuestos.
                    Combinamos diseño moderno, materiales de primera y mano de obra calificada, logrando un equilibrio perfecto entre calidad y precio justo.
                    <br>
                    Porque entendemos que tu casa no es solo un lugar: es tu espacio.
                </p>
            </div>

        </section>
            
        </div>

    </div>

    <!-- Fin de Carrusel -->

    <!-- Inicio del Contenido de la Pagina -->

    <div class="container" >

        <div class="row text-center" style="margin-top: 100px;">

            <div class="col-lg-4">
                <div style="margin-bottom: 15px;">
                    <img src="./IMG/descarga (1).jpg" class="img-fluid h-50 w-50 rounded-circle " alt="img">
                </div>
                <h2>Heading</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquid architecto odio itaque perferendis voluptatem, libero voluptates atque ducimus dicta harum non. Quo mollitia sequi fugiat repellat placeat! Voluptate, corrupti illum!</p>
                <a href="#" class="Login-button">View details »</a>
            </div>

            <div class="col-lg-4">
                <div  style="margin-bottom: 15px;">
                    <img src="./IMG/descarga (1).jpg" class="img-fluid h-50 w-50 rounded-circle " alt="img">
                </div>
                <h2>Heading</h2>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam, deleniti! Ut exercitationem excepturi quos, culpa maxime, eius laborum earum nesciunt corrupti praesentium voluptas ad quia? Reiciendis, quaerat! Optio, id illum?</p>
                <a href="#" class="Login-button">View details »</a>  
            </div>

            <div class="col-lg-4">
                <div  style="margin-bottom: 15px;">
                    <img src="./IMG/descarga (1).jpg" class="img-fluid h-50 w-50 rounded-circle " alt="img">
                </div>
                <h2>Heading</h2>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam, deleniti! Ut exercitationem excepturi quos, culpa maxime, eius laborum earum nesciunt corrupti praesentium voluptas ad quia? Reiciendis, quaerat! Optio, id illum?</p>
                <a href="#" class="Login-button">View details »</a>
            </div>

        </div>

    </div>

    <div style="background-color: #1F1F1F; margin-top: 100px;padding-top: 50px; padding-bottom: 50px;" >
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-8" style="margin-top: 5%;">
                    <div>
                        <h1>Acerca de nosotros</h1>
                        <br>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi suscipit quo laudantium molestiae obcaecati eos, magni autem consequatur nesciunt. Vitae iusto dolor sunt quis eligendi dolorem odit quam voluptas blanditiis.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <img src="./IMG/descarga (1).jpg" class="img-fluid h-100 w-100 " alt="img">
                </div>
            </div>
        </div>
    </div>

<!-- Inicio del Contenido de la Pagina -->

<!-- Inicio del Pie de Pagina -->

    <footer>
        
        <div class="footer-container">

            <!-- Logo y presentación -->

            <div class="footer-branding">
                <img src="ruta-del-logo.png" alt="Logo de la carpintería" class="footer-logo">
                <p>Nombre de la empresa - Carpintería especializada en muebles a medida.</p>
            </div>

            <!-- Información de contacto -->

            <div class="footer-contact">
                <h3>Contacto</h3>
                <ul>
                    <li>Dirección: <span>_______________</span></li>
                    <li>Teléfono: <a href="tel:__________">__________</a></li>
                    <li>Email: <a href="mailto:__________">__________</a></li>
                    <li><a href="formulario-contacto.html">Formulario de contacto</a></li>
                </ul>
            </div>

            <!-- Enlaces importantes -->

            <div class="footer-links">
                <h3>Enlaces</h3>
                <ul>
                    <li><a href="sobre-nosotros.html">Sobre nosotros</a></li>
                    <li><a href="faq.html">Preguntas frecuentes</a></li>
                    <li><a href="terminos.html">Términos y condiciones</a></li>
                    <li><a href="privacidad.html">Política de privacidad</a></li>
                    <li><a href="cookies.html">Política de cookies</a></li>
                </ul>
            </div>

        </div>

        <!-- Copyright -->

        <div class="footer-bottom">
            <p>© 2025 Nombre de la empresa. Todos los derechos reservados.</p>
            <p><a class="Login-button" href="#top">Volver arriba ↑</a></p>
        </div>

    </footer>

    <!-- Fin del Pie de Pagina -->

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</html>