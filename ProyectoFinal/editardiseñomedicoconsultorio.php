<?php
session_start();

if (isset($_GET['id'])) {
  $idmedicoconsultorio = $_GET['id'];

  require_once('config.php');
  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
  }

  $consulta = "SELECT id_medico, id_consultorio FROM relacion_medico_consultorio WHERE idmedicoconsultorio = '$idmedicoconsultorio'";
  $resultado = $conn->query($consulta);

  if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();

    $id_medico = $fila['id_medico'];
    $id_consultorio = $fila['id_consultorio'];
  } else {
    echo "No se encontró la cita.";
    exit;
  }

  $conn->close();
} else {
  echo "ID de cita no válido.";
  exit;
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menú Lateral</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

  <style>
    /* Estilos personalizados */
    body {
      background-color: #ffffff;
    }

    .sidebar {
      background-color: #000000;
      padding: 20px;
      min-height: 100vh;
      position: relative;
      left: -20px;
    }

    .sidebar .logo {
      color: #fff;
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 30px;
    }

    .sidebar .nav-link {
      color: #fff;
      transition: all 0.3s ease-in-out;
      display: flex;
      align-items: center;
      margin-bottom: 10px;
    }

    .sidebar .nav-link:hover {
      color: #ffca28;
      transform: scale(1.1);
      font-weight: bold;
    }

    .sidebar .nav-link .bi {
      margin-right: 10px;
      font-size: 24px;
    }

    .content {
      padding: 20px;
    }

    .table-container {
      display: none;
    }

    .table-container.active {
      display: block;
    }

    .user-info {
      text-align: right;
      color: #555;
      margin-bottom: 20px;
    }

    .confirm-message {
      font-size: 20px;
      margin-bottom: 10px;
    }

    .confirm-btn,
    .cancel-btn {
      display: inline-block;
      padding: 10px 20px;
      margin-right: 10px;
      border-radius: 5px;
      font-size: 16px;
      font-weight: bold;
      text-decoration: none;
      transition: background-color 0.3s ease-in-out;
      border: 2px solid;
      cursor: pointer;
    }

    .confirm-btn {
      color: #ff0000;
      background-color: #ffffff;
      border-color: #ff0000;
    }

    .cancel-btn {
      color: #000000;
      background-color: #ffffff;
      border-color: #28a745;
    }

    .confirm-btn:hover {
      color: #ffffff;
      background-color: #ff0000;
    }

    .cancel-btn:hover {
      color: #ffffff;
      background-color: #28a745;
    }
  </style>


</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <div class="sidebar">
          <h3 class="logo">
            <i class="bi bi-hospital"></i>
            Menú Lateral
          </h3>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a href="consultoriotabla.php" class="nav-link">
                <i class="bi bi-calendar-check"></i>
                <span class="text-white fw-bold">consultorio</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="citatabla.php" class="nav-link">
                <i class="bi bi-calendar-check"></i>
                <span class="text-white fw-bold">Citas</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="enferemedadtabla.php" class="nav-link">
                <i class="bi bi-calendar-check"></i>
                <span class="text-white fw-bold">Enfermedad</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="hitorialmedicotabla.php" class="nav-link">
                <i class="bi bi-calendar-check"></i>
                <span class="text-white fw-bold">Historial Medico</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="medicotabla.php" class="nav-link">
                <i class="bi bi-calendar-check"></i>
                <span class="text-white fw-bold">Medico</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="pacientetabla.php" class="nav-link">
                <i class="bi bi-calendar-check"></i>
                <span class="text-white fw-bold">Pacientes</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="medicoconsultoriortabla.php" class="nav-link">
                <i class="bi bi-calendar-check"></i>
                <span class="text-white fw-bold">Medico-Consultorio</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="tratamientotabla.php" class="nav-link">
                <i class="bi bi-calendar-check"></i>
                <span class="text-white fw-bold">Tratamientos</span>
              </a>
            </li>
          </ul>

        </div>
      </div>
      <div class="col-md-9">
        <div class="content">
          <div class="user-info">
            <?php
              if (isset($_SESSION['nombre']) && isset($_SESSION['apellido'])) {
                echo "<h4>Bienvenido ".$_SESSION['nombre']." ".$_SESSION['apellido']."</h4>";
              }
            ?>
          </div>
          <?php
      require_once('config.php');

      $conexion = new mysqli($servername, $username, $password, $dbname);

      if (!$conexion) {
        die('Error al conectar con la base de datos: ' . mysqli_connect_error());
      }

      $consultaMedicos = "SELECT id_medico, nombre FROM medico";
      $resultadoMedicos = $conexion->query($consultaMedicos);

      $consultaConsultorio = "SELECT id_consultorio, nombre FROM consultorio";
      $resultadoConsultorio  = $conexion->query($consultaConsultorio);
      ?>
          <div class="table-container" id="tabla1">
            <h2>Tabla 1</h2>
          </div>
          <div>
            <h1>Editar Diseño Consultorio</h1>

            <form method="POST" action="guardardiseñomedicoconsultorio.php">
              <div class="form-group">
                <label for="medico">Médico:</label>
                <select class="form-control" id="medico" name="medico">
                  <?php
                  while ($filaMedico = $resultadoMedicos->fetch_assoc()) {
                    echo "<option value='" . $filaMedico['id_medico'] . "'>" . $filaMedico['nombre'] . "</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="paciente">Paciente:</label>
                <select class="form-control" id="paciente" name="paciente">
                  <?php
                  while ($filaPaciente = $resultadoConsultorio->fetch_assoc()) {
                    echo "<option value='" . $filaPaciente['id_consultorio'] . "'>" . $filaPaciente['nombre'] . "</option>";
                  }
                  ?>
                </select>
              </div>
              <input type="hidden" name="id" value="<?php echo $idmedicoconsultorio; ?>">

              <a href="medicoconsultoriortabla.php" class="btn btn-secondary">Cancelar</a>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>


</body>
</html>
