<?php
require_once '../includes/Autenticacion.php';
require_once '../includes/Item.php';

if (!Auth::esAdmin()) {
    header("Location: ./login.php");
    exit;
}

$item = new Item();
$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo']);
    $descripcion = trim($_POST['descripcion']);
    $imagen = null;

    if ($_FILES['imagen']['name']) {
        $imagen = basename($_FILES['imagen']['name']);
        move_uploaded_file($_FILES['imagen']['tmp_name'], "../uploads/$imagen");
    }

    $item->agregar($titulo, $descripcion, $imagen);
    header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Ítem</title>
    <link rel="stylesheet" href="../BOOTSTRAP_v5.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/agregaryeditar.css">
</head>
<body>

    <div class="container mt-5">
        <h2>Agregar Ítem</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Título</label>
                <input type="text" name="titulo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-control" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen (opcional) (Resolución recomendada : 1000x1000)</label>
                <input type="file" name="imagen" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="./admin.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

</body>
</html>
