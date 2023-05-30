<?php
// Incluir la clase FPDF
require('fpdf/fpdf.php');

// Crear una nueva instancia de FPDF
$pdf = new FPDF();

// Agregar una nueva página al PDF
$pdf->AddPage();

// Establecer la fuente y el tamaño del texto
$pdf->SetFont('Arial', '', 12);

// Agregar el título del PDF
$pdf->Cell(0, 10, 'Tabla de Consultorios', 0, 1, 'C');

// Agregar un salto de línea
$pdf->Ln(10);

// Crear la tabla con los datos de la base de datos
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(40, 10, 'nombre', 1, 0, 'C');
$pdf->Cell(30, 10, 'apellido', 1, 0, 'C');
$pdf->Cell(40, 10, 'especialidad', 1, 0, 'C');
$pdf->Cell(40, 10, 'experiencia', 1, 1, 'C');

$pdf->SetFont('Arial', '', 12);

// Conectar a la base de datos y obtener los datos de la tabla
require_once('config.php');


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT nombre, apellidos, especialidad, Experiencia FROM medico WHERE estatus = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(40, 10, $row['nombre'], 1, 0, 'L');
        $pdf->Cell(30, 10, $row['apellidos'], 1, 0, 'L');
        $pdf->Cell(40, 10, $row['especialidad'], 1, 0, 'L');
        $pdf->Cell(40, 10, $row['Experiencia'], 1, 1, 'L');
    }
} else {
    $pdf->Cell(0, 10, 'No hay datos disponibles', 1, 1, 'C');
}

$conn->close();

$pdf->Output('medico.pdf', 'D');
exit;
?>
