<?php

// Obtener los valores enviados desde el formulario
$fecha = $_POST['fecha'];
$descripcion = $_POST['descripcion'];
$paciente = $_POST['paciente'];
$hora = $_POST['hora'];

require_once('config.php');

$conexion = new mysqli($servername, $username, $password, $dbname);
                  
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Insertar los datos en la tabla de citas
$insertarCita = "INSERT INTO historial_medico (fecha, descripcion, id_paciente) VALUES ('$fecha', '$descripcion', '$paciente')";

if ($conexion->query($insertarCita) === TRUE) {
    echo "Cita agregada exitosamente.";
} else {
    echo "Error al agregar la cita: " . $conexion->error;
}

$conexion->close();
header("Location: hitorialmedicotabla.php");
?>
