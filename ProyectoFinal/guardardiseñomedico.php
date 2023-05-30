<?php

$idMedico = $_POST['id'];
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellido"];
$especialidad = $_POST["especialidad"];
$experiencia = $_POST["experiencia"];


require_once('config.php');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

$sql = "UPDATE medico SET nombre = '$nombre', apellidos = '$apellidos', especialidad = '$especialidad',experiencia = '$experiencia'  WHERE id_medico = $idMedico";




if ($conn->query($sql) === TRUE) {
    echo "Los cambios se han guardado correctamente.";
} else {
    echo "Error al guardar los cambios: " . $conn->error;
}
header("Location: medicotabla.php");

$conn->close();
?>
