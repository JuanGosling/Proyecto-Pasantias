<?php
require_once '../INCLUDES/Tipo.php';
require_once '../includes/Autenticacion.php';

if (!Auth::esAdmin()) {
    header("Location: ./login.php");
    exit;
}

$tipo = new Tipo();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['nombre'])) {
    $tipo->agregar($_POST['nombre']);
}

if (isset($_GET['eliminar'])) {
    $tipo->eliminar($_GET['eliminar']);
}

$tipos = $tipo->obtenerTodos();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Ítem</title>
    <link rel="icon" href="../IMG/Logo4.png" type="image/png">
    <link rel="stylesheet" href="../BOOTSTRAP_v5.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/agregaryeditar.css">
</head>
<body>

    <div class="contenedor">
        <h2>Gestionar Tipos de Muebles</h2>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Tipo de Mueble</label>
                <input type="text" name="nombre" placeholder="Nuevo tipo..." required>
                <button class="btn btn-success" type="submit">Agregar</button>
                <a href="./admin.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>

        <ul>
        <?php foreach ($tipos as $t): ?>
            <li>
                <?= htmlspecialchars($t['nombre']) ?>
                <a href="?eliminar=<?= $t['id'] ?>" onclick="return confirm('¿Eliminar este tipo?')">Eliminar</a>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>

</body>
</html>
