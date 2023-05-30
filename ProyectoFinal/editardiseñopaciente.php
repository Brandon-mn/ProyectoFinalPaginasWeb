<?php
session_start();

if (isset($_GET['id'])) {
  $idPaciente = $_GET['id'];

  require_once('config.php');
  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
  }

  $consulta = "SELECT * FROM paciente WHERE id_paciente = '$idPaciente'";
  $resultado = $conn->query($consulta);

  if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();

    $nombre = $fila['nombre'];
    $apellido = $fila['apellidos'];
    $direccion = $fila['direccion'];
    $telefono = $fila['telefono'];
  } else {
    echo "No se encontró el consultorio.";
    exit;
  }

  $conn->close();
} else {
  echo "ID de consultorio no válido.";
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
     
          <div class="table-container" id="tabla1">
            <h2>Tabla 1</h2>
          </div>
          <div>
            <h1>Editar Diseño Consultorio</h1>

            <form method="POST" action="guardardiseñopaciente.php">
              <div class="form-group">
                <label for="direccion">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>">
              </div>
              <div class="form-group">
                <label for="telefono">Apellidos:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $apellido; ?>">
              </div>
              <div class="form-group">
                <label for="direccion">Direccion:</label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $direccion; ?>">
              </div>
              <div class="form-group">
                <label for="direccion">Telefono:</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $telefono; ?>">
              </div>
              <input type="hidden" name="id" value="<?php echo $idPaciente; ?>">

              <a href="pacientetabla.php" class="btn btn-secondary">Cancelar</a>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
