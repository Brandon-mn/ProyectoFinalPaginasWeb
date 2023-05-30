<?php
require ("conn.php");
require('vendor/autoload.php');

$consulta="Select * from relacion_medico_consultorio WHERE estatus = 1";
$datos = $conn->query($consulta);
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="relacion_medico_consultorio.csv"');

$output = fopen('php://output', 'w');

fputcsv($output, array( 'id_medico', 'id_consultorio'));

while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['id_medico'],
        $rows['id_consultorio'],
    ));
}
fclose($output);
exit;
    ?>