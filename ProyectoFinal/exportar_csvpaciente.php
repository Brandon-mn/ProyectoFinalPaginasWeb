<?php
require ("conn.php");
require('vendor/autoload.php');

$consulta="Select * from paciente WHERE estatus = 1";
$datos = $conn->query($consulta);
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="paciente.csv"');

$output = fopen('php://output', 'w');

fputcsv($output, array('nombre', 'apellidos', 'direccion','telefono'));

while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['nombre'],
        $rows['apellidos'],
        $rows['direccion'],
        $rows['telefono'],
    ));
}
fclose($output);
exit;
    ?>