<?php
require ("conn.php");
$consulta="SELECT * FROM historial_medico WHERE estatus = 1";
$resultado = $conn->query($consulta);

$grupos = array();

while ($row = $resultado->fetch_assoc()) {
    $grupo = array(
        'fecha' => $row['fecha'],
        'descripcion' => $row['descripcion'],
        'id_paciente' => $row['id_paciente'],
    );

    $grupos[] = $grupo;
}

$conn->close();

$json = json_encode($grupos);

header('Content-type: application/json');
header('Content-Disposition: attachment; filename="historial_medico.json"');
header('Content-Length: ' . strlen($json));

echo $json;
exit();
?>