<?php
require ("conn.php");
$consulta="Select * from cita WHERE estatus = 1";
$resultado = $conn->query($consulta);

$xml = new XMLWriter();
$xml->openURI('cita.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

$xml->startElement('tabla');

while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('cita');
    $xml->writeElement('fecha', $row['fecha']);
    $xml->writeElement('hora', $row['hora']);
    $xml->writeElement('id_paciente', $row['id_paciente']);
    $xml->writeElement('id_medico', $row['id_paciente']);
    $xml->endElement(); 
}
$xml->endElement();
$xml->endDocument();
$xml->flush();

$conn->close();

header('Content-type: application/octet-stream');
header('Content-Disposition: attachment; filename="cita.xml"');
header('Content-Length: ' . filesize('cita.xml'));

readfile('cita.xml');
exit();
?>