<?php

$idEnfermedad = $_POST['id'];
$nombre = $_POST["nombre"];
$sintomas = $_POST["sintomas"];
$gravedad = $_POST["gravedad"];
$mortalidad = $_POST["mortalidad"];


require_once('config.php');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

$idEnfermedad = $conn->real_escape_string($idEnfermedad); // Escapar el valor de $idEnfermedad

$sql = "UPDATE enfermedad SET nombre = '$nombre', sintomas = '$sintomas', gravedad = '$gravedad', mortalidad = '$mortalidad' WHERE id_enfermedad = '$idEnfermedad'";

if ($conn->query($sql) === TRUE) {
    echo "Los cambios se han guardado correctamente.";
} else {
    echo "Error al guardar los cambios: " . $conn->error;
}
header("Location: enferemedadtabla.php");

$conn->close();
?>
