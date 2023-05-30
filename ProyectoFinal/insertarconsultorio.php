<?php
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];
$nombre = $_POST["nombre"];
$horario = $_POST["horario"];


require_once('config.php');

$conexion = new mysqli($servername, $username, $password, $dbname);
                  
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql = "INSERT INTO `consultorio` (direccion, telefono, nombre, horario) VALUES ('$direccion', '$telefono', '$nombre', '$horario')";

if ($conexion->query($sql) === TRUE) {
  $conexion->close();
  echo "<script>alert('Guardado correctamente'); window.location.href = 'consultoriotabla.php';</script>";
  exit;
} else {
  echo "Error: " . $sql . "<br>" . $conexion->error;
}

?>


