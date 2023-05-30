<?php
require_once('config.php');

$conexion = new mysqli($servername, $username, $password, $dbname);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$consulta = "SELECT id_cita, fecha, hora, id_paciente, id_medico FROM cita WHERE estatus = 1 AND fecha >= CURDATE() ORDER BY fecha ASC, hora ASC LIMIT 1";

$resultado = $conexion->query($consulta);

if ($resultado === false) {
    die("Error en la consulta: " . $conexion->error);
}

if ($resultado->num_rows > 0) {
    // Obtener los datos de la cita más próxima
    $fila = $resultado->fetch_assoc();
    $fecha = $fila['fecha'];
    $hora = $fila['hora'];

    // Generar el contenido del PDF
    $contenido_pdf = "Cita mas proxima:\n\nFecha: $fecha\nHora: $hora";


    require_once('fpdf/fpdf.php');

    class PDF extends FPDF
    {
        function Header()
        {
            $this->SetFont('Arial', 'B', 14);
            $this->Cell(0, 10, 'Cita Proxima', 0, 1, 'C');
            $this->Ln(10);
        }

        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial', 'I', 8);
            $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
        }
    }

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(0, 10, $contenido_pdf);
    $pdf->Output('cita_proxima.pdf', 'D');

} else {
    echo "No se encontró ninguna cita próxima.";
}

mysqli_free_result($resultado);
mysqli_close($conexion);
?>
