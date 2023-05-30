<?php
$idCita = $_POST['id'];
$medico = $_POST["medico"];
$paciente = $_POST["paciente"];

require_once('config.php');

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

$sql = "UPDATE relacion_medico_consultorio SET id_medico = '$medico', id_consultorio = '$paciente'  WHERE idmedicoconsultorio = $idCita";




if ($conn->query($sql) === TRUE) {
    echo "Los cambios se han guardado correctamente.";
} else {
    echo "Error al guardar los cambios: " . $conn->error;
}
header("Location: medicoconsultoriortabla.php");

$conn->close();
?>
