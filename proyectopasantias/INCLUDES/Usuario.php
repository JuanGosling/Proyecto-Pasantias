<?php
require_once 'conexion.php';

class User {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->conectar();
    }

    public function registrar($email ,$nombre, $apellido, $password, $rol = 'Usuario') {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("INSERT INTO usuarios (Email,Nombre, Apellido ,Contraseña, Rol) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$email, $nombre, $apellido , $hash, $rol]);
    }

    public function login($email, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE Email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($password, $usuario['Contraseña'])) {
            return $usuario;
        }

        return false;
    }

    public function existeEmail($email) {
        $stmt = $this->conn->prepare("SELECT ID_Usuario FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch() !== false;
    }

}
