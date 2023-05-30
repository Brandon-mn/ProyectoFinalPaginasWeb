<?php
require ("conn.php");
$consulta="Select * from enferemedad WHERE estatus = 1";
$resultado = $conn->query($consulta);

$xml = new XMLWriter();
$xml->openURI('enferemedad.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

$xml->startElement('tabla');

while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('enferemedad');
    $xml->writeElement('nombre', $row['nombre']);
    $xml->writeElement('sintomas', $row['sintomas']);
    $xml->writeElement('gravedad', $row['gravedad']);
    $xml->writeElement('mortalidad', $row['mortalidad']);
    $xml->endElement(); 
}
$xml->endElement();
$xml->endDocument();
$xml->flush();

$conn->close();

header('Content-type: application/octet-stream');
header('Content-Disposition: attachment; filename="enferemedad.xml"');
header('Content-Length: ' . filesize('cita.xml'));

readfile('cita.xml');
exit();
?>