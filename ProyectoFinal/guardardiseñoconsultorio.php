<?php

$idConsultorio = $_POST['id'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$nombre = $_POST['nombre'];
$horario = $_POST['horario'];



require_once('config.php');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

$sql = "UPDATE consultorio SET direccion = '$direccion', telefono = '$telefono', nombre = '$nombre',horario = '$horario'  WHERE id_consultorio = $idConsultorio";




if ($conn->query($sql) === TRUE) {
    echo "Los cambios se han guardado correctamente.";
} else {
    echo "Error al guardar los cambios: " . $conn->error;
}
header("Location: consultoriotabla.php");

$conn->close();
?>
