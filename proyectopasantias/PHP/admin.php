<?php
require_once '../INCLUDES/Autenticacion.php';
require_once '../INCLUDES/Item.php';

// Solo admin puede acceder
if (!Auth::esAdmin()) {
    header("Location: ./login.php");
    exit;
}

$item = new Item();

$tipo_id = isset($_GET['tipo']) ? $_GET['tipo'] : null;
$busqueda = isset($_GET['q']) ? $_GET['q'] : null;

$items = $item->obtenerTodos();
$items = $item->buscarItems($tipo_id, $busqueda);
$tipos = $item->obtenerTipos();
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
                                <a class="nav-link active" href="./nuestrotrabajo.php">Nuestro Trabajo</a>
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

            <h1 style="font-size: 35px;text-align: center;margin-bottom: 1%;" id="titulo">En el Panel de Administrador vas a poder ver , agregar , modificar y quitar Muebles.</h1>

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
                        <input type="text" name="busqueda" class="form-control" placeholder="Buscar Mueble..."
                            value="<?php echo htmlspecialchars($busqueda ?? '', ENT_QUOTES); ?>">
                    </div>
                    <div class="col-md-3 animacion arriba">
                        <button type="submit" class="btn btn-primary w-100">Filtrar</button>
                    </div>
                </div>
            </form>

        </section>

        <section class="bloque" style="padding-top:0%">

            <div class="container-fluid">
                <div class="row">
                    <!-- Menú lateral -->
                    <div class="col-md-2 bg-dark text-white p-3">
                        <h4>Opciones</h4>
                        <ul class="nav flex-column">
                            <li class="nav-item"><a href="agregar.php" class="btn">Agregar Mueble</a></li>
                            <li class="nav-item"><a href="tipos.php" class="btn">Agregar Tipo de Mueble</a></li>
                        </ul>
                    </div>

                    <!-- Muebles -->
                    <div class="col-md-10 p-4">
                        <h2>Listado de Muebles</h2>
                        <div class="row ">
                            <?php foreach ($items as $i): ?>
                                <?php
                                    $imagenes = $item->obtenerImagenesPorItem($i['id']);
                                    $imagenesRutas = array_map(fn($img) => '../UPLOADS/' . $img['imagen'], $imagenes);
                                    $dataImagenes = htmlspecialchars(json_encode($imagenesRutas));
                                    $imagenPrincipal = isset($imagenesRutas[0]) ? $imagenesRutas[0] : null;
                                ?>
                                <div class="col-md-4 mb-4 producto"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalProducto"
                                    data-titulo="<?= htmlspecialchars($i['titulo']) ?>"
                                    data-descripcion="<?= htmlspecialchars($i['descripcion']) ?>"
                                    data-imagenes='<?php echo $dataImagenes; ?>'>
                                    <div class="card h-100">
                                        <?php if ($imagenPrincipal): ?>
                                            <img src="../UPLOADS/<?= $imagenPrincipal ?>" class="card-img-top" alt="Imagen" style="cursor:pointer;">
                                        <?php else: ?>
                                            <div class="bg-secondary text-white text-center p-5">Sin imagen</div>
                                        <?php endif; ?>
                                        <div class="card-body" style="background-color: #C19A6B; color: #ffffff;font-family: Outfit;">
                                            <h5 class="card-title"><?= htmlspecialchars($i['titulo']) ?></h5>
                                            <p class="card-text"><?= nl2br(htmlspecialchars($i['descripcion'])) ?></p>
                                        </div>
                                        <div class="card-footer text-end" style="background-color: #C19A6B; color: #ffffff;font-family: Outfit;">
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

<script>

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


</script>

<script src="../BOOTSTRAP_v5.3/js/bootstrap.bundle.min.js"></script>

</html>