<?php
require ("conn.php");
require('vendor/autoload.php');

$consulta="Select * from historial_medico WHERE estatus = 1";
$datos = $conn->query($consulta);
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="historial_medico.csv"');

$output = fopen('php://output', 'w');

fputcsv($output, array('fecha', 'descripcion', 'id_paciente'));

while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['fecha'],
        $rows['descripcion'],
        $rows['id_paciente'],
    ));
}
fclose($output);
exit;
    ?>