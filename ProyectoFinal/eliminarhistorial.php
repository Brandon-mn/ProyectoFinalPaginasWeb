<?php
session_start();

if (isset($_POST['id'])) {
  $id = $_POST['id'];

  require_once('config.php');

  $conexion = new mysqli($servername, $username, $password, $dbname);

  if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
  }

  $actualizar = "UPDATE historial_medico SET estatus = 0 WHERE id_historial
  = $id";

  if ($conexion->query($actualizar) === TRUE) {
    $_SESSION['mensaje'] = "El dato ha sido eliminado correctamente.";
  } else {
    $_SESSION['mensaje'] = "Error al eliminar el dato: " . $conexion->error;
  }

  $conexion->close();
} else {
  $_SESSION['mensaje'] = "No se ha especificado el ID del dato a eliminar.";
}


header("Location: hitorialmedicotabla.php");
exit();
?>
