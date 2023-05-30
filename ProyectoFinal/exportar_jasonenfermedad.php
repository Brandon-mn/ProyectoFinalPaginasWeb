<?php
require ("conn.php");
$consulta="SELECT * FROM enfermedad WHERE estatus = 1";
$resultado = $conn->query($consulta);

$grupos = array();

while ($row = $resultado->fetch_assoc()) {
    $grupo = array(
        'fecha' => $row['nombre'],
        'hora' => $row['sintomas'],
        'paciente' => $row['gravedad'],
        'medico' => $row['mortalidad'],
    );

    $grupos[] = $grupo;
}

$conn->close();

$json = json_encode($grupos);

header('Content-type: application/json');
header('Content-Disposition: attachment; filename="enfermedad.json"');
header('Content-Length: ' . strlen($json));

echo $json;
exit();
?>