<?php
require ("conn.php");
require('vendor/autoload.php');

$consulta="Select * from medico WHERE estatus = 1";
$datos = $conn->query($consulta);
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="medico.csv"');

$output = fopen('php://output', 'w');

fputcsv($output, array('nombre', 'apellidos', 'especialidad','Experiencia'));

while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['nombre'],
        $rows['apellidos'],
        $rows['especialidad'],
        $rows['Experiencia'],
    ));
}
fclose($output);
exit;
    ?>