<?php
require_once '../includes/Autenticacion.php';
require_once '../includes/Item.php';

if (!Auth::esAdmin()) {
    header("Location: ./login.php");
    exit;
}

$id = $_GET['id'] ?? null;
if (!$id || !is_numeric($id)) {
    die("ID inválido");
}

$item = new Item();
$item->eliminar($id);

header("Location: ./admin.php");
exit;
