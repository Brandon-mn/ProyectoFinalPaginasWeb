<?php
require ("conn.php");
$consulta="SELECT * FROM consultorio WHERE estatus = 1";
$resultado = $conn->query($consulta);

$grupos = array();

while ($row = $resultado->fetch_assoc()) {
    $grupo = array(
        'direccion' => $row['direccion'],
        'telefono' => $row['telefono'],
        'nombre' => $row['nombre'],
        'horario' => $row['horario'],
    );

    $grupos[] = $grupo;
}

$conn->close();

$json = json_encode($grupos);

header('Content-type: application/json');
header('Content-Disposition: attachment; filename="consultorio.json"');
header('Content-Length: ' . strlen($json));

echo $json;
exit();
?>