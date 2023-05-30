<?php

// Obtener los valores enviados desde el formulario
$enfermedad = $_POST['enfermedad'];
$descripcion = $_POST['descripcion'];
$duracion = $_POST['duracion'];
$dosis = $_POST['dosis'];
$costo = $_POST['costo'];

require_once('config.php');

$conexion = new mysqli($servername, $username, $password, $dbname);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Insertar los datos en la tabla de tratamiento
$insertarTratamiento = "INSERT INTO tratamiento (descripcion, duracion, dosis, costo, id_enfermedad) VALUES ('$descripcion', '$duracion', '$dosis', '$costo', '$enfermedad')";

if ($conexion->query($insertarTratamiento) === TRUE) {
    echo "Tratamiento agregado exitosamente.";
} else {
    echo "Error al agregar el tratamiento: " . $conexion->error;
}

$conexion->close();
header("Location: tratamientotabla.php");
?>
