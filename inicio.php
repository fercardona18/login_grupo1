<?php
session_start();
 
// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['correo_electronico'])) {
    header("Location: index.php");
}
 
// Mostrar un mensaje de bienvenida al usuario
echo "Bienvenido " . $_SESSION['correo_electronico'] . "!";
?>
