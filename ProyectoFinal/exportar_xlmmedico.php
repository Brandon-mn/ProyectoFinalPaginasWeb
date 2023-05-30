<?php
require ("conn.php");
$consulta="Select * from medico WHERE estatus = 1";
$resultado = $conn->query($consulta);

$xml = new XMLWriter();
$xml->openURI('medico.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

$xml->startElement('tabla');

while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('medico');
    $xml->writeElement('nombre', $row['nombre']);
    $xml->writeElement('apellidos', $row['apellidos']);
    $xml->writeElement('especialidad', $row['especialidad']);
    $xml->writeElement('Experiencia', $row['Experiencia']);
    $xml->endElement(); 
}
$xml->endElement();
$xml->endDocument();
$xml->flush();

$conn->close();

header('Content-type: application/octet-stream');
header('Content-Disposition: attachment; filename="medico.xml"');
header('Content-Length: ' . filesize('cita.xml'));

readfile('cita.xml');
exit();
?>