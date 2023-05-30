<?php
require ("conn.php");
$consulta="Select * from consultorio WHERE estatus = 1";
$resultado = $conn->query($consulta);

$xml = new XMLWriter();
$xml->openURI('Consultorio.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

$xml->startElement('tabla');

while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('Consultorio');
    $xml->writeElement('direccion', $row['nombre']);
    $xml->writeElement('telefono', $row['telefono']);
    $xml->writeElement('nombre', $row['nombre']);
    $xml->writeElement('horario', $row['horario']);
    $xml->endElement(); 
}
$xml->endElement();
$xml->endDocument();
$xml->flush();

$conn->close();

header('Content-type: application/octet-stream');
header('Content-Disposition: attachment; filename="Consultorio.xml"');
header('Content-Length: ' . filesize('Carrera.xml'));

readfile('Consultorio.xml');
exit();
?>