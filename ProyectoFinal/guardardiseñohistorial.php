<?php
$idHistorial = $_POST['id'];
$fecha = $_POST["fecha"];
$descripcion = $_POST["descripcion"]; 
$paciente = $_POST["paciente"];

require_once('config.php');

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

$sql = "UPDATE historial_medico SET fecha = '$fecha', descripcion = '$descripcion',id_paciente = '$paciente'  WHERE id_historial = $idHistorial";




if ($conn->query($sql) === TRUE) {
    echo "Los cambios se han guardado correctamente.";
} else {
    echo "Error al guardar los cambios: " . $conn->error;
}
header("Location: hitorialmedicotabla.php");

$conn->close();
?>
