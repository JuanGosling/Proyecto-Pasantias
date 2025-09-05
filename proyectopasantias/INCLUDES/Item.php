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

    public function buscarItems($tipo = null, $busqueda = null) {
        $sql = "SELECT * FROM items WHERE 1=1";
        $parametros = [];

        if (!empty($tipo)) {
            $sql .= " AND tipo = ?";
            $parametros[] = $tipo;
        }

        if (!empty($busqueda)) {
            $sql .= " AND (titulo LIKE ? OR descripcion LIKE ?)";
            $parametros[] = "%$busqueda%";
            $parametros[] = "%$busqueda%";
        }

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($parametros);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerTipos() {
        $stmt = $this->conn->query("SELECT DISTINCT tipo FROM items ORDER BY tipo ASC");
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function agregar($titulo, $descripcion, $imagen , $tipo) {
        $stmt = $this->conn->prepare("INSERT INTO items (titulo, descripcion, imagen , tipo) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$titulo, $descripcion, $imagen, $tipo]);
    }

    public function obtenerPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM items WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($id, $titulo, $descripcion, $imagen = null , $tipo) {
        $stmt = $this->conn->prepare("UPDATE items SET titulo = ?, descripcion = ?, imagen = ? , tipo = ? WHERE id = ?");
        return $stmt->execute([$titulo, $descripcion, $imagen, $tipo , $id]);
        
    }

    public function eliminar($id) {
        $stmt = $this->conn->prepare("DELETE FROM items WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
