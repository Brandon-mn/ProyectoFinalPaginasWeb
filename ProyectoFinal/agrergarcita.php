<?php

// Obtener los valores enviados desde el formulario
$medico = $_POST['medico'];
$paciente = $_POST['paciente'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];

require_once('config.php');

$conexion = new mysqli($servername, $username, $password, $dbname);
                  
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Insertar los datos en la tabla de citas
$insertarCita = "INSERT INTO cita (fecha, hora, id_paciente, id_medico) VALUES ('$fecha', '$hora', '$paciente', '$medico')";

if ($conexion->query($insertarCita) === TRUE) {
    echo "Cita agregada exitosamente.";
} else {
    echo "Error al agregar la cita: " . $conexion->error;
}

$conexion->close();
header("Location: citatabla.php");
?>
