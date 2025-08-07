CREATE DATABASE IF NOT EXISTS pasantias;

USE pasantias;

CREATE TABLE usuarios (
    ID_Usuario INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(100) NOT NULL,
    Apellido VARCHAR(100) NOT NULL,
    Email VARCHAR(100) NOT NULL UNIQUE,
    Contraseña VARCHAR(255) NOT NULL,
    Rol ENUM('Admin', 'Usuario') DEFAULT 'Usuario'
);