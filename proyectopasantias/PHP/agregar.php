<?php
require_once '../includes/Autenticacion.php';
require_once '../INCLUDES/Item.php';

if (!Auth::esAdmin()) {
    header("Location: ./login.php");
    exit;
}

$item = new Item();
$mensaje = "";

$tipos = $item->obtenerTipos();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo']);
    $descripcion = trim($_POST['descripcion']);
    $tipo_id = !empty($_POST['tipo_id']) ? $_POST['tipo_id'] : null;
    $imagenes = $_FILES['imagenes'];
    $imagenesNombres = [];

    foreach ($imagenes['tmp_name'] as $key => $tmp_name) {
        if ($imagenes['error'][$key] === UPLOAD_ERR_OK) {
            $nombreArchivo = uniqid() . "_" . basename($imagenes['name'][$key]);
            $rutaDestino = "../UPLOADS/" . $nombreArchivo;

            if (move_uploaded_file($tmp_name, $rutaDestino)) {
                $imagenesNombres[] = $nombreArchivo;
            }
        }
    }

    $imagenPrincipal = !empty($imagenesNombres) ? $imagenesNombres[0] : null;

    $item->agregar($titulo, $descripcion, $tipo_id );
    $item_id = $item->obtenerUltimoId();
    $item->agregarImagenes($imagenesNombres, $item_id);

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
                <label class="form-label">Descripción (Opcional)</label>
                <textarea name="descripcion" class="form-control" rows="4"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen (Se pueden seleccionar varias Imagenes con CTRL + CLICK IZQUIERDO)</label>
                <input type="file" name="imagenes[]" class="form-control" multiple required>
            </div>
            <div class="mb-3">
                <label class="form-label">Tipo de Mueble</label>
                <select name="tipo_id" class="form-select" required>
                <option value="">Selecciona un tipo</option>
                <?php foreach ($tipos as $tipo): ?>
                    <option value="<?= $tipo['id'] ?>"><?= htmlspecialchars($tipo['nombre']) ?></option>
                <?php endforeach; ?>
            </select>
            </div>
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="./admin.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

</body>
</html>
