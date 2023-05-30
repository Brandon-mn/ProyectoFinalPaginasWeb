<?php
require ("conn.php");
require('vendor/autoload.php');

$consulta="Select * from consultorio WHERE estatus = 1";
$datos = $conn->query($consulta);
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="consultorio.csv"');

$output = fopen('php://output', 'w');

fputcsv($output, array('Direccion', 'Telefono', 'Nombre','Horario'));

while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['direccion'],
        $rows['telefono'],
        $rows['nombre'],
        $rows['horario'],
    ));
}
fclose($output);
exit;
    ?>