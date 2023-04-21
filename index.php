<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
=======
<?php


if(isset($_SESSION['correo_electronico'])) {
  header("Location: home.php");
}

$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $correo_electronico = $_POST['email'];
  $contrasena = $_POST['password'];

  // Conexión a la base de datos
  $conn = mysqli_connect('localhost', 'root', '', 'word');
  if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
  }

  // Verificar el inicio de sesión
  $query = "SELECT * FROM login_db WHERE correo_electronico='$correo_electronico' AND contrasena='$contrasena'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

  if (mysqli_num_rows($result) == 1) {
    $_SESSION['correo_electronico'] = $correo_electronico;
    header("Location: home.php");
  } else {
    $error = "El correo electrónico o la contraseña son incorrectos.";
  }

  mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Inicio de sesión</title>
	<script src="script.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-8">
				<div class="card border-0 shadow-lg mt-5">
					<div class="card-header bg-primary text-white text-center">
						<h3>Inicio de sesión</h3>
					</div>
					<div class="card-body p-4">
						<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              <div class="form-group">
                <label for="email">Correo electrónico:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa tu correo electrónico" required>
              </div>
              <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu contraseña" required>
              </div>
              <button type="submit" class="btn btn-primary btn-block mt-4">Iniciar sesión</button>
            </form>
					</div>
					<div class="card-footer text-center">
						<p>¿No tienes cuenta? <a href="#">Regístrate aquí</a></p>
            <p class="text-danger"><?php echo $error;?></p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script

>>>>>>> kevin
