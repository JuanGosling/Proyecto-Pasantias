<?php
require_once '../includes/Autenticacion.php';
require_once '../includes/Item.php';

if (!Auth::esAdmin()) {
    header("Location: ./login.php");
    exit;
}

$item = new Item();
$id = $_GET['id'] ?? null;

if (!$id || !is_numeric($id)) {
    die("ID inválido");
}

$datos = $item->obtenerPorId($id);
if (!$datos) {
    die("Ítem no encontrado");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo']);
    $descripcion = trim($_POST['descripcion']);
    $imagen = $datos['imagen']; // Por defecto, mantener la actual

    if ($_FILES['imagen']['name']) {
        $imagen = basename($_FILES['imagen']['name']);
        move_uploaded_file($_FILES['imagen']['tmp_name'], "../uploads/$imagen");
    }

    $item->actualizar($id, $titulo, $descripcion, $imagen);
    header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Ítem</title>
    <link rel="stylesheet" href="../BOOTSTRAP_v5.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/agregaryeditar.css">
</head>
<body>

    <div class="container mt-5">
        <h2>Editar Ítem</h2>
        <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Título</label>
                    <input type="text" name="titulo" class="form-control" value="<?= htmlspecialchars($datos['titulo']) ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Descripción</label>
                    <textarea name="descripcion" class="form-control" rows="4" required><?= htmlspecialchars($datos['descripcion']) ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Imagen actual</label><br>
                    <?php if ($datos['imagen']): ?>
                        <img src="../uploads/<?= htmlspecialchars($datos['imagen']) ?>" width="150">
                    <?php else: ?>
                        <span>No hay imagen</span>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Cambiar Imagen (opcional)</label>
                    <input type="file" name="imagen" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="./admin.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    
</body>
</html>
