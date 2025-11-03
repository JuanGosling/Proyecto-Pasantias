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

$tipos = $item->obtenerTipos();

$imagenes = $item->obtenerImagenesPorItem($id);

if (isset($_GET['eliminar_imagen'])) {
    $item->eliminarImagen((int)$_GET['eliminar_imagen']);
    header("Location: editar.php?id=" . $id);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $titulo = trim($_POST['titulo']);
    $descripcion = trim($_POST['descripcion']);
    $tipo_id = trim($_POST['tipo_id']);

    if (!empty($_FILES['imagenes']['name'][0])) {
        $imagenesNombres = [];

        foreach ($_FILES['imagenes']['tmp_name'] as $key => $tmp_name) {
            $nombreArchivo = basename($_FILES['imagenes']['name'][$key]);
            $rutaDestino = "../UPLOADS/" . $nombreArchivo;

            if (move_uploaded_file($tmp_name, $rutaDestino)) {
                $imagenesNombres[] = $nombreArchivo;
            }
        }

        if (!empty($imagenesNombres)) {
            $item->agregarImagenes($imagenesNombres,$id); 
        }
    }

    $item->actualizar($id, $titulo, $descripcion,$tipo_id);
    $item->agregarImagenes($imagenesNombres, $id);
    header("Location: ./admin.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Ítem</title>
    <link rel="icon" href="./IMG/Logo4.png" type="image/png">
    <link rel="stylesheet" href="../BOOTSTRAP_v5.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/agregaryeditar.css">
</head>
<body>

    <div class="contenedor">
        <h2>Editar Ítem</h2>
        <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Título</label>
                    <input type="text" name="titulo" class="form-control" value="<?= htmlspecialchars($datos['titulo']) ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Descripción</label>
                    <textarea name="descripcion" class="form-control" rows="4"><?= htmlspecialchars($datos['descripcion']) ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="imagenesActuales" class="form-label">Imágenes actuales:</label>
                    <div class="d-flex flex-wrap gap-3">
                        <?php foreach ($imagenes as $img): ?>

                            <?php
                                    $idImagen = (int)$img['id'];
                                    $href = 'editar.php?' . http_build_query(['id' => $id, 'eliminar_imagen' => $idImagen]);
                                    $hrefEsc = htmlspecialchars($href, ENT_QUOTES, 'UTF-8');
                            ?>

                            <div style="position: relative; display: inline-block;">
                                <img src="../UPLOADS/<?= htmlspecialchars($img['imagen']) ?>" alt="Imagen existente" width="120" height="120" style="object-fit: cover; border-radius: 5px;">

                                <a href="<?= $hrefEsc ?>"
                                    onclick="return confirm('¿Seguro que deseas eliminar esta imagen?')"
                                    style="position: absolute; top: 2px; right: 6px; color: red; font-weight: bold; text-decoration: none;">✕
                                </a>

                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="nuevas_imagenes" class="form-label">Agregar nuevas imágenes:</label>
                    <input type="file" name="imagenes[]" multiple class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tipo de Mueble</label>
                    <select name="tipo_id" class="form-select">
                        <option value="">Sin tipo</option>
                        <?php foreach ($tipos as $tipo): ?>
                            <option value="<?= $tipo['id'] ?>" <?= ($tipo['id'] == $datos['tipo_id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($tipo['nombre']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="./admin.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    
</body>
</html>
