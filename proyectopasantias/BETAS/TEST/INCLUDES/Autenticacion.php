<?php
class Auth {
    public static function iniciarSesion($usuario) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['Usuario'] = $usuario;
    }

    public static function obtenerUsuario() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return $_SESSION['Usuario'] ?? null;
    }

    public static function cerrarSesion() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
    }

    public static function esAdmin() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return ($_SESSION['Usuario']['Rol'] ?? null) === 'Admin';
        
    }
}
