<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuestro Trabajo</title>
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
                                <a class="nav-link active" aria-current="page" href="../index1.php">Inicio</a>
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

                            <?php if (isset($_SESSION['email'])): ?>

                            <li class="nav-item dropdown">

                                <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #C19A6B;">
                                <?php echo htmlspecialchars($_SESSION['email']); ?><img src="../IMG/user.png" class="icono">
                                </a>
                                
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Mi Perfil</a></li>
                                    <li><a class="dropdown-item" href="#">Cambiar Contraseña</a></li>
                                    <li><a class="dropdown-item" href="cerrarsesion.php">Cerrar Sesion</a></li>
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

                <div class="row text-center">

                    <div class="col-lg-4">
                        
                        <div style="margin-bottom: 8%;">

                            <h1 style="font-size: 35px; color: #C19A6B;margin-bottom: 8%;" >Mesas</h1>

                        </div>         

                        <p style="font-size: 20px;">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam et nesciunt officiis obcaecati natus
                        </p>

                    </div>

                    <div class="col-lg-4">

                        <h1 style="font-size: 35px; color: #C19A6B;margin-bottom: 8%;" >Sillas</h1>

                        <p style="font-size: 20px;">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam et nesciunt officiis obcaecati natus
                        </p>
                        
                    </div>

                    <div class="col-lg-4">

                        <h1 style="font-size: 35px; color: #C19A6B;margin-bottom: 8%;" >Armarios</h1>

                        <p style="font-size: 20px;">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam et nesciunt officiis obcaecati natus
                        </p>

                    </div>

                </div>

            </div>

            <div class="container">

                <div class="row text-center">

                    <div class="col-lg-4">
                        
                        <div style="margin-bottom: 8%;">

                            <h1 style="font-size: 35px; color: #C19A6B;margin-bottom: 8%;" >Mesas</h1>

                        </div>         

                        <p style="font-size: 20px;">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam et nesciunt officiis obcaecati natus
                        </p>

                    </div>

                    <div class="col-lg-4">

                        <h1 style="font-size: 35px; color: #C19A6B;margin-bottom: 8%;" >Sillas</h1>

                        <p style="font-size: 20px;">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam et nesciunt officiis obcaecati natus
                        </p>
                        
                    </div>

                    <div class="col-lg-4">

                        <h1 style="font-size: 35px; color: #C19A6B;margin-bottom: 8%;" >Armarios</h1>

                        <p style="font-size: 20px;">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam et nesciunt officiis obcaecati natus
                        </p>

                    </div>

                </div>

            </div>

            <div class="container">

                <div class="row text-center">

                    <div class="col-lg-4">
                        
                        <div style="margin-bottom: 8%;">

                            <h1 style="font-size: 35px; color: #C19A6B;margin-bottom: 8%;" >Mesas</h1>

                        </div>         

                        <p style="font-size: 20px;">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam et nesciunt officiis obcaecati natus
                        </p>

                    </div>

                    <div class="col-lg-4">

                        <h1 style="font-size: 35px; color: #C19A6B;margin-bottom: 8%;" >Sillas</h1>

                        <p style="font-size: 20px;">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam et nesciunt officiis obcaecati natus
                        </p>
                        
                    </div>

                    <div class="col-lg-4">

                        <h1 style="font-size: 35px; color: #C19A6B;margin-bottom: 8%;" >Armarios</h1>

                        <p style="font-size: 20px;">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam et nesciunt officiis obcaecati natus
                        </p>

                    </div>

                </div>

            </div>

            <div class="container">

                <div class="row text-center">

                    <div class="col-lg-4">
                        
                        <div style="margin-bottom: 8%;">

                            <h1 style="font-size: 35px; color: #C19A6B;margin-bottom: 8%;" >Mesas</h1>

                        </div>         

                        <p style="font-size: 20px;">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam et nesciunt officiis obcaecati natus
                        </p>

                    </div>

                    <div class="col-lg-4">

                        <h1 style="font-size: 35px; color: #C19A6B;margin-bottom: 8%;" >Sillas</h1>

                        <p style="font-size: 20px;">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam et nesciunt officiis obcaecati natus
                        </p>
                        
                    </div>

                    <div class="col-lg-4">

                        <h1 style="font-size: 35px; color: #C19A6B;margin-bottom: 8%;" >Armarios</h1>

                        <p style="font-size: 20px;">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam et nesciunt officiis obcaecati natus
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
            <p>© 2025 Nombre de la empresa. Todos los derechos reservados.</p>
            <p><a class="btn" href="#top">Volver arriba ↑</a></p>
        </div>

    </footer>

</body>

<script src="../BOOTSTRAP_v5.3/js/bootstrap.bundle.min.js"></script>

</html>