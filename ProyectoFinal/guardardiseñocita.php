<?php
$idCita = $_POST['id'];
$fecha = $_POST["fecha"]; 
$hora = $_POST["hora"]; 
$medico = $_POST["medico"];
$paciente = $_POST["paciente"];

require_once('config.php');

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

$sql = "UPDATE cita SET fecha = '$fecha', hora = '$hora', id_medico = '$medico',id_paciente = '$paciente'  WHERE id_cita = $idCita";




if ($conn->query($sql) === TRUE) {
    echo "Los cambios se han guardado correctamente.";
} else {
    echo "Error al guardar los cambios: " . $conn->error;
}
header("Location: citatabla.php");

$conn->close();
?>

