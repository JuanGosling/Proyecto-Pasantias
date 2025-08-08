<?php
require_once 'conexion.php';

class Item {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->conectar();
    }

    public function obtenerTodos() {
        $stmt = $this->conn->query("SELECT * FROM items ORDER BY creado_en DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function agregar($titulo, $descripcion, $imagen) {
        $stmt = $this->conn->prepare("INSERT INTO items (titulo, descripcion, imagen) VALUES (?, ?, ?)");
        return $stmt->execute([$titulo, $descripcion, $imagen]);
    }

    public function obtenerPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM items WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($id, $titulo, $descripcion, $imagen = null) {
        if ($imagen) {
            $stmt = $this->conn->prepare("UPDATE items SET titulo = ?, descripcion = ?, imagen = ? WHERE id = ?");
            return $stmt->execute([$titulo, $descripcion, $imagen, $id]);
        } else {
            $stmt = $this->conn->prepare("UPDATE items SET titulo = ?, descripcion = ? WHERE id = ?");
            return $stmt->execute([$titulo, $descripcion, $id]);
        }
    }

    public function eliminar($id) {
        $stmt = $this->conn->prepare("DELETE FROM items WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
