<?php
       session_start();

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
    .btn-success {
      background-color: #c3e6cb;
      color: #155724;
      transition: background-color 0.3s ease;
    }

    .btn-success:hover {
      background-color: #b1dfb2;
      color: #155724;
    }

    .btn-eliminar {
      background-color: white;
      color: #dc3545;
      transition: background-color 0.3s ease;
    }

    .btn-editar {
  background-color: white;
  color: #28a745;
  transition: background-color 0.3s ease;
  border: 1px solid #28a745; /* Agregar borde verde */
}


.btn-editar:hover,
.btn-editar:focus {
  background-color: #28a745;
  color: white;
  border: 1px solid #28a745; /* Mantener borde verde */
}
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

    .col-md-3 {
      /* Cambia la clase de col-md-3 a col-md-auto */
      background-color: #000000;
      padding: 20px;
      min-height: 100vh;
      position: relative;
      left: -20px;
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
              <a href="citatabla.php" class="nav-link">
                <i class="bi bi-calendar-check"></i>
                <span class="text-white fw-bold">Enfermedad</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="citatabla.php" class="nav-link">
                <i class="bi bi-calendar-check"></i>
                <span class="text-white fw-bold">Historial Medico</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="citatabla.php" class="nav-link">
                <i class="bi bi-calendar-check"></i>
                <span class="text-white fw-bold">Medico</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="citatabla.php" class="nav-link">
                <i class="bi bi-calendar-check"></i>
                <span class="text-white fw-bold">Pacientes</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="citatabla.php" class="nav-link">
                <i class="bi bi-calendar-check"></i>
                <span class="text-white fw-bold">Medico Consultorio</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="citatabla.php" class="nav-link">
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
          <div class="table-container active" id="tabla1">
            <h2>Enfermedad</h2>
            <?php
              if (isset($_SESSION['mensaje'])) {
                echo "<div class='alert alert-success'>".$_SESSION['mensaje']."</div>";
                unset($_SESSION['mensaje']); // Limpiar el mensaje después de mostrarlo
              }
            ?>
            <table class="table">
              <thead>
                <tr>
                  <th>nombre</th>
                  <th>sintomas</th>
                  <th>gravedad</th>
                  <th>mortalidad</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
              <?php
require_once('config.php');

$conexion = new mysqli($servername, $username, $password, $dbname);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$consulta = "SELECT id_enfermedad, nombre, sintomas, gravedad, mortalidad FROM enfermedad WHERE estatus = 1";

$resultados = $conexion->query($consulta);

if ($resultados === false) {
    die("Error en la consulta: " . $conexion->error);
}

while ($fila = mysqli_fetch_assoc($resultados)) {
  echo "<tr>";
  echo '<td>' . $fila['nombre'] . '</td>';
  echo '<td>' . $fila['sintomas'] . '</td>';
  echo '<td>' . $fila['gravedad'] . '</td>';
  echo '<td>' . $fila['mortalidad'] . '</td>';
  echo '<td>
          <form action="confirmareliminarenferemedad.php" method="POST">
            <input type="hidden" name="id" value="' . $fila['id_enfermedad'] . '">
            <button type="submit" class="btn btn-danger btn-eliminar">Eliminar </button>
          </form>

          <a href="editardiseñoennfermedad.php?id=' . $fila['id_enfermedad'] . '" class="btn btn-success btn-editar">Editar</a>
        </td>';
  echo "</tr>";
}

mysqli_free_result($resultados);
mysqli_close($conexion);
?>
              </tbody>
            </table>
            <li class="nav-item">
              <a href="diseñoagregarenfermedad.php" class="nav-link">
                <span class="text-black fw-bold btn btn-primary">Agregar</span>
              </a>
              <a href="exportar_pdfenfermedad.php" target="_blank" class="btn btn-primary">Exportar a PDF</a>
<a href="exportar_xlsenfermedad.php" target="_blank" class="btn btn-primary">Exportar a XLS</a>
<a href="exportar_csvenfermedad.php" target="_blank" class="btn btn-primary">Exportar a CSV</a>
<a href="exportar_xlmenfermedad.php" target="_blank" class="btn btn-primary">Exportar a XLM</a>
<a href="exportar_jasonenfermedad.php" target="_blank" class="btn btn-primary">Exportar a JSON</a>
            </li>

            <form id="formulario" style="display: none;">
              <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" class="form-control" id="direccion" name="direccion">
              </div>
              <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" class="form-control" id="telefono" name="telefono">
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