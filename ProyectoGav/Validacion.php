<?php
session_start();

// Conexión a la base de datos
$servername = "localhost";
$username = "root"; // Cambiar por tu nombre de usuario de MySQL
$password = ""; // Cambiar por tu contraseña de MySQL
$dbname = "proyectogav"; // Cambiar por el nombre de tu base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Consulta SQL para verificar los datos del usuario
$sql = "SELECT * FROM usuarios WHERE email='$username' AND contraseña='$password'";
$result = $conn->query($sql);

// Verificar si se encontró algún usuario
if ($result->num_rows > 0) {
    // Iniciar sesión y redirigir al usuario a la página de inicio
    $_SESSION['email'] = $username;
    header('Location: Inicio.php'); // Cambiar por la página de inicio de sesión
} else {
    // Usuario o contraseña incorrectos, redirigir al usuario al formulario de inicio de sesión con mensaje de error
    header('Location: Login.php?error=Usuario o contraseña incorrectos');
}

// Cerrar conexión
$conn->close();
?>
