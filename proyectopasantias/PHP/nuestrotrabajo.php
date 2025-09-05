<?php
require_once '../INCLUDES/Autenticacion.php';
require_once '../includes/Item.php';

$item = new Item();
$usuario = Auth::obtenerUsuario();

$tipo = isset($_GET['tipo']) ? $_GET['tipo'] : null;
$busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : null;

$items = $item->obtenerTodos();
$items = $item->buscarItems($tipo, $busqueda);
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
                            <?php foreach ($tipos as $t): ?>
                                <option value="<?php echo htmlspecialchars($t, ENT_QUOTES); ?>" 
                                    <?php if ($tipo == $t) echo "selected"; ?>>
                                    <?php echo ucfirst($t); ?>
                                </option>
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


        <!-- Items -->

        <section class="bloque" style="padding-top: 2%;padding-bottom:5%">

            <div class="container mt-4">
                <div class="row text-center">
                    <?php foreach ($items as $i): ?>
                        <div class="col-lg-4 animacion arriba" style="margin-bottom:5%">
                            <div style="margin-bottom: 3%;">
                                <?php if ($i['imagen']): ?>
                                    <img src="../uploads/<?= htmlspecialchars($i['imagen']) ?>" class="img-fluid" style="width: 70%; margin-bottom: 4%;" alt="Imagen">
                                <?php else: ?>
                                    <div class="bg-secondary text-white text-center p-5">Sin imagen</div>
                                <?php endif; ?>
                                    <h1 style="font-size: 35px; color: #C19A6B;margin-bottom: 3%;" ><?= htmlspecialchars($i['titulo']) ?></h1>
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

        </section>

    </div>

    <!-- Pie de Pagina -->

    <div class="footer">

        <p>© 2025 Módulo 23. Todos los derechos reservados.</p>
        <p style="padding-left:10%;padding-right:10%">Sitio Desarrollado por Santiago Alcibar , Lautaro Cotti , Leonel Diaz y Felipe Eguiluz</p>
        <p><a class="btn" href="#top" >Volver arriba ↑</a></p>

    </div>

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
    }, { threshold: 0.1 }); // 10% visible para activarse

    elementos.forEach(el => observer.observe(el));

</script>

<script src="../BOOTSTRAP_v5.3/js/bootstrap.bundle.min.js"></script>

</html>