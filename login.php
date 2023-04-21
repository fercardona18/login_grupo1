<?php
$servidor = "localhost"; // Nombre del servidor
$usuario = "root"; // Nombre del usuario de la base de datos
$clave = ""; // Contraseña del usuario de la base de datos
$baseDatos = "word"; // Nombre de la base de datos
 
// Crear la conexión a la base de datos
$conn = mysqli_connect($servidor, $usuario, $clave, $baseDatos);
 
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}
 
// Verificar si el usuario ha enviado el formulario de inicio de sesión
if (isset($_POST['correo_electronico']) && isset($_POST['contrasena'])) {
 
    // Obtener las credenciales del usuario del formulario de inicio de sesión
    $correo_electronico = $_POST['correo_electronico'];
    $contrasena = $_POST['contrasena'];
 
    // Buscar al usuario en la base de datos
    $sql = "SELECT * FROM login_db WHERE correo_electronico = '$correo_electronico' AND contrasena = '$contrasena'";
    $result = mysqli_query($conn, $sql);
 
    // Si el usuario existe, iniciar sesión y redirigirlo a una página de inicio
    if (mysqli_num_rows($result) == 1) {
        $_SESSION['correo_electronico'] = $correo_electronico;
        header("Location: inicio.php");
    } else {
        echo "Correo electrónico o contraseña incorrectos.";
    }
}
?>
