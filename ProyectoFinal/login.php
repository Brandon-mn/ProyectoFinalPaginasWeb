<?php
// Obtén los datos del formulario de inicio de sesión
$email = $_POST['nombreUsuario'];
$contraseña = $_POST['contraseña'];

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

// Prepara la consulta SQL para obtener los datos del usuario por email
$sql = "SELECT id_usuario, nombre, apellido, email, contraseña FROM usuarios WHERE email = '$email'";
$resultado = $conn->query($sql);

// Verifica si se encontró un usuario con el email proporcionado
if ($resultado->num_rows == 1) {
    $fila = $resultado->fetch_assoc();
    $hashContraseña = $fila['contraseña'];

    // Verifica si la contraseña ingresada coincide con el hash almacenado
    if (password_verify($contraseña, $hashContraseña)) {
        // Inicio de sesión exitoso, puedes realizar las acciones necesarias
        session_start();
        $_SESSION['nombre'] = $fila['nombre'];
        $_SESSION['apellido'] = $fila['apellido'];
        header("Location: menudiseño.php");
        exit();
    } else {
        // Contraseña incorrecta
        echo "Contraseña incorrecta.";
    }
} else {
    // No se encontró un usuario con el email proporcionado
    echo "Email no encontrado.";
}

// Cierra la conexión
$conn->close();
?>
