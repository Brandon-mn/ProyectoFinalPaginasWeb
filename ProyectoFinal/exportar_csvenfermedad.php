<?php
require ("conn.php");
require('vendor/autoload.php');

$consulta="Select * from enfermedad WHERE estatus = 1";
$datos = $conn->query($consulta);
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="enfermedad.csv"');

$output = fopen('php://output', 'w');

fputcsv($output, array('nombre', 'sintomas', 'gravedad','mortalidad'));

while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['nombre'],
        $rows['sintomas'],
        $rows['gravedad'],
        $rows['mortalidad'],
    ));
}
fclose($output);
exit;
    ?>