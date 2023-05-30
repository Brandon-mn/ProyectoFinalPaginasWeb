<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menú Lateral</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
    integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

  <style>
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

      <?php
      require_once('config.php');

      $conexion = new mysqli($servername, $username, $password, $dbname);

      if (!$conexion) {
        die('Error al conectar con la base de datos: ' . mysqli_connect_error());
      }

      // Obtener la lista de médicos desde la base de datos
      $consultaMedicos = "SELECT id_medico, nombre FROM medico";
      $resultadoMedicos = $conexion->query($consultaMedicos);

      // Obtener la lista de pacientes desde la base de datos
    
  $consultaPacientes = "SELECT id_consultorio, nombre FROM consultorio";
  $resultadoPacientes = $conexion->query($consultaPacientes);
      
      ?>

      <div class="col-md-9">
        <div class="content">
          <div id="formulario">
            <form action="agrergarmedicoconsultorio.php" method="POST">
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
                <label for="paciente">Consultorio:</label>
                <select class="form-control" id="consultorio" name="consultorio">
                  <?php
                  while ($filaPaciente = $resultadoPacientes->fetch_assoc()) {
                    echo "<option value='" . $filaPaciente['id_consultorio'] . "'>" . $filaPaciente['nombre'] . "</option>";
                  }
                  ?>
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
