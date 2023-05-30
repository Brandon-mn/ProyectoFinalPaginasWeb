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

 
  </script>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <div class="sidebar">
          <!-- Logo del menú -->
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
          <form action="eliminarmedico.php" method="POST">
      <p class="confirm-message">¿Seguro que quieres eliminar el campo?</p>
      <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
      <button type="submit" class="confirm-btn">Confirmar</button>
      <a href="medicotabla.php" class="cancel-btn">Cancelar</a>
    </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>