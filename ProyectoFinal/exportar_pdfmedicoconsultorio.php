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
$pdf->Cell(0, 10, 'Tabla de Historial', 0, 1, 'C');

// Agregar un salto de línea
$pdf->Ln(10);

// Crear la tabla con los datos de la base de datos
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(40, 10, 'id_medico', 1, 0, 'C');
$pdf->Cell(30, 10, 'id_consultorio', 1, 0, 'C');


$pdf->SetFont('Arial', '', 12);

// Conectar a la base de datos y obtener los datos de la tabla
require_once('config.php');


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT id_medico, id_consultorio FROM relacion_medico_consultorio WHERE estatus = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mostrar los datos en la tabla del PDF
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(40, 10, $row['id_medico'], 1, 0, 'L');
        $pdf->Cell(30, 10, $row['id_consultorio'], 1, 0, 'L');
    }
} else {
    $pdf->Cell(0, 10, 'No hay datos disponibles', 1, 1, 'C');
}

// Cerrar la conexión a la base de datos
$conn->close();

// Generar el archivo PDF
$pdf->Output('relacion_medico_consultorio.pdf', 'D');
exit;
?>
