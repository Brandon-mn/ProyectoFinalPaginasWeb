<?php
require('fpdf/fpdf.php');

if (isset($_POST['fecha'])) {
  $fecha = $_POST['fecha'];

  // Incluir el archivo de conexión a la base de datos
  require("config.php");
  $conexion = mysqli_connect($servername, $username, $password, $dbname);

  // Consulta SQL para obtener los historiales médicos de la fecha seleccionada desde la vista
  $consulta = "SELECT fecha, descripcion, nombre FROM historial_medico hm JOIN pacientes p ON hm.id_paciente = p.id";
  
  // Ejecutar la consulta
  $resultados = mysqli_query($conexion, $consulta);

  // Verificar si se obtuvieron resultados
  if ($resultados && mysqli_num_rows($resultados) > 0) {
    $pdf = new FPDF();

    // Agrega una página
    $pdf->AddPage();

    // Agrega el contenido del PDF aquí, utilizando los datos obtenidos de la base de datos
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Historial Médico para la Fecha: ' . $fecha, 0, 1, 'C');

    while ($fila = mysqli_fetch_assoc($resultados)) {
      $pdf->SetFont('Arial', '', 12);
      $pdf->Cell(0, 10, 'Fecha: ' . $fila['fecha'], 0, 1);
      $pdf->Cell(0, 10, 'Descripción: ' . $fila['descripcion'], 0, 1);
      $pdf->Cell(0, 10, 'Paciente: ' . $fila['nombre'], 0, 1);
      $pdf->Ln(5); // Salto de línea
    }

    // Genera el archivo PDF y muestra el resultado
    $pdf->Output('historial_medico.pdf', 'I');
  } else {
    // Si no se obtuvieron resultados, redirecciona con un mensaje de error
    header('Location: hitorialmedicotabla.php?error=No se encontraron historiales médicos para la fecha seleccionada.');
    exit();
  }
} else {
  // Redirecciona si no se proporciona una fecha válida
  header('Location: hitorialmedicotabla.php');
  exit();
}
?>
