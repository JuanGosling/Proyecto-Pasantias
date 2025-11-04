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

    public function buscarItems($tipo_id = null, $busqueda = null) {
        $sql = "SELECT i.*, t.nombre AS tipo_nombre
                FROM items i
                LEFT JOIN item_tipos t ON i.tipo_id = t.id
                WHERE 1=1";
        $parametros = [];

        if (!empty($tipo_id)) {
            $sql .= " AND i.tipo_id = ?";
            $parametros[] = (int)$tipo_id;
        }

        if (!empty($busqueda)) {
            $sql .= " AND (i.titulo LIKE ? OR i.descripcion LIKE ? OR t.nombre LIKE ?)";
            $parametros[] = "%$busqueda%";
            $parametros[] = "%$busqueda%";
            $parametros[] = "%$busqueda%";
        }

        $sql .= " ORDER BY i.id DESC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($parametros);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerTipos() {
        $stmt = $this->conn->query("SELECT id, nombre FROM item_tipos ORDER BY nombre ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function agregar($titulo, $descripcion, $tipo_id) {
        $stmt = $this->conn->prepare("INSERT INTO items (titulo, descripcion, tipo_id) VALUES (?, ?, ?)");
        
        return $stmt->execute([$titulo, $descripcion, $tipo_id]);

    }

    public function obtenerUltimoId(){
        return $this->conn->lastInsertId();
    }

    public function agregarImagenes($imagenesNombres,$item_id){

        // Inserta las imgenes de los items en la tabla item_imagenes
        foreach ($imagenesNombres as $nombre) {
            $stmt = $this->conn->prepare("INSERT INTO item_imagenes (item_id, imagen) VALUES (?, ?)");
            $stmt->execute([$item_id, $nombre]);
        }

    }

    public function obtenerImagenesPorItem($item_id) {
        $stmt = $this->conn->prepare("SELECT  id, imagen FROM item_imagenes WHERE item_id = ?");
        $stmt->execute([$item_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM items WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function eliminarImagen($idImagen){

        $stmt = $this->conn->prepare("SELECT imagen FROM item_imagenes WHERE id = ?");
        $stmt->execute([$idImagen]);
        $imagen = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($imagen) {
            $ruta = '../UPLOADS/' . $imagen['imagen'];
            if (file_exists($ruta)) {
                unlink($ruta);
            }

            $stmt = $this->conn->prepare("DELETE FROM item_imagenes WHERE id = ?");
            $stmt->execute([$idImagen]);

            return true;
        }

        return false;
    }

    public function actualizar($id, $titulo, $descripcion, $tipo_id) {
        $stmt = $this->conn->prepare("UPDATE items SET titulo = ?, descripcion = ?, tipo_id = ? WHERE id = ?");
        return $stmt->execute([$titulo, $descripcion, $tipo_id , $id]);
        
    }

    public function eliminar($id) {

        $stmt = $this->conn->prepare("SELECT imagen FROM item_imagenes WHERE item_id = ?");
        $stmt->execute([$id]);
        $imagenes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($imagenes as $img) {
            $ruta = "../UPLOADS/" . $img['imagen'];
            if (file_exists($ruta)) {
                unlink($ruta);
            }
        }

        $stmt = $this->conn->prepare("DELETE FROM items WHERE id = ?");
        $stmt->execute([$id]);
    }
}
