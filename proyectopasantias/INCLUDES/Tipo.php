<?php
require_once 'conexion.php';

class Tipo {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->conectar();
    }

    public function obtenerTodos() {
        $query = "SELECT * FROM item_tipos ORDER BY nombre ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function agregar($nombre) {
        $query = "INSERT INTO item_tipos (nombre) VALUES (:nombre)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        return $stmt->execute();
    }

    public function eliminar($id) {
        $query = "DELETE FROM item_tipos WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function obtenerPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM item_tipos WHERE id = ?");
        $stmt->execute([ (int)$id ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
