<?php
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$especialidad = $_POST["especialidad"];
$experiencia = $_POST["experiencia"];


require_once('config.php');

$conexion = new mysqli($servername, $username, $password, $dbname);
                  
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql = "INSERT INTO `medico` (nombre, apellidos, especialidad, Experiencia) VALUES ('$nombre', '$apellidos', '$especialidad', '$experiencia')";
if ($conexion->query($sql) === TRUE) {
  $conexion->close();
  echo "<script>alert('Guardado correctamente'); window.location.href = 'medicotabla.php';</script>";
  exit;
} else {
  echo "Error: " . $sql . "<br>" . $conexion->error;
}

?>
