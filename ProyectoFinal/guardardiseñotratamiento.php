<?php
$idCita = $_POST['id'];
$descripcion = $_POST["descripcion"]; 
$duracion = $_POST["duracion"]; 
$dosis = $_POST["dosis"];
$costo = $_POST["costo"];
$idEnfermedad = $_POST["enfermedad"];

require_once('config.php');

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

$sql = "UPDATE tratamiento SET descripcion = '$descripcion', duracion = '$duracion', dosis = '$dosis', costo = '$costo', id_enfermedad = '$idEnfermedad' WHERE id_tratamiento = $idCita";


if ($conn->query($sql) === TRUE) {
    echo "Los cambios se han guardado correctamente.";
} else {
    echo "Error al guardar los cambios: " . $conn->error;
}
header("Location: tratamientotabla.php");

$conn->close();
?>

