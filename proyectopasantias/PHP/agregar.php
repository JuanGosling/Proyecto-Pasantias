<?php
require_once '../includes/Autenticacion.php';
require_once '../includes/Item.php';

if (!Auth::esAdmin()) {
    header("Location: ./login.php");
    exit;
}

$item = new Item();
$mensaje = "";

$tiposDisponibles = ["Sillas", "Mesas", "Roperos", "Armarios", "Camas", "Escritorios","Repisas","Otro"];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo']);
    $descripcion = trim($_POST['descripcion']);
    $imagen = null;
    $tipo = trim($_POST['tipo']);

    if ($_FILES['imagen']['name']) {
        $imagen = basename($_FILES['imagen']['name']);
        move_uploaded_file($_FILES['imagen']['tmp_name'], "../uploads/$imagen");
    }

    $item->agregar($titulo, $descripcion, $imagen, $tipo);
    header("Location: ./admin.php");

}

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
                <label class="form-label">Imagen</label>
                <input type="file" name="imagen" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Tipo de Mueble</label>
                <select name="tipo" class="form-select" required>
                    <option value="">Selecciona un tipo</option>
                    <?php foreach ($tiposDisponibles as $t): ?>
                        <option value="<?php echo $t; ?>"><?php echo ucfirst($t); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="./admin.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

</body>
</html>
