<?php
require ("conn.php");
require('vendor/autoload.php');

$consulta="Select * from cita WHERE estatus = 1";
$datos = $conn->query($consulta);
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="cita.csv"');

$output = fopen('php://output', 'w');

fputcsv($output, array('fecha', 'hora', 'paciente','medico'));

while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['fecha'],
        $rows['hora'],
        $rows['paciente'],
        $rows['medico'],
    ));
}
fclose($output);
exit;
    ?>