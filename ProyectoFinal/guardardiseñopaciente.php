<?php

$idPaciente = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];



require_once('config.php');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

$sql = "UPDATE paciente SET nombre = '$nombre', apellidos = '$apellido', direccion = '$direccion',telefono = '$telefono'  WHERE id_paciente = $idPaciente";




if ($conn->query($sql) === TRUE) {
    echo "Los cambios se han guardado correctamente.";
} else {
    echo "Error al guardar los cambios: " . $conn->error;
}
header("Location: pacientetabla.php");

$conn->close();
?>
