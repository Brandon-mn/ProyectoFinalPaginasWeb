<?php
$nombre = $_POST["nombre"];
$sintomas = $_POST["sintomas"];
$gravedad = $_POST["gravedad"];
$mortalidad = $_POST["mortalidad"];


require_once('config.php');

$conexion = new mysqli($servername, $username, $password, $dbname);
                  
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql = "INSERT INTO `enfermedad` (nombre, sintomas, gravedad, mortalidad) VALUES ('$nombre', '$sintomas', '$gravedad', '$mortalidad')";
if ($conexion->query($sql) === TRUE) {
  $conexion->close();
  echo "<script>alert('Guardado correctamente'); window.location.href = 'enferemedadtabla.php';</script>";
  exit;
} else {
  echo "Error: " . $sql . "<br>" . $conexion->error;
}

?>
