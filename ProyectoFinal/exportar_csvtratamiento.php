<?php
require ("conn.php");
require('vendor/autoload.php');

$consulta="Select * from tratamiento WHERE estatus = 1";
$datos = $conn->query($consulta);
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="tratamiento.csv"');

$output = fopen('php://output', 'w');

fputcsv($output, array('descripcion', 'duracion', 'dosis','costo','id_enfermedad' ));

while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['descripcion'],
        $rows['duracion'],
        $rows['dosis'],
        $rows['costo'],
        $rows['id_enfermedad'],
    ));
}
fclose($output);
exit;
    ?>