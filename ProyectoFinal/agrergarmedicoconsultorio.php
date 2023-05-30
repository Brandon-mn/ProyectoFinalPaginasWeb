<?php

// Obtener los valores enviados desde el formulario

$medico = $_POST['medico'];
$consultorio = $_POST['consultorio'];
require_once('config.php');

$conexion = new mysqli($servername, $username, $password, $dbname);
                  
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Insertar los datos en la tabla de citas
$insertarCita = "INSERT INTO relacion_medico_consultorio (id_medico, id_consultorio) VALUES ($medico, $consultorio)";

if ($conexion->query($insertarCita) === TRUE) {
    echo "Cita agregada exitosamente.";
} else {
    echo "Error al agregar la cita: " . $conexion->error;
}

$conexion->close();
header("Location: medicoconsultoriortabla.php");
?>
