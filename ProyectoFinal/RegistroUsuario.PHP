<?php
// Obtén los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$contraseña = $_POST['contraseña'];

// Genera el hash de la contraseña
$contraseñaEncriptada = password_hash($contraseña, PASSWORD_DEFAULT);

// Conecta a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyectofinalfarmacia";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

// Prepara la consulta SQL
$sql = "INSERT INTO usuarios (nombre, apellido, email, contraseña) VALUES ('$nombre', '$apellido', '$email', '$contraseñaEncriptada')";

// Ejecuta la consulta
if ($conn->query($sql) === TRUE) {
    echo "Usuario registrado correctamente.";
} else {
    echo "Error al registrar el usuario: " . $conn->error;
}

// Cierra la conexión
$conn->close();
header("Location: inicio.html");
        exit();
?>