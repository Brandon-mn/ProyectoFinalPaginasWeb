<?php
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];


require_once('config.php');

$conexion = new mysqli($servername, $username, $password, $dbname);
                  
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql = "INSERT INTO `paciente` (nombre, apellidos, direccion, telefono) VALUES ('$nombre', '$apellidos', '$direccion', '$telefono')";

if ($conexion->query($sql) === TRUE) {
  $conexion->close();
  echo "<script>alert('Guardado correctamente'); window.location.href = 'pacientetabla.php';</script>";
  exit;
} else {
  echo "Error: " . $sql . "<br>" . $conexion->error;
}

?>
