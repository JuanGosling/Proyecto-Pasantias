<?php
require_once '../INCLUDES/Autenticacion.php';
Auth::cerrarSesion();
header("Location: ../index.php");
