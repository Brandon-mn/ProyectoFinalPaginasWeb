<?php
require('fpdf/fpdf.php');
require_once('config.php');

// Crear una nueva instancia de FPDF
$pdf = new FPDF();

// Agregar una nueva página al PDF
$pdf->AddPage();

// Establecer la fuente y el tamaño del texto
$pdf->SetFont('Arial', '', 12);

// Agregar el título del informe
$pdf->Cell(0, 10, 'Informe de Tratamientos - Costo mas alto', 0, 1, 'C');

// Agregar un salto de línea
$pdf->Ln(10);

// Conectar a la base de datos y obtener el tratamiento con el costo más alto
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexion: " . $conn->connect_error);
}

$sql = "SELECT descripcion, duracion, dosis, costo, id_enfermedad FROM tratamiento WHERE estatus = 1 ORDER BY costo DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Mostrar los datos en el informe
    $pdf->Cell(0, 10, 'Tratamiento con costo mas alto:', 0, 1, 'L');
    $pdf->Cell(0, 10, 'Descripcion: ' . $row['descripcion'], 0, 1, 'L');
    $pdf->Cell(0, 10, 'Duracion: ' . $row['duracion'], 0, 1, 'L');
    $pdf->Cell(0, 10, 'Dosis: ' . $row['dosis'], 0, 1, 'L');
    $pdf->Cell(0, 10, 'Costo: ' . $row['costo'], 0, 1, 'L');
    $pdf->Cell(0, 10, 'ID de Enfermedad: ' . $row['id_enfermedad'], 0, 1, 'L');
} else {
    $pdf->Cell(0, 10, 'No hay datos disponibles', 0, 1, 'L');
}

// Cerrar la conexion a la base de datos
$conn->close();

// Generar el archivo PDF
$pdf->Output('informe_tratamiento.pdf', 'D');
exit;
?>

