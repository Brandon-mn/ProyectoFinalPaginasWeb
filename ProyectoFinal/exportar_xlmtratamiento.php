<?php
require ("conn.php");
$consulta="Select * from tratamiento WHERE estatus = 1";
$resultado = $conn->query($consulta);

$xml = new XMLWriter();
$xml->openURI('tratamiento.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

$xml->startElement('tabla');

while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('tratamiento');
    $xml->writeElement('descripcion', $row['descripcion']);
    $xml->writeElement('duracion', $row['duracion']);
    $xml->writeElement('dosis', $row['dosis']);
    $xml->writeElement('costo', $row['costo']);
    $xml->writeElement('id_enfermedad', $row['id_enfermedad']);

    $xml->endElement(); 
}
$xml->endElement();
$xml->endDocument();
$xml->flush();

$conn->close();

header('Content-type: application/octet-stream');
header('Content-Disposition: attachment; filename="tratamiento.xml"');
header('Content-Length: ' . filesize('cita.xml'));

readfile('tratamiento.xml');
exit();
?>