<?php
require_once 'includes/Autenticacion.php';
Auth::cerrarSesion();
header("Location: index.php");
