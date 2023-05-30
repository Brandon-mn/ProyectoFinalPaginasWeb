<?php
require ("conn.php");
$consulta="SELECT * FROM tratamiento WHERE estatus = 1";
$resultado = $conn->query($consulta);

$grupos = array();

while ($row = $resultado->fetch_assoc()) {
    $grupo = array(
        'descripcion' => $row['descripcion'],
        'duracion' => $row['duracion'],
        'dosis' => $row['dosis'],
        'costo' => $row['costo'],
        'id_enfermedad' => $row['id_enfermedad'],
        
    );

    $grupos[] = $grupo;
}

$conn->close();

$json = json_encode($grupos);

header('Content-type: application/json');
header('Content-Disposition: attachment; filename="tratamiento.json"');
header('Content-Length: ' . strlen($json));

echo $json;
exit();
?>