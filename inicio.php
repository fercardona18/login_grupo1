<?php
session_start();
 
// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
}
 
// Mostrar un mensaje de bienvenida al usuario
echo "Bienvenido " . $_SESSION['email'] . "!";
?>
