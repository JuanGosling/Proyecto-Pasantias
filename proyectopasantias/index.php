<?php
require_once 'INCLUDES/Autenticacion.php';
require_once 'INCLUDES/Item.php';

$item = new Item();

$usuario = Auth::obtenerUsuario();

$items = $item->obtenerTodos();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muebleria Módulo 23</title>
    <link rel="icon" href="./IMG/Logo4.png" type="image/png">
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
                                <a class="nav-link active" href="./PHP/nuestrotrabajo.php">Nuestro Trabajo</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" href="./PHP/sobrenosotros.php">Sobre Nosotros</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" href="./PHP/servicios.php">FAQs</a>
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

            <div id="divespacio" class="animacion izquierda">

                <h1  style="font-size: 35px;">En <b style="color: #C19A6B;">Módulo 23</b> creemos que cada hogar merece calidad</h1>

                <p style="padding-top: 15px; font-size: 20px;font-family: Outfit-Light;">
                Nos especializamos en muebles, ofreciendo soluciones duraderas, estéticas y funcionales para todo tipo de personas, estilos de vida y presupuestos.
                Combinamos diseño moderno, materiales de primera y trabajo artesanal, logrando un equilibrio perfecto entre calidad y precio justo.
                </p>

            </div>

            <div class="animacion derecha">

                <img src="./IMG/Logo5.png" class="img-fluid" id="img1" width="2560" height="2560" >

            </div>

        </section>

        <!-- Bloque 1 -->                      
        <section class="bloque">

            <div class="divbloque">

                <div id="divespacio" class="animacion derecha">

                    <img src="./IMG/M4.jpg"  class="img-fluid" id="img2">

                </div>

                <div class="animacion izquierda">

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

                    <div class="col-lg-4 animacion arriba">
                        
                        <div style="margin-bottom: 4%;">
                            <img src="./IMG/Icono1.png" class="img-fluid" id="img1" style="width: 70%;">
                        </div>

                        <h1 style="font-size: 35px; color: #C19A6B;margin-bottom: 4%;" >Materiales de Calidad</h1>

                        <p style="font-size: 20px;">
                            Usamos maderas nobles, herrajes confiables y terminaciones de alto nivel para garantizar muebles que no solo se ven bien, sino que resisten el paso del tiempo.
                            Porque para nosotros, calidad es más que una promesa: es una base.
                        </p>

                    </div>

                    <div class="col-lg-4 animacion arriba">

                        <div style="margin-bottom: 4%;">
                            <img src="./IMG/Icono2.png" class="img-fluid" id="img1" style="width: 70%;">
                        </div>

                        <h1 style="font-size: 35px; color: #C19A6B;margin-bottom: 4%;" >Accesible</h1>

                        <p style="font-size: 20px;">
                            Creemos que el diseño funcional y bien hecho no tiene por qué ser inaccesible.
                            Conseguir tu mueble ideal para tu hogar es posible , en Modulo 23
                            buscamos que seas capaz de acceder a lo mejor segun tu estilo de vida.
                        </p>
                        
                    </div>

                    <div class="col-lg-4 animacion arriba">
                        
                        <div style="margin-bottom: 4%;">
                            <img src="./IMG/Icono3.png" class="img-fluid" id="img1" style="width: 70%;">
                        </div>

                        <h1 style="font-size: 35px; color: #C19A6B;margin-bottom: 4%;" >Trabajo Artesanal</h1>

                        <p style="font-size: 20px;">
                            Detrás de cada corte, encastre y acabado, hay manos expertas que cuidan los detalles y entienden que la carpintería es tanto técnica como pasión.
                            En Módulo 23, lo que hacemos es único, porque está hecho por personas, no por máquinas.
                        </p>

                    </div>

                </div>

            </div>

        </section>

        <!-- Bloque 3 -->

        <section class="bloque" style="padding-top: 6%;">

            <h1 style="font-size: 40px;color: #C19A6B;display: flex;justify-content: center;margin-bottom: 6%;" class="animacion izquierda">Nuestro Trabajo</h1>

            <div class="container mt-4">

                    <div class="row text-center">
                        <?php 
                        // Mostrar solo los primeros 6
                        $items = array_reverse($items);
                        $items_mostrados = array_slice($items, 0, 6);
                        foreach ($items_mostrados as $i): 
                        ?>
                            <div class="col-lg-4 animacion arriba producto" style="margin-bottom:5%"
                                style="margin-bottom:5%; cursor:pointer;"
                                data-bs-toggle="modal"
                                data-bs-target="#modalProducto"
                                data-titulo="<?= htmlspecialchars($i['titulo']) ?>"
                                data-descripcion="<?= htmlspecialchars($i['descripcion']) ?>"
                                data-imagen="UPLOADS/<?= htmlspecialchars($i['imagen']) ?>"
                            >
                                <div style="margin-bottom: 3%;">
                                    <?php if ($i['imagen']): ?>
                                        <img src="UPLOADS/<?= htmlspecialchars($i['imagen']) ?>" class="img-fluid"
                                            style="width: 70%; margin-bottom: 4%; object-fit: cover;" alt="Imagen">
                                    <?php else: ?>
                                        <div class="bg-secondary text-white text-center p-5">Sin imagen</div>
                                    <?php endif; ?>

                                    <h1 style="font-size: 35px; color: #C19A6B;margin-bottom: 3%;">
                                        <?= htmlspecialchars($i['titulo']) ?>
                                    </h1>
                                </div>
                                <div>
                                    <p style="font-size: 20px;">
                                        <?= nl2br(htmlspecialchars($i['descripcion'])) ?>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    
            </div>

            <div style="display: flex;justify-content: center;margin-top: 6%;">

                <a href="./PHP/nuestrotrabajo.php" class="btn" id="btn1">Ver mas</a>

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

<!-- Informacion en Detalle de los Productos -->

<div class="modal fade" id="modalProducto" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content rounded-4 shadow-lg">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="modalTitulo"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body text-center">
        <img id="modalImagen" src="" alt="" class="img-fluid rounded mb-3" style="max-height: 300px; object-fit: cover;">
        <p id="modalDescripcion" class="fs-5 text-muted"></p>
      </div>
    </div>
  </div>
</div>

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
    }, { threshold: 0.3 }); // 30% visible para activarse

    elementos.forEach(el => observer.observe(el));

    // Panel de los Productos

    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('modalProducto');

        modal.addEventListener('show.bs.modal', function (event) {
            const item = event.relatedTarget; // el div clickeado
            const titulo = item.getAttribute('data-titulo');
            const descripcion = item.getAttribute('data-descripcion');
            const imagen = item.getAttribute('data-imagen');

            document.getElementById('modalTitulo').textContent = titulo;
            document.getElementById('modalDescripcion').textContent = descripcion;
            document.getElementById('modalImagen').src = imagen;
        });
    });

    // Panel de Informacion

    function toggleContacto() {
        const panel = document.getElementById('contacto-panel');
        panel.style.display = (panel.style.display === 'block') ? 'none' : 'block';
    }

    

</script>

<script src="./BOOTSTRAP_v5.3/js/bootstrap.bundle.min.js"></script>

</html>