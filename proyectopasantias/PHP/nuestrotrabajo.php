<?php
require_once '../INCLUDES/Autenticacion.php';
require_once '../includes/Item.php';

$item = new Item();
$usuario = Auth::obtenerUsuario();

$tipo_id = isset($_GET['tipo']) ? $_GET['tipo'] : null;
$busqueda = isset($_GET['q']) ? $_GET['q'] : null;

$items = $item->obtenerTodos();
$items = $item->buscarItems($tipo_id, $busqueda);
$tipos = $item->obtenerTipos();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muebleria Módulo 23</title>
    <link rel="icon" href="../IMG/Logo4.png" type="image/png">
    <link rel="stylesheet" href="../BOOTSTRAP_v5.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/nuestrotrabajo.css">
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
                                <a class="nav-link active" href="nuestrotrabajo.php">Nuestro Trabajo</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" href="./sobrenosotros.php">Sobre Nosotros</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" href="./servicios.php">FAQs</a>
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

            <div class="animacion arriba">

                <h1 style="font-size: 35px;color: #C19A6B;">Nuestro Trabajo</h1>

            </div>

        </section>

        <!-- Bloque 1 -->

        <section class="bloque" style="padding-bottom :0%;padding-top: 5%;padding-left :10%;padding-right:10%;">

            <h1 style="font-size: 35px;text-align: center;margin-bottom: 3%;" id="titulo" class="animacion izquierda">En <b style="color: #C19A6B;">Módulo 23</b> creamos muebles pensados para durar, adaptarse y emocionar.</h1>

            <p class="animacion derecha texto">

                Cada pieza nace del equilibrio entre diseño funcional, materiales de alta calidad y la dedicación del trabajo artesanal. Elegimos cuidadosamente cada madera, cada herraje y cada acabado, para que el resultado sea más que un mueble: sea parte de tu hogar.

            </p>

            <p class="animacion izquierda texto">

                Entendemos que cada persona y cada espacio son únicos, por eso ofrecemos opciones accesibles sin comprometer la estética ni la resistencia.
                Desde el primer trazo hasta el último detalle, todo lo que hacemos lleva nuestra marca: compromiso con la calidad, pasión por la carpintería y respeto por tus ideas.

                Muebles hechos a mano, pensados para vos.

            </p>

            <!-- Busqueda y Filtro -->

            <form method="GET" class="mb-3">
                <div class="row busqueda">
                    <div class="col-md-3">
                        <select name="tipo" class="form-select">
                            <option value="">Todos los tipos</option>
                            <?php foreach ($tipos as $tipo): ?>
                                <option value="<?= $tipo['id'] ?>"><?= htmlspecialchars($tipo['nombre']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="q" class="form-control" placeholder="Buscar Mueble...">
                    </div>
                    <div class="col-md-3 animacion arriba">
                        <button type="submit" class="btn btn-primary w-100">Filtrar</button>
                    </div>
                </div>
            </form>

        </section>


        <!-- Items -->

        <section class="bloque" style="padding-top: 2%;padding-bottom:5%">

            <div class="container mt-4">
                <div class="row text-center">
                    <?php foreach ($items as $i): ?>
                        <?php
                            $imagenes = $item->obtenerImagenesPorItem($i['id']);
                            $imagenesRutas = array_map(fn($img) => '../UPLOADS/' . $img['imagen'], $imagenes);
                            $dataImagenes = htmlspecialchars(json_encode($imagenesRutas));
                            $imagenPrincipal = isset($imagenesRutas[0]) ? $imagenesRutas[0] : null;
                            $descripcion = htmlspecialchars($i['descripcion']);
                            $descripcion_corta = strlen($descripcion) > 150 ? substr($descripcion, 0, 150) . '...' : $descripcion;
                        ?>
                        <div class="col-lg-4 animacion arriba producto"
                            style="margin-bottom:5%; cursor:pointer;"
                            data-bs-toggle="modal"
                            data-bs-target="#modalProducto"
                            data-titulo="<?= htmlspecialchars($i['titulo']) ?>"
                            data-descripcion="<?= htmlspecialchars($i['descripcion']) ?>"
                            data-imagenes='<?php echo $dataImagenes; ?>'
                        >
                            <div style="margin-bottom: 3%;">
                                <?php if ($imagenPrincipal): ?>
                                    <img src="../UPLOADS/<?= $imagenPrincipal ?>" class="img-fluid" style="width: 70%; margin-bottom: 4%;" alt="Imagen">
                                <?php else: ?>
                                    <div class="bg-secondary text-white text-center p-5">Sin imagen</div>
                                <?php endif; ?>
                                    <h1 style="font-size: 35px; color: #C19A6B;margin-bottom: 3%;" ><?= htmlspecialchars($i['titulo']) ?></h1>
                            </div>
                            <div>
                                <p style="font-size: 20px;">
                                    <?= nl2br($descripcion_corta) ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
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

<!-- Informacion en Detalle de los Productos -->

<div class="modal fade" id="modalProducto" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content rounded-4 shadow-lg">

      <div class="modal-header border-0">
        <h5 class="modal-title" id="modalTitulo"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <div class="modal-body text-center">
            <div id="carousel" class="carousel slide" >

                <div class="carousel-inner">

                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>

            </div>

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
    }, { threshold: 0.35 }); // 20% visible para activarse

    elementos.forEach(el => observer.observe(el));

    // Panel de los Productos

    document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('modalProducto');
    const carouselInner = document.querySelector('#modalProducto .carousel-inner');

        modal.addEventListener('show.bs.modal', function (event) {
            const item = event.relatedTarget;
            const titulo = item.getAttribute('data-titulo');
            const descripcion = item.getAttribute('data-descripcion');
            const imagenes = JSON.parse(item.getAttribute('data-imagenes'));

            // Actualizar título y descripción
            document.getElementById('modalTitulo').textContent = titulo;
            document.getElementById('modalDescripcion').textContent = descripcion;

            // Vaciar carrusel anterior
            carouselInner.innerHTML = '';

            // Crear items del carrusel
            imagenes.forEach((src, index) => {
                const div = document.createElement('div');
                div.classList.add('carousel-item');
                if (index === 0) div.classList.add('active');

                const img = document.createElement('img');
                img.src = src;
                img.className = 'img-fluid rounded mb-3';
                img.alt = `Imagen ${index + 1}`;

                // Si se quiere ver o modificar el tamaño real de la Imagen borra la linea de abajo

                img.style="max-height: 500px; object-fit: cover;";

                div.appendChild(img);
                carouselInner.appendChild(div);
            });
        });
    });


    // Panel de Informacion

    function toggleContacto() {
        const panel = document.getElementById('contacto-panel');
        panel.style.display = (panel.style.display === 'block') ? 'none' : 'block';
    }

</script>

<script src="../BOOTSTRAP_v5.3/js/bootstrap.bundle.min.js"></script>

</html>